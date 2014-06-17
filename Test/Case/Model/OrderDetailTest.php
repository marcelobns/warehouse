<?php
App::uses('OrderDetail', 'Model');

/**
 * OrderDetail Test Case
 *
 */
class OrderDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_detail',
		'app.order',
		'app.order_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderDetail = ClassRegistry::init('OrderDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderDetail);

		parent::tearDown();
	}

}
