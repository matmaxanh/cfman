<?php
/**
 * SaleFixture
 *
 */
class SaleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'key' => 'primary'),
		'income' => array('type' => 'integer', 'null' => true, 'default' => null),
		'income_day' => array('type' => 'date', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '',
			'income' => 1,
			'income_day' => '2013-04-22',
			'created' => '2013-04-22 07:22:18'
		),
	);

}
