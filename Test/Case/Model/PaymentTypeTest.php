<?php
App::uses('PaymentType', 'Model');

/**
 * PaymentType Test Case
 *
 */
class PaymentTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.payment_type',
		'app.account',
		'app.order',
		'app.order_type',
		'app.seller_type',
		'app.buyer_type',
		'app.order_detail',
		'app.seller',
		'app.buyer',
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
		$this->PaymentType = ClassRegistry::init('PaymentType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PaymentType);

		parent::tearDown();
	}

}
