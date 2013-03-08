<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Order $Order
 * @property WorkingSchedule $WorkingSchedule
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxlength' => array(
				'rule' => array('maxlength', 35),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'passwd' => array(
			'required' => array(
				'rule' => 'notEmpty',
			),
			'min' => array(
		        'rule' => array('minLength', 6),
		     ),
		     'match'=>array(
		        'rule' => 'validatePasswdConfirm',
        	),
		),
   		'passwd_confirm' => array(
			'required' => array(
				'rule' => 'notEmpty',
			),
    	),
	);
	
	public function validatePasswdConfirm($params,$opt){
		$assoc = each($params);
	    if ($this->data['User'][$assoc['key']] === $this->data['User'][$assoc['key'].'_confirm']) {
	      return true;
	    }
	    return false;
	}
	
	public function beforeSave($options = array()) {
		if (isset($this->data['User']['passwd']) && !empty($this->data['User']['passwd'])){
			$this->data['User']['password'] = Security::hash($this->data['User']['passwd'], null, true);
			unset($this->data['User']['passwd']);
		}

		if (isset($this->data['User']['passwd_confirm'])){
			unset($this->data['User']['passwd_confirm']);
		}

		return true;
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'WorkingSchedule' => array(
			'className' => 'WorkingSchedule',
			'foreignKey' => 'user_id',
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

}
