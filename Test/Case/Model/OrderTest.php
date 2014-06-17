<?php
App::uses('Order', 'Model');

/**
 * Order Test Case
 *
 */
class OrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order',
		'app.order_type',
		'app.seller_type',
		'app.buyer_type',
		'app.order_detail',
		'app.seller',
		'app.buyer',
		'app.payment_type',
		'app.broker',
		'app.reference',
		'app.canceled_auth',
		'app.creator',
		'app.updater',
		'app.trade'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Order = ClassRegistry::init('Order');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Order);

		parent::tearDown();
	}

}
