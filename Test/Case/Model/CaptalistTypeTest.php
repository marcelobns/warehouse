<?php
App::uses('CaptalistType', 'Model');

/**
 * CaptalistType Test Case
 *
 */
class CaptalistTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.captalist_type',
		'app.captalist'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CaptalistType = ClassRegistry::init('CaptalistType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CaptalistType);

		parent::tearDown();
	}

}
