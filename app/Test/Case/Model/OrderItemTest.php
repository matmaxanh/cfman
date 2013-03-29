<?php
App::uses('OrderItem', 'Model');

/**
 * OrderItem Test Case
 *
 */
class OrderItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_item',
		'app.order',
		'app.table',
		'app.zone',
		'app.booking',
		'app.user',
		'app.working_schedule',
		'app.item',
		'app.category',
		'app.warehouse'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderItem = ClassRegistry::init('OrderItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderItem);

		parent::tearDown();
	}

}
