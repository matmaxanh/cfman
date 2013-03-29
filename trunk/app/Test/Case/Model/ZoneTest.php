<?php
App::uses('Zone', 'Model');

/**
 * Zone Test Case
 *
 */
class ZoneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.zone',
		'app.table',
		'app.booking',
		'app.user',
		'app.order',
		'app.order_item',
		'app.item',
		'app.category',
		'app.warehouse',
		'app.working_schedule'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Zone = ClassRegistry::init('Zone');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Zone);

		parent::tearDown();
	}

}
