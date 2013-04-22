<?php
App::uses('AppController', 'Controller');
/**
 * Sale Controller
 *
 */
class SaleController extends AppController {
	
	public $uses = array('Sale');
	
	function admin_index(){
		if($this->request->is('post') && isset($this->request->data['Sale']['month'])){
			$month = $this->request->data['Sale']['month'];
		}else{
			$month = date('Y-m');
		}
		$conditions['Sale.created >='] = $month.'-01';
		$conditions['Sale.created <='] = $month.'-31';
		$sales = $this->Sale->find('all', array(
			'recursive' => -1,
			'conditions' => $conditions,
		));
		
		$data = $dates = array();
		foreach($sales as $row){
			$dates[] = "'".$row['Sale']['income_day']."'";
			$data[$row['Sale']['income_day']] = $row['Sale']['income'];
		}
		$this->set(compact('dates', 'data', 'month'));
	}
	
	function admin_zone(){
		
	}
	
	function admin_staff(){
		
	}
	
}
?>