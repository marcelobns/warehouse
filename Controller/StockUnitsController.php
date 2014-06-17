<?php
App::uses('AppController', 'Controller');
/**
 * StockUnits Controller
 *
 * @property StockUnit $StockUnit
 * @property PaginatorComponent $Paginator
 */
class StockUnitsController extends AppController {

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
		$this->StockUnit->recursive = 0;
		$this->set('stockUnits', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StockUnit->exists($id)) {
			throw new NotFoundException(__('Invalid stock unit'));
		}
		$options = array('conditions' => array('StockUnit.' . $this->StockUnit->primaryKey => $id));
		$this->set('stockUnit', $this->StockUnit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StockUnit->create();
			if ($this->StockUnit->save($this->request->data)) {
				$this->Session->setFlash(__('The stock unit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock unit could not be saved. Please, try again.'));
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
		if (!$this->StockUnit->exists($id)) {
			throw new NotFoundException(__('Invalid stock unit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StockUnit->save($this->request->data)) {
				$this->Session->setFlash(__('The stock unit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock unit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StockUnit.' . $this->StockUnit->primaryKey => $id));
			$this->request->data = $this->StockUnit->find('first', $options);
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
		$this->StockUnit->id = $id;
		if (!$this->StockUnit->exists()) {
			throw new NotFoundException(__('Invalid stock unit'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StockUnit->delete()) {
			$this->Session->setFlash(__('The stock unit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The stock unit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
