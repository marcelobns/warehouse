<?php
App::uses('CapitalistType', 'Model');

/**
 * CapitalistType Test Case
 *
 */
class CapitalistTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.capitalist_type',
		'app.capitalist',
		'app.order',
		'app.order_type',
		'app.order_detail',
		'app.payment_type',
		'app.account',
		'app.organization',
		'app.trade',
		'app.stock',
		'app.stock_type',
		'app.stock_unit',
		'app.stock_situation',
		'app.stock_rate',
		'app.user',
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
		$this->CapitalistType = ClassRegistry::init('CapitalistType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CapitalistType);

		parent::tearDown();
	}

}
