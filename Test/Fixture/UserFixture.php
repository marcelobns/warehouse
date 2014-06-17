<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'length' => 256),
		'username' => array('type' => 'string', 'null' => false, 'length' => 256),
		'password' => array('type' => 'string', 'null' => false, 'length' => 256),
		'email' => array('type' => 'string', 'null' => true, 'length' => 300),
		'phone' => array('type' => 'string', 'null' => true, 'length' => 26),
		'organization_id' => array('type' => 'integer', 'null' => false),
		'broker' => array('type' => 'boolean', 'null' => false, 'default' => false),
		'comission' => array('type' => 'float', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => 'now()'),
		'creator_id' => array('type' => 'integer', 'null' => true),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => 'now()'),
		'updater_id' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id')
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ipsum dolor sit am',
			'organization_id' => 1,
			'broker' => 1,
			'comission' => 1,
			'created' => '2014-04-12 19:01:52',
			'creator_id' => 1,
			'updated' => '2014-04-12 19:01:52',
			'updater_id' => 1
		),
	);

}
