<?php
App::uses('AppController', 'Controller');

class InvoiceController extends AppController {

	public $uses = array('Order', 'Sale');

/**
 * Print invoice
 *
 * @return void
 */
	public function create($orderId = null) {
		$this->autoRender = false;
//		if(!is_null($orderId)){
//			$this->Order->payment($orderId);
//		}
		$this->Sale->calculateIncomeByMonth(date('m'), date('Y'));
		
	}
}
