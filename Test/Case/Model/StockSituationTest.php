<?php
App::uses('StockSituation', 'Model');

/**
 * StockSituation Test Case
 *
 */
class StockSituationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stock_situation',
		'app.stock',
		'app.trade'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StockSituation = ClassRegistry::init('StockSituation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StockSituation);

		parent::tearDown();
	}

}
