<?php
App::uses('Trade', 'Model');

/**
 * Trade Test Case
 *
 */
class TradeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.stock',
		'app.stock_type',
		'app.stock_group',
		'app.stock_unit',
		'app.stock_situation',
		'app.buy_order',
		'app.organization',
		'app.organization_type',
		'app.user',
		'app.stock_rate'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Trade = ClassRegistry::init('Trade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Trade);

		parent::tearDown();
	}

}
