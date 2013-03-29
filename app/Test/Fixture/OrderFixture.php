<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'table_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'status' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 2, 'comment' => 'Trạng thái order. 0: Chờ, 1: Đang chuyển, 2: Đã được phục vụ'),
		'note' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Ghi chú phản hồi về trạng thái order', 'charset' => 'utf8'),
		'total_cash' => array('type' => 'float', 'null' => true, 'default' => null),
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
			'table_id' => 1,
			'user_id' => 1,
			'status' => 1,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'total_cash' => 1,
			'delete_flag' => 1,
			'created' => '2013-03-29 01:55:48',
			'updated' => '2013-03-29 01:55:48'
		),
	);

}
