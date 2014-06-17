<?php
App::uses('StockRate', 'Model');

/**
 * StockRate Test Case
 *
 */
class StockRateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stock_rate',
		'app.stock'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StockRate = ClassRegistry::init('StockRate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StockRate);

		parent::tearDown();
	}

}
