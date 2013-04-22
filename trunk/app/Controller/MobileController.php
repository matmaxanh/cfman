<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class MobileController extends AppController {
	public $uses = array('User', 'Order', 'OrderItem', 'Item', 'Device');
	
	public function beforeFilter(){
		$this->Auth->allow();
	}
	
	public function order_create() {
		$this->autoRender = false;
		$result = array(
			'status' => 'error',
		);
		if(isset($_GET['username']) && isset($_GET['password'])){
			$user = $this->User->checkWaiter($_GET['username'], $this->Auth->password($_GET['password']));
			if(!empty($user)){
				$this->Order->create();
				$this->Order->set(array(
					'user_id' => $user['User']['id'],
					'table_id' => $_GET['table_id'],
					'status' => STATUS_ORDER_ORDERING,
				));
				if ($this->Order->save()){
					$orderId = $this->Order->getLastInsertID();
					if(isset($_GET['item']) && is_array($_GET['item'])){
						foreach($_GET['item'] as $itemId => $amount){
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
					$result = array(
						'status' => 'ok',
						'order_id' => $orderId,
					);
				} else {
					$result['message'] = __('The order could not be saved. Please, try again.');
				}
			}else{
				$result['message'] = __('Invalid user');
			}
		}
		echo json_encode($result);
	}
	
	public function order_update() {
		$this->autoRender = false;
		$result = array(
			'status' => 'error',
		);
		if(isset($_GET['username']) && isset($_GET['password']) && isset($_GET['order_id'])){
			$user = $this->User->checkWaiter($_GET['username'], $this->Auth->password($_GET['password']));
			$order = $this->Order->find('first', array(
				'recursive' => -1,
				'conditions' => array('Order.id' => $_GET['order_id']),
			));
			if(!empty($user) && !empty($order) && isset($_GET['action']) && isset($_GET['item']) && is_array($_GET['item'])){
				foreach($_GET['item'] as $itemId => $amount):
					$item = $this->Item->find('first', array(
						'recursive' => -1,
						'conditions' => array('Item.id' => $itemId),
					));
					if($_GET['action'] == 'add'){
						//@todo: kiem tra con hang trong kho khong
						$this->OrderItem->create();
						$this->OrderItem->save(array(
							'order_id' => $order['Order']['id'],
							'item_id' => $itemId,
							'item_cost' => $item['Item']['cost'],
							'amount' => $amount,
							'status' => STATUS_ORDER_ITEM_REGISTER,
						));
						$result['status'] = 'ok';
					}else{
						$orderItem = $this->OrderItem->find('first', array(
							'recursive' => -1,
							'fields' => array('OrderItem.id', 'OrderItem.status'),
							'conditions' => array('OrderItem.order_id' => $order['Order']['id'], 'OrderItem.item_id' => $itemId),
						));
						if(!empty($orderItem)){
							if($orderItem['OrderItem']['status'] == STATUS_ORDER_ITEM_REGISTER){
								$this->OrderItem->id = $orderItem['OrderItem']['id'];
								$this->OrderItem->saveField('status', STATUS_ORDER_ITEM_CANCELED);
								$result['status'] = 'ok';
							}else{
								$result['message'][$itemId] = __('Don\'t cancel this item');
							}
						}
					}
				endforeach;
			}
		}
		echo json_encode($result);
	}
	
	public function sync(){
		$this->autoRender = false;
		$result = array(
			'status' => 'error',
		);
		if(isset($_GET['username']) && isset($_GET['password'])){
			$user = $this->User->checkWaiter($_GET['username'], $this->Auth->password($_GET['password']));
			if(!empty($user)){
				$conditions = array(
					'Item.delete_flag' => STATUS_DISABLE
				);
				if(isset($_GET['device_code'])){
					$lastUpdate = $this->Device->field('last_update', array('device_code' => $_GET['device_code']));
					if(!empty($lastUpdate)){
						$conditions['updated >'] = $lastUpdate; 
					}
				}
				
				$items = $this->Item->find('all', array(
					'contain' => array('Category'),
					'conditions' => $conditions,
				));
				$result = array(
					'status' => 'ok',
					'content' => array(),
				);
				foreach($items as $item){
					$result['content'][] = array(
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
				$result['message'] = __('Invalid user');
			}
		}
		echo json_encode($result);
	}
	
}