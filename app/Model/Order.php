<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 * @property Table $Table
 * @property User $User
 * @property OrderItem $OrderItem
 */
class Order extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'table_id';
	
	public $actsAs = array('Containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Table' => array(
			'className' => 'Table',
			'foreignKey' => 'table_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'OrderItem' => array(
			'className' => 'OrderItem',
			'foreignKey' => 'order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	/*
	 * calculate cash total 
	 * @param int orderId
	 */
	public function payment($orderId){
		$order = $this->find('first', array(
			'conditions' => array('Order.id' => $orderId),
		));
		if(!empty($order)){
			$totalCash = 0;
			foreach($order['OrderItem'] as $orderItem){
				if($orderItem['status'] == STATUS_ORDER_ITEM_RECEIVED){
					$totalCash += $orderItem['amount'] * $orderItem['item_cost'];
				}
			}
			$this->id = $orderId;
			if($this->saveField('total_cash', $totalCash)){
				return $totalCash;
			}
		}
		return false;
	}

}
