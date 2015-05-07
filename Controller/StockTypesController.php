<?php
App::uses('AppController', 'Controller');
/**
 * StockTypes Controller
 *
 * @property StockType $StockType
 * @property PaginatorComponent $Paginator
 */
class StockTypesController extends AppController {

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
		$this->StockType->recursive = 0;
		$this->set('stockTypes', $this->Paginator->paginate(array('module_id'=>AppController::getModule())));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StockType->exists($id)) {
			throw new NotFoundException(__('Invalid stock type'));
		}
		$options = array('conditions' => array('StockType.' . $this->StockType->primaryKey => $id));
		$this->set('stockType', $this->StockType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StockType->create();
			$this->request->data['StockType']['module_id'] = AppController::getModule();
			if ($this->StockType->save($this->request->data)) {
				$this->Session->setFlash(__('The stock type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock type could not be saved. Please, try again.'));
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
		if (!$this->StockType->exists($id)) {
			throw new NotFoundException(__('Invalid stock type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StockType->save($this->request->data)) {
				$this->Session->setFlash(__('The stock type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StockType.' . $this->StockType->primaryKey => $id));
			$this->request->data = $this->StockType->find('first', $options);
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
		$this->StockType->id = $id;
		if (!$this->StockType->exists()) {
			throw new NotFoundException(__('Invalid stock type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StockType->delete()) {
			$this->Session->setFlash(__('The stock type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The stock type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
