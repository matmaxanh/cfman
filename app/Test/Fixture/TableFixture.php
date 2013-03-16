<?php
/**
 * TableFixture
 *
 */
class TableFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'zone_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'name' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'zone_id' => 1,
			'name' => 1,
			'delete_flag' => 1,
			'created' => '2013-03-16 17:02:51',
			'updated' => '2013-03-16 17:02:51'
		),
	);

}
