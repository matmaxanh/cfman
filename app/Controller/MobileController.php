<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class MobileController extends AppController {
	public $uses = array('User', 'Order', 'OrderItem', 'Item', 'Device', 'Invoice');
	
	//store param data
	var $_params;
	
	//response data
	var $_response = null;
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();
		$this->_params = array_merge($_GET, $_POST);
		$this->_response = array(
			'status' => 'error',
			'message' => array(),
		);
	}
	
	public function beforeRender(){
		parent::beforeRender();
		if(!is_null($this->_response)){
			echo json_encode($this->_response);
		}
		return false;
	}
	
	/*
	 * API create order
	 * 
	 */
	public function order_create() {
		$requiredParams = array('username', 'password', 'table_id', 'item');
		if(!$this->checkParams($requiredParams)){
			return;
		}
		if(isset($this->_params['username']) && isset($this->_params['password'])){
			$user = $this->User->checkWaiter($this->_params['username'], $this->Auth->password($this->_params['password']));
			if(!empty($user)){
				$this->Order->create();
				$this->Order->set(array(
					'user_id' => $user['User']['id'],
					'table_id' => $this->_params['table_id'],
					'status' => STATUS_ORDER_ORDERING,
				));
				if ($this->Order->save()){
					$orderId = $this->Order->getLastInsertID();
					if(isset($this->_params['item']) && is_array($this->_params['item'])){
						foreach($this->_params['item'] as $itemId => $amount){
							$item = $this->Item->find('first', array(
								'recursive' => -1,
								'conditions' => array('Item.id' => $itemId),
							));
							
							//@todo: kiem tra con hang trong kho khong
							$this->OrderItem->create();
							$this->OrderItem->save(array(
								'order_id' => $orderId,
								'item_id' => $itemId,
								'item_cost' => $item['Item']['cost'],
								'amount' => $amount,
								'status' => STATUS_ORDER_ITEM_REGISTER,
							));
						}
					}
					$this->_response = array(
						'status' => 'ok',
						'order_id' => $orderId,
					);
				} else {
					$this->_response['message'] = __('The order could not be saved. Please, try again.');
				}
			}else{
				$this->_response['message'] = __('Invalid user');
			}
		}
	}
	
	public function order_update() {
		$requiredParams = array('username', 'password', 'order_id', 'action', 'item');
		if(!$this->checkParams($requiredParams)){
			return;
		}
		$user = $this->User->checkWaiter($this->_params['username'], $this->Auth->password($this->_params['password']));
		$order = $this->Order->find('first', array(
			'recursive' => -1,
			'conditions' => array('Order.id' => $this->_params['order_id']),
		));
		if(!empty($user) && !empty($order) && is_array($this->_params['item'])){
			foreach($this->_params['item'] as $itemId => $amount):
				$item = $this->Item->find('first', array(
					'recursive' => -1,
					'conditions' => array('Item.id' => $itemId),
				));
				switch($this->_params['action']){
					case 'add' :
						//@todo: kiem tra con hang trong kho khong
						$this->OrderItem->create();
						if($this->OrderItem->save(array(
							'order_id' => $order['Order']['id'],
							'item_id' => $itemId,
							'item_cost' => $item['Item']['cost'],
							'amount' => $amount,
							'status' => STATUS_ORDER_ITEM_REGISTER,
						))){
							$this->_response['status'] = 'ok';
						}
						break;
					case 'cancel':
						$orderItem = $this->OrderItem->find('first', array(
							'recursive' => -1,
							'fields' => array('OrderItem.id', 'OrderItem.status'),
							'conditions' => array('OrderItem.order_id' => $order['Order']['id'], 'OrderItem.item_id' => $itemId),
						));
						if(!empty($orderItem)){
							if($orderItem['OrderItem']['status'] == STATUS_ORDER_ITEM_REGISTER){
								$this->OrderItem->id = $orderItem['OrderItem']['id'];
								$this->OrderItem->saveField('status', STATUS_ORDER_ITEM_CANCELED);
								$this->_response['status'] = 'ok';
							}else{
								$this->_response['message'][$itemId] = __('Don\'t cancel this item');
							}
						}
						break;
				}
			endforeach;
		}
	}
	
	public function order_payment(){
		$requiredParams = array('username', 'password', 'order_id', 'total_payment');
		if(!$this->checkParams($requiredParams)){
			return;
		}
		$user = $this->User->checkWaiter($this->_params['username'], $this->Auth->password($this->_params['password']));
		$order = $this->Order->find('first', array(
			'recursive' => -1,
			'fields' => array('Order.id'),
			'conditions' => array('Order.id' => $this->_params['order_id'], 'Order.user_id' => $user['User']['id']),
		));
		if(!empty($order)){
			if($this->Invoice->payment($this->_params['order_id'], $this->_params['total_payment'])){
				$this->_response['status'] = 'ok';
			}
		}
	}
	
	/*
	 * sync data from server to mobile client
	 * 
	 */
	public function sync(){
		$requiredParams = array('username', 'password');
		if(!$this->checkParams($requiredParams)){
			return;
		}
		$user = $this->User->checkWaiter($this->_params['username'], $this->Auth->password($this->_params['password']));
		if(!empty($user)){
			$conditions = array(
				'Item.delete_flag' => STATUS_DISABLE
			);
			if(isset($this->_params['device_code'])){
				$lastUpdate = $this->Device->field('last_update', array('device_code' => $this->_params['device_code']));
				if(!empty($lastUpdate)){
					$conditions['updated >'] = $lastUpdate; 
				}
			}
			
			$items = $this->Item->find('all', array(
				'contain' => array('Category'),
				'conditions' => $conditions,
			));
			$this->_response = array(
				'status' => 'ok',
				'content' => array(),
			);
			foreach($items as $item){
				$this->_response['content'][] = array(
					'type' => ($item['Item']['type'] == 1)?'Đồ ăn':'Đồ uống',
					'category' => $item['Category']['name'],
					'name1' => $item['Item']['name1'],
					'name2' => $item['Item']['name2'],
					'name3' => $item['Item']['name3'],
					'image' => $this->webroot.'img/menu/'.$item['Item']['image'],
					'description' => $item['Item']['description'],
					'cost' => $item['Item']['cost'],
				); 
			}
		}else{
			$this->_response['message'] = __('Invalid user');
		}
	}
	
	public function checkParams($requiredParams){
		$checkArgs = array_diff($requiredParams, array_keys($this->_params));
		if (!empty($checkArgs)) {
			$this->_response['message'] = sprintf(__('%s is required'), implode(', ', $checkArgs));
			return false;
		}
		return true;
	}
	
}