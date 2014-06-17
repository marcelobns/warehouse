<?php
App::uses('OrganizationType', 'Model');

/**
 * OrganizationType Test Case
 *
 */
class OrganizationTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.organization_type',
		'app.organization'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrganizationType = ClassRegistry::init('OrganizationType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrganizationType);

		parent::tearDown();
	}

}
