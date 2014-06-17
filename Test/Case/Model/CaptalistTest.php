<?php
App::uses('Captalist', 'Model');

/**
 * Captalist Test Case
 *
 */
class CaptalistTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.captalist',
		'app.captalist_type',
		'app.order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Captalist = ClassRegistry::init('Captalist');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Captalist);

		parent::tearDown();
	}

}
