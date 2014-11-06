<?php
App::uses('AppController', 'Controller');

class OrganizationsController extends AppController {

	public $components = array('Paginator');

	public function index($organization_type_id = null) {

        $organizationType = $this->Organization->OrganizationType->find('first', array(
            'conditions'=>array('OrganizationType.id'=>$organization_type_id)
        ));
        $conditions = array(
            'Organization.enabled'=>true,
            'OrganizationType.id'=>$organization_type_id
        );
        if($organizationType['OrganizationType']['internal'])
            $conditions = array(
                AppController::getScope().' = ANY(Organization.parent_array)',
                'Organization.enabled'=>true,
                'OrganizationType.id'=>$organization_type_id
            );

        if(@$_GET['q']){
            $conditions = array(
                'Organization.enabled'=>true,
                'OrganizationType.id'=>$organization_type_id,
                'OR' => array(
                    'ParentOrganization.name ilike \''.$_GET['q'].'\'',
                    'Organization.name ilike \'%'.$_GET['q'].'%\'',
                )
            );
            if($organizationType['OrganizationType']['internal'])
                $conditions = array(
                    AppController::getScope().' = ANY(Organization.parent_array)',
                    'OrganizationType.id'=>$organization_type_id,
                    'OR' => array(
                        'ParentOrganization.name ilike \''.$_GET['q'].'\'',
                        'ParentOrganization.acronym ilike \''.$_GET['q'].'\'',
                        'Organization.name ilike \'%'.$_GET['q'].'%\'',
                        'Organization.acronym ilike \''.$_GET['q'].'%\'',
                    )
                );
        }

        $this->paginate = array(
            'fields'=>array('Organization.id', 'Organization.name', 'ParentOrganization.id', 'ParentOrganization.name', 'Organization.enabled'),
            'recursive'=>0,
            'conditions'=>$conditions,
            'order' => array(
                'Parent.id'=>'ASC',
                'Organization.name'=>'ASC'
            ),
        );
		$this->set('organizations', $this->Paginator->paginate());
        $this->set('organizationType', $organizationType);
	}

	public function view($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$this->set('organization', $this->Organization->find('first', $options));
	}

	public function add($type_id = null) {
        $type = $this->Organization->OrganizationType->find('first', array(
            'conditions'=>array('OrganizationType.id'=>$type_id)
        ));
		if ($this->request->is('post')) {
			$this->Organization->create();
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__('The organization has been saved.'));
                return $this->redirect(array('action' => 'index', $this->request->data['Organization']['organization_type_id']));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'));
			}
		}
		$parents = $this->Organization->getChildOrganization($type_id, AppController::getScope());
		$this->set(compact('parents', 'organizationTypes', 'type'));
	}

	public function edit($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__('The organization has been saved.'));
				return $this->redirect(array('action' => 'index', $this->request->data['Organization']['organization_type_id']));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'));
			}
		} else {
            $this->Organization->unBindModel(array(
                'hasMany' => array('Stock', 'Trade', 'User', 'ChildOrganization'),
                'belongsTo' => array('ParentOrganization')
            ));
			$options = array(
                'conditions'=>array('Organization.' . $this->Organization->primaryKey => $id)
            );
			$this->request->data = $this->Organization->find('first', $options);
		}
        $type_id = $this->request->data['Organization']['organization_type_id'];
        $parents = $this->Organization->getChildOrganization($type_id, AppController::getScope());
        $this->set(compact('parents', 'organizationTypes'));
	}

	public function delete($id = null) {
		$this->Organization->id = $id;
		if (!$this->Organization->exists()) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Organization->delete()) {
			$this->Session->setFlash(__('The organization has been deleted.'));
		} else {
			$this->Session->setFlash(__('The organization could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
