<?php
App::uses('AppModel', 'Model');
/**
 * Booking Model
 *
 * @property Table $Table
 */
class Booking extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'table_book';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'booker_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'received_by' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

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
			'foreignKey' => 'received_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
