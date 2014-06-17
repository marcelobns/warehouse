<?php
App::uses('Stock', 'Model');

/**
 * Stock Test Case
 *
 */
class StockTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stock',
		'app.stock_type',
		'app.stock_group',
		'app.stock_unit',
		'app.stock_situation',
		'app.trade',
		'app.buy_order',
		'app.organization',
		'app.organization_type',
		'app.user',
		'app.creator',
		'app.updater',
		'app.stock_rate'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Stock = ClassRegistry::init('Stock');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Stock);

		parent::tearDown();
	}

}
