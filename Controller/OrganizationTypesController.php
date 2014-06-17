<?php
App::uses('AppController', 'Controller');
/**
 * OrganizationTypes Controller
 *
 * @property OrganizationType $OrganizationType
 * @property PaginatorComponent $Paginator
 */
class OrganizationTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrganizationType->recursive = 0;
		$this->set('organizationTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrganizationType->exists($id)) {
			throw new NotFoundException(__('Invalid organization type'));
		}
		$options = array('conditions' => array('OrganizationType.' . $this->OrganizationType->primaryKey => $id));
		$this->set('organizationType', $this->OrganizationType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrganizationType->create();
			if ($this->OrganizationType->save($this->request->data)) {
				$this->Session->setFlash(__('The organization type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrganizationType->exists($id)) {
			throw new NotFoundException(__('Invalid organization type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrganizationType->save($this->request->data)) {
				$this->Session->setFlash(__('The organization type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrganizationType.' . $this->OrganizationType->primaryKey => $id));
			$this->request->data = $this->OrganizationType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OrganizationType->id = $id;
		if (!$this->OrganizationType->exists()) {
			throw new NotFoundException(__('Invalid organization type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationType->delete()) {
			$this->Session->setFlash(__('The organization type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The organization type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
