<?php
/**
 * InvoiceFixture
 *
 */
class InvoiceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'cost' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'comment' => 'Gia tri hoa don', 'charset' => 'utf8'),
		'discount' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'comment' => 'Khuyen mai', 'charset' => 'utf8'),
		'received_money' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'comment' => 'Tien thoi', 'charset' => 'utf8'),
		'return_money' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null),
		'delete_flag' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => '0 - live, 1 - deleted'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => '0000-00-00 00:00:00'),
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
			'cost' => 'Lorem ip',
			'discount' => 'Lorem ip',
			'received_money' => 'Lorem ip',
			'return_money' => 'Lorem ipsum dolor sit amet',
			'created_by' => 1,
			'delete_flag' => 1,
			'created' => '2013-05-20 02:58:49',
			'updated' => '2013-05-20 02:58:49'
		),
	);

}
