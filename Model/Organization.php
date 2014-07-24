<?php
App::uses('AppModel', 'Model');
/**
 * Organization Model
 *
 * @property OrganizationType $OrganizationType
 * @property Organization $ParentOrganization
 * @property Organization $ChildOrganization
 * @property Stock $Stock
 * @property Trade $Trade
 * @property User $User
 */
class Organization extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'organization_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
	);

	public $belongsTo = array(
		'OrganizationType' => array(
			'className' => 'OrganizationType',
			'foreignKey' => 'organization_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ParentOrganization' => array(
			'className' => 'Organization',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'ChildOrganization' => array(
			'className' => 'Organization',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => array('ChildOrganization.enabled'),
			'fields' => '',
			'order' => array('ChildOrganization.name'=>'ASC'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Stock' => array(
			'className' => 'Stock',
			'foreignKey' => 'organization_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Trade' => array(
			'className' => 'Trade',
			'foreignKey' => 'buyer_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'organization_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    function getChildOrganization($organization_type_id = null, $parent_id = 1) {
        $alias = $this->tableToModel['organizations'];
        $this->unBindModel(array(
            'hasMany' => array('Stock', 'Trade', 'User'),
            'belongsTo' => array('ParentOrganization', 'OrganizationType')
        ));
        $organizations = $this->find('all', array(
                'conditions' => array(
                    $alias.'.organization_type_id' => $organization_type_id,
                    $parent_id.' = ANY('.$alias.'.parent_array)',
                    $alias.'.enabled'=>true
                ),
                'order' => array($alias.'.id'=>'ASC', $alias.'.name'=>'ASC')
            )
        );
        $return = array();
        foreach ($organizations as $i=>$organization) {
            $acronym = ' ';
            if($i == 0)
                $return[$organization[$alias]['name']][$organization[$alias]['id']] = $organization[$alias]['name'].$acronym;
            foreach ($organization['ChildOrganization'] as $child) {
                if(trim($child['acronym']) != ''){
                    $acronym = ' - '.$child['acronym'];
                }
                $return[$organization[$alias]['name']][$child['id']] = $child['name'].$acronym;
                $acronym = ' ';
            }
        }
        if(sizeof($return) != 0){
            return $return;
        } else {
            $this->unBindModel(array(
                'hasMany' => array('Stock', 'Trade', 'User', 'ChildOrganization'),
                'belongsTo' => array('ParentOrganization','OrganizationType')
            ));
            return $this->find('list', array(
                    'recursive' => -1,
                    'conditions' => array(
                        $alias.'.organization_type_id' => $organization_type_id,
                        $alias.'.enabled'=>true
                    ),
                    'order' => array($alias.'.name'=>'ASC')
                )
            );
        }
    }
}
