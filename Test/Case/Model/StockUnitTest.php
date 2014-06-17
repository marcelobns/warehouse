<?php
App::uses('StockUnit', 'Model');

/**
 * StockUnit Test Case
 *
 */
class StockUnitTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stock_unit',
		'app.stock'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StockUnit = ClassRegistry::init('StockUnit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StockUnit);

		parent::tearDown();
	}

}
