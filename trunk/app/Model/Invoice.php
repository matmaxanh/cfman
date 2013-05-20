<?php
App::uses('AppModel', 'Model');
/**
 * Invoice Model
 *
 * @property Order $Order
 */
class Invoice extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'InvoiceItem' => array(
			'className' => 'InvoiceItem',
			'foreignKey' => 'invoice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	/*
	 * create invoice to payment 
	 * 
	 * @param int orderId
	 * @param float $totalPaid money which customer paid
	 * @param float $discountAmount discount money for invoice, default = 0
	 * 
	 * @return boolean
	 */
	public function payment($orderId, $totalPaid, $discountAmount = 0){
		$order = $this->Order->find('first', array(
			'conditions' => array('Order.id' => $orderId),
		));
		if(!empty($order)){
			$orderItems = $this->Order->OrderItem->find('all', array(
				'recursive' => -1,
				'conditions' => array('OrderItem.order_id' => $orderId, 'OrderItem.status' => STATUS_ORDER_ITEM_RECEIVED),
			));
			$totalCost = 0;
			
			//calculate total cost
			$invoiceItems = array();
			foreach($orderItems as $orderItem){
				unset($orderItem['OrderItem']['id']);
				unset($orderItem['OrderItem']['order_id']);
				$invoiceItems[] = $orderItem['OrderItem'];
				$totalCost += $orderItem['OrderItem']['amount'] * $orderItem['OrderItem']['item_cost'];
			}
			
			$totalRefunded = $totalPaid - $totalCost - $discountAmount;
			
			$this->create();
			if($this->save(array('Invoice' => array(
				'order_id' => $orderId,
				'total_cost' => $totalCost,
				'discount_amount' => $discountAmount,
				'total_paid' => $totalPaid,
				'total_refunded' => abs($totalRefunded),
			)))){
				$invoiceId = $this->getLastInsertID();
				if(!empty($invoiceItems)){
					foreach($invoiceItems as $invoiceItem){
						$invoiceItem['invoice_id'] = $invoiceId;
					}
					$this->InvoiceItem->saveAll($invoiceItems);
				}
				return true;
			}
		}
		return false;
	}
}
