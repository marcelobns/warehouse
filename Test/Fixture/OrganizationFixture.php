<?php
/**
 * OrganizationFixture
 *
 */
class OrganizationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'organization_type_id' => array('type' => 'integer', 'null' => false),
		'unique_code' => array('type' => 'string', 'null' => true, 'length' => 128),
		'name' => array('type' => 'string', 'null' => false, 'length' => 256),
		'nickname' => array('type' => 'string', 'null' => true, 'length' => 100),
		'acronym' => array('type' => 'string', 'null' => true, 'length' => 10),
		'responsible' => array('type' => 'string', 'null' => true, 'length' => 100),
		'email' => array('type' => 'string', 'null' => true, 'length' => 200),
		'image' => array('type' => 'string', 'null' => true, 'length' => 256),
		'phone' => array('type' => 'string', 'null' => true, 'length' => 64),
		'address' => array('type' => 'string', 'null' => true, 'length' => 300),
		'parent_id' => array('type' => 'integer', 'null' => true),
		'parent_array' => array('type' => 'text', 'null' => true),
		'id_old' => array('type' => 'integer', 'null' => true),
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
			'organization_type_id' => 1,
			'unique_code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'nickname' => 'Lorem ipsum dolor sit amet',
			'acronym' => 'Lorem ip',
			'responsible' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'image' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 1,
			'parent_array' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'id_old' => 1
		),
	);

}
