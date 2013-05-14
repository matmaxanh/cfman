<?php
App::uses('AppModel', 'Model');
/**
 * Store Model
 *
 * @property Item $Item
 */
class Store extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $actsAs = array('Containable');
	
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
