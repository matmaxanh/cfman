<?php
class HtmlController extends AppController {
	var $uses = null;
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();
	}
	
	public function login() {
		$this->layout = 'login';
	}
	
	public function home() {
		
	}
	
	public function menu() {
		
	}
	
	public function menu_add() {
		
	}
}