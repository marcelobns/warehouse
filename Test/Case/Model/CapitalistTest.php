<?php
App::uses('Capitalist', 'Model');

/**
 * Capitalist Test Case
 *
 */
class CapitalistTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.capitalist',
		'app.capitalist_type',
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
		$this->Capitalist = ClassRegistry::init('Capitalist');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Capitalist);

		parent::tearDown();
	}

}
