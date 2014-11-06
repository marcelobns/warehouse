<?php
App::uses('AppController', 'Controller');
class OrderTypesController extends AppController {

	public $components = array('Paginator');

	public function index() {
        $this->paginate = array(
            'recursive'=>0,
            'conditions'=>array('module_id'=>AppController::getModule()),
            'order'=>array('module_id'=>'ASC', 'sort'=>'ASC')
        );
		$this->set('orderTypes', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->OrderType->exists($id)) {
			throw new NotFoundException(__('Invalid order type'));
		}
		$options = array('conditions' => array('OrderType.' . $this->OrderType->primaryKey => $id));
		$this->set('orderType', $this->OrderType->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->OrderType->create();
			if ($this->OrderType->save($this->request->data)) {
				$this->Session->setFlash(__('The order type has been saved.'));
				return $this->redirect(array('action' => 'edit', $this->OrderType->id));
			} else {
				$this->Session->setFlash(__('The order type could not be saved. Please, try again.'));
			}
		}
		$sellerTypes = $this->OrderType->SellerType->find('list');
		$buyerTypes = $this->OrderType->BuyerType->find('list');
		$module_id = AppController::getModule();
		$this->set(compact('sellerTypes', 'buyerTypes', 'module_id'));
	}

	public function edit($id = null) {
		if (!$this->OrderType->exists($id)) {
			throw new NotFoundException(__('Invalid order type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrderType->save($this->request->data)) {
				$this->Session->setFlash(__('The order type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order type could not be saved. Please, try again.'));
			}
		} else {
			$options = array(
                'recursive' => 1,
                'conditions' => array('OrderType.' . $this->OrderType->primaryKey => $id));
			$this->request->data = $this->OrderType->find('first', $options);
		}
		$sellerTypes = $this->OrderType->SellerType->find('list');
		$buyerTypes = $this->OrderType->BuyerType->find('list');
		$this->set(compact('sellerTypes', 'buyerTypes', 'modules'));
	}

	public function delete($id = null) {
		$this->OrderType->id = $id;
		if (!$this->OrderType->exists()) {
			throw new NotFoundException(__('Invalid order type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrderType->delete()) {
			$this->Session->setFlash(__('The order type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
