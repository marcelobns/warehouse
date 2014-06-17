<?php
App::uses('StockGroup', 'Model');

/**
 * StockGroup Test Case
 *
 */
class StockGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stock_group',
		'app.stock'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StockGroup = ClassRegistry::init('StockGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StockGroup);

		parent::tearDown();
	}

}
