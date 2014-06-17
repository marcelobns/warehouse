<?php
App::uses('AppController', 'Controller');
/**
 * StockRates Controller
 *
 * @property StockRate $StockRate
 * @property PaginatorComponent $Paginator
 */
class StockRatesController extends AppController {

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
		$this->StockRate->recursive = 0;
		$this->set('stockRates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StockRate->exists($id)) {
			throw new NotFoundException(__('Invalid stock rate'));
		}
		$options = array('conditions' => array('StockRate.' . $this->StockRate->primaryKey => $id));
		$this->set('stockRate', $this->StockRate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StockRate->create();
			if ($this->StockRate->save($this->request->data)) {
				$this->Session->setFlash(__('The stock rate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock rate could not be saved. Please, try again.'));
			}
		}
		$stocks = $this->StockRate->Stock->find('list');
		$this->set(compact('stocks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StockRate->exists($id)) {
			throw new NotFoundException(__('Invalid stock rate'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StockRate->save($this->request->data)) {
				$this->Session->setFlash(__('The stock rate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock rate could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StockRate.' . $this->StockRate->primaryKey => $id));
			$this->request->data = $this->StockRate->find('first', $options);
		}
		$stocks = $this->StockRate->Stock->find('list');
		$this->set(compact('stocks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StockRate->id = $id;
		if (!$this->StockRate->exists()) {
			throw new NotFoundException(__('Invalid stock rate'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StockRate->delete()) {
			$this->Session->setFlash(__('The stock rate has been deleted.'));
		} else {
			$this->Session->setFlash(__('The stock rate could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
