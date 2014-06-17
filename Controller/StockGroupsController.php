<?php
App::uses('AppController', 'Controller');
/**
 * StockGroups Controller
 *
 * @property StockGroup $StockGroup
 * @property PaginatorComponent $Paginator
 */
class StockGroupsController extends AppController {

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
		$this->StockGroup->recursive = 0;
		$this->set('stockGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StockGroup->exists($id)) {
			throw new NotFoundException(__('Invalid stock group'));
		}
		$options = array('conditions' => array('StockGroup.' . $this->StockGroup->primaryKey => $id));
		$this->set('stockGroup', $this->StockGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StockGroup->create();
			if ($this->StockGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The stock group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock group could not be saved. Please, try again.'));
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
		if (!$this->StockGroup->exists($id)) {
			throw new NotFoundException(__('Invalid stock group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StockGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The stock group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StockGroup.' . $this->StockGroup->primaryKey => $id));
			$this->request->data = $this->StockGroup->find('first', $options);
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
		$this->StockGroup->id = $id;
		if (!$this->StockGroup->exists()) {
			throw new NotFoundException(__('Invalid stock group'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StockGroup->delete()) {
			$this->Session->setFlash(__('The stock group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The stock group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
