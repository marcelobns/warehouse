<?php
App::uses('AppController', 'Controller');
/**
 * PaymentTypes Controller
 *
 * @property PaymentType $PaymentType
 * @property PaginatorComponent $Paginator
 */
class PaymentTypesController extends AppController {

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
		$this->PaymentType->recursive = 0;
		$this->set('paymentTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PaymentType->exists($id)) {
			throw new NotFoundException(__('Invalid payment type'));
		}
		$options = array('conditions' => array('PaymentType.' . $this->PaymentType->primaryKey => $id));
		$this->set('paymentType', $this->PaymentType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PaymentType->create();
			if ($this->PaymentType->save($this->request->data)) {
				$this->Session->setFlash(__('The payment type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment type could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->PaymentType->Account->find('list');
		$this->set(compact('accounts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PaymentType->exists($id)) {
			throw new NotFoundException(__('Invalid payment type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PaymentType->save($this->request->data)) {
				$this->Session->setFlash(__('The payment type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payment type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PaymentType.' . $this->PaymentType->primaryKey => $id));
			$this->request->data = $this->PaymentType->find('first', $options);
		}
		$accounts = $this->PaymentType->Account->find('list');
		$this->set(compact('accounts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PaymentType->id = $id;
		if (!$this->PaymentType->exists()) {
			throw new NotFoundException(__('Invalid payment type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PaymentType->delete()) {
			$this->Session->setFlash(__('The payment type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The payment type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
