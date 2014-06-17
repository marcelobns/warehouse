<?php
App::uses('StockType', 'Model');

/**
 * StockType Test Case
 *
 */
class StockTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stock_type',
		'app.stock'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StockType = ClassRegistry::init('StockType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StockType);

		parent::tearDown();
	}

}
