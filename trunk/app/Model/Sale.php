<?php
App::uses('AppModel', 'Model');
App::uses('Invoice', 'Model');
/**
 * Sale Model
 *
 */
class Sale extends AppModel {
	/*
	 * @param date $day format Y-m-d
	 */
	public function calculateIncomeByDay($day){
		$this->Invoice = new Order();
		$data = $this->Invoice->find('all', array(
			'recursive' => -1,
			'conditions' => array('DATE(Invoice.created)' => $day),
			'fields' => array('SUM(Invoice.total_cost) as income_total'),
			'group' => array('DATE(Invoice.created)')
		));
		if(!empty($data)){
			$this->create();
			$this->save(array('Sale' => array(
				'income' => $data[0][0]['income_total'],
				'income_day' => $day,
			)));
		}
	}
	
	public function calculateIncomeByMonth($month, $year){
		$num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		for($i=1; $i <= $num; $i++){
			if($i < 10){
				$day = $year.'-'.$month.'-0'.$i;
			}else{
				$day = $year.'-'.$month.'-'.$i;
			}
			$this->calculateIncomeByDay($day);
		}
	}
}
