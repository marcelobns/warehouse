<?php
App::uses('AppController', 'Controller');

class OrderDetailsController extends AppController {

	public $components = array('Paginator');

	public function index() {
		$this->OrderDetail->recursive = 0;
		$this->set('orderDetails', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->OrderDetail->exists($id)) {
			throw new NotFoundException(__('Invalid order detail'));
		}
		$options = array('conditions' => array('OrderDetail.' . $this->OrderDetail->primaryKey => $id));
		$this->set('orderDetail', $this->OrderDetail->find('first', $options));
	}

	public function add($order_type_id = null) {
		if ($this->request->is('post')) {
			$this->OrderDetail->create();
			if ($this->OrderDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The order detail has been saved.'));
				return $this->redirect(array('controller'=>'order_types', 'action' => 'edit', $order_type_id));
			} else {
				$this->Session->setFlash(__('The order detail could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('orders', 'order_type_id'));
	}

	public function edit($id = null) {
		if (!$this->OrderDetail->exists($id)) {
			throw new NotFoundException(__('Invalid order detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrderDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The order detail has been saved.'));
                return $this->redirect(array('controller'=>'order_types', 'action'=>'edit', $this->request->data['OrderDetail']['order_type_id']));
			} else {
				$this->Session->setFlash(__('The order detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrderDetail.' . $this->OrderDetail->primaryKey => $id));
			$this->request->data = $this->OrderDetail->find('first', $options);
		}
		$orders = $this->OrderDetail->Order->find('list');
		$orderTypes = $this->OrderDetail->OrderType->find('list');
		$this->set(compact('orders', 'orderTypes'));
	}

	public function delete($id = null) {
		$this->OrderDetail->id = $id;
		if (!$this->OrderDetail->exists()) {
			throw new NotFoundException(__('Invalid order detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrderDetail->delete()) {
			$this->Session->setFlash(__('The order detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller'=>'order_types', 'action' => 'index'));
	}}
