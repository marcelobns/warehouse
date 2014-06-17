<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.organization',
		'app.organization_type',
		'app.stock',
		'app.stock_type',
		'app.stock_group',
		'app.stock_unit',
		'app.stock_situation',
		'app.trade',
		'app.order',
		'app.order_type',
		'app.seller_type',
		'app.buyer_type',
		'app.order_detail',
		'app.seller',
		'app.buyer',
		'app.payment_type',
		'app.account',
		'app.broker',
		'app.reference',
		'app.canceled_auth',
		'app.creator',
		'app.updater',
		'app.buy_order',
		'app.stock_rate',
		'app.user_role',
		'app.module',
		'app.role'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
