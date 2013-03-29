<?php
/**
 * OrderItemFixture
 *
 */
class OrderItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'item_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'item_cost' => array('type' => 'float', 'null' => true, 'default' => null),
		'amount' => array('type' => 'integer', 'null' => true, 'default' => null),
		'delete_flag' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 2),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'order_id' => 1,
			'item_id' => 1,
			'item_cost' => 1,
			'amount' => 1,
			'delete_flag' => 1,
			'created' => '2013-03-29 01:59:14',
			'updated' => '2013-03-29 01:59:14'
		),
	);

}
