<?php
App::uses('AppController', 'Controller');
/**
 * StockSituations Controller
 *
 * @property StockSituation $StockSituation
 * @property PaginatorComponent $Paginator
 */
class StockSituationsController extends AppController {

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
		$this->StockSituation->recursive = 0;
		$this->set('stockSituations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StockSituation->exists($id)) {
			throw new NotFoundException(__('Invalid stock situation'));
		}
		$options = array('conditions' => array('StockSituation.' . $this->StockSituation->primaryKey => $id));
		$this->set('stockSituation', $this->StockSituation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StockSituation->create();
			if ($this->StockSituation->save($this->request->data)) {
				$this->Session->setFlash(__('The stock situation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock situation could not be saved. Please, try again.'));
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
		if (!$this->StockSituation->exists($id)) {
			throw new NotFoundException(__('Invalid stock situation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StockSituation->save($this->request->data)) {
				$this->Session->setFlash(__('The stock situation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock situation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StockSituation.' . $this->StockSituation->primaryKey => $id));
			$this->request->data = $this->StockSituation->find('first', $options);
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
		$this->StockSituation->id = $id;
		if (!$this->StockSituation->exists()) {
			throw new NotFoundException(__('Invalid stock situation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StockSituation->delete()) {
			$this->Session->setFlash(__('The stock situation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The stock situation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
