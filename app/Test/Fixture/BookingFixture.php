<?php
/**
 * BookingFixture
 *
 */
class BookingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'table_book' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'booker_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 128, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'booker_contact' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'time_from' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'time_to' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'received_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'delete_flag' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
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
			'table_book' => 'Lorem ip',
			'booker_name' => 'Lorem ipsum dolor sit amet',
			'booker_contact' => 'Lorem ipsum dolor sit amet',
			'time_from' => '2013-03-16 16:10:14',
			'time_to' => '2013-03-16 16:10:14',
			'received_by' => 1,
			'delete_flag' => 1,
			'created' => '2013-03-16 16:10:14',
			'updated' => '2013-03-16 16:10:14'
		),
	);

}
