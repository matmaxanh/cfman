<?php
App::uses('AppController', 'Controller');

class InvoiceController extends AppController {

	public $uses = array('Order', 'Invoice');

/**
 * Print invoice
 *
 * @return void
 */
	public function display($invoiceId = null) {
		$this->autoRender = false;
		if(!is_null($invoiceId)){
		}
		
	}
}
