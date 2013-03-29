<?php
App::uses('OrdersController', 'Controller');

/**
 * OrdersController Test Case
 *
 */
class OrdersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order',
		'app.table',
		'app.zone',
		'app.booking',
		'app.user',
		'app.working_schedule',
		'app.order_item',
		'app.item',
		'app.category',
		'app.warehouse'
	);

}
