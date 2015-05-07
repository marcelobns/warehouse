<?php
App::uses('AppController', 'Controller');
class OrdersController extends AppController {

	public $components = array('Paginator');

	public function beforeFilter() {
	    parent::beforeFilter();
		$this->set('filters', array(
			'Order.num||\'/\'||Order.reference_year'=>'Número',
			'OrderDetail.value'=>'Processo',
			'Seller.name'=>'Fornecedor'
		));
	}

    public function index($module_id = null) {
		$fields = array(
			'Order.date_time','Order.num', 'Order.reference_year',
			'Order.canceled','Order.done',
			'OrderType.name',
			'Seller.name',
			'Buyer.name',
			);
        $joins = array();
        $conditions = array(
            'OrderType.module_id'=>AppController::getModule(),
            'OrderType.role_sort >= '.AppController::getRoleSort(),
            'OrderType.inventory = false',
            'OR'=>array(
                AppController::getOrganizationId().' = ANY(Seller.parent_array)',
                AppController::getScope().' = ANY(Buyer.parent_array)',
            )
        );
        $this->paginate = array(
			'fields'=>$fields,
            'joins'=> $joins,
            'conditions'=>$conditions,
            'group'=>array('Order.id','OrderType.id', 'Seller.id', 'Buyer.id'),
            'order' => array(
                'Order.datetime'=>'DESC',
                'Order.id'=>'DESC'
            ),
        );
		$this->set('orders', $this->Paginator->paginate());
        $this->set('lasts', $this->lasts());
	}

	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
        $this->Order->unBindModel(array(
            'belongsTo' => array('Broker', 'PaymentType'),
        ));
        $order = $this->Order->find('first', array(
			'fields'=>array(
				'Order.id', 'Order.date_time', 'Order.order_type_id', 'Order.reference_year', 'Order.note', 'Order.canceled_note', 'Order.canceled',
				'Seller.name', 'Buyer.name',
				'OrderType.name','OrderType.id'
				),
            'conditions' => array('Order.' . $this->Order->primaryKey => $id)
        ));
        $order['OrderDetail'] = $this->Order->OrderDetail->find('all', array(
            'recursive'=>-1,
            'fields'=>array(
                'OrderDetailV.id',
                'OrderDetailV.value',
                'OrderDetail.*'),
            'joins'=>array(
                array(
                    'table' => 'order_details',
                    'alias' => 'OrderDetailV',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'OrderDetailV.name = OrderDetail.name',
                        'OrderDetailV.order_id'=> $id
                    )
                ),
            ),
            'conditions'=>array(
                'OrderDetail.order_type_id' => $order['Order']['order_type_id'],
                'OrderDetail.order_id is null'
            ),
            'order'=>array('OrderDetail.sort'=>'ASC')
        ));
        $this->Order->Trade->unBindModel(array(
            'belongsTo' => array('Seller', 'Buyer'),
        ));
        $order['Trade'] = $this->Order->Trade->find('all', array(
            'recursive'=>0,
            'fields'=> array(
				'Trade.id','Trade.buy_amount','Trade.sell_amount','Trade.buy_price', 'Trade.sell_price',
				'Stock.id','Stock.num','Stock.name','Stock.units','Stock.description',
				'StockSituation.id','StockSituation.name',
				'StockGroup.name', 'StockGroup.sort', 'StockType.name'),
            'conditions'=>array('Trade.order_id'=>$id),
            'order'=>array('StockGroup.sort'=>'ASC', 'Stock.num'=>'ASC', 'Stock.description'=>'ASC')
        ));
		$this->set('order', $order);
        $this->set('lasts', $this->lasts());
	}

    public function add_type($order_id = null) {
        if ($this->request->is('post')) {
            if(isset($order_id))
                return $this->redirect(array('action' =>'reuse', $order_id, $this->request->data['Order']['order_type_id'], $this->request->data['Order']['buyer_id']));
            return $this->redirect(array('action' => 'add', $this->request->data['Order']['order_type_id']));
        }
        $orderTypes = $this->Order->OrderType->find('list', array(
            'recursive'=>-1,
            'conditions'=>array(
                'OrderType.module_id'=>AppController::getModule(),
                'OrderType.organization_scope_id' => array(0, AppController::getScope()),
                'OrderType.role_sort >= '.AppController::getRoleSort(),
                'OrderType.inventory'=>false
            ),
            'order'=>array('OrderType.sort'=>'ASC', 'OrderType.name'=>'ASC'),
        ));
        $buyers = null;
        if(isset($order_id)){
            $buyers = $this->Order->Buyer->getChildOrganization(1, AppController::getScope());
        }
        $modal_title = __('New Order');
        $this->set(compact('orderTypes', 'modal_title', 'buyers', 'order_id'));
        $this->layout ='modal';
    }

	public function add($order_type_id = null) {
		if($this->request->is('post')) {
            $this->Order->create();
            $current = $this->Order->find('all', array(
                'fields'=>array('MAX(num) as current'),
                'conditions'=>array(
                    'Order.reference_year' => date('Y'),
                    'Order.order_type_id' => $order_type_id,
                    'OrderType.organization_scope_id' => array(0, AppController::getScope()),
                )
            ));
            $next = $current[0][0]['current'] == null ? 1 : $current[0][0]['current'] + 1;
            $this->request->data['Order']['reference_year'] = date('Y');
            $this->request->data['Order']['num'] = $next;

			if ($this->Order->saveall($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('controller'=>'trades', 'action' => 'add', $this->Order->id));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
        $order_type = $this->Order->OrderType->find('first', array(
            'recursive'=>-1,
            'conditions'=>array('OrderType.id' => $order_type_id)
        ));
        $sellers = $this->Order->Seller->getChildOrganization($order_type['OrderType']['seller_type_id'], AppController::getScope());
        $buyers = $this->Order->Buyer->getChildOrganization($order_type['OrderType']['buyer_type_id'], 2);

        $seller_id = null;
        if($order_type['OrderType']['seller_type_id'] == AppController::getOrganizationType()){
            $seller_id = AppController::getOrganizationId();
        }
		$orderDetails = $this->Order->OrderDetail->find('all', array(
            'recursive'=> -1,
            'conditions'=>array(
                'OrderDetail.order_type_id'=>$order_type_id,
                'OrderDetail.order_id is null'
            ),
            'order'=>array('sort'=>'ASC')
        ));
		$this->set(compact('orderTypes', 'sellers', 'buyers', 'orderDetails', 'order_type', 'seller_id'));
        $this->set('lasts', $this->lasts());
	}

	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Order->find('first', array(
                'recursive'=>-1,
                'conditions' => array('Order.' . $this->Order->primaryKey => $id)
            ));
            $this->request->data['OrderDetail'] = $this->Order->OrderDetail->find('all', array(
                'recursive'=>-1,
                'fields'=>array(
                    'OrderDetailV.id',
                    'OrderDetailV.value',
                    'OrderDetail.*'),
                'joins'=>array(
                    array(
                        'table' => 'order_details',
                        'alias' => 'OrderDetailV',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'OrderDetailV.name = OrderDetail.name',
                            'OrderDetailV.order_id'=> $id
                        )
                    ),
                ),
                'conditions'=>array(
                    'OrderDetail.order_type_id' => $this->request->data['Order']['order_type_id'],
                    'OrderDetail.order_id is null'
                ),
                'order'=>array('OrderDetail.sort'=>'ASC')
            ));
            $this->Order->Trade->unBindModel(array(
                'belongsTo' => array('Broker', 'PaymentType', 'Seller', 'Buyer'),
            ));
            $this->request->data['Trade'] = $this->Order->Trade->find('all', array(
                'recursive'=>0,
                'fields'=> array('Trade.*', 'Stock.*', 'StockSituation.*', 'StockGroup.name', 'StockGroup.sort', 'StockType.name'),
                'conditions'=>array('Trade.order_id'=>$id),
                'order'=>array('StockGroup.sort'=>'ASC', 'Stock.num'=>'ASC', 'Stock.description'=>'ASC')
            ));
		}
        $order_type = $this->Order->OrderType->find('first', array(
            'recursive'=>-1,
            'conditions'=>array('OrderType.id' => $this->request->data['Order']['order_type_id'])
        ));
        $sellers = $this->Order->Seller->find('list', array(
            'recursive'=>-1,
            'conditions'=>array('id'=>$this->request->data['Order']['seller_id'])
        ));
        $buyers = $this->Order->Buyer->getChildOrganization($order_type['OrderType']['buyer_type_id'], 2);
        $this->set(compact('orderTypes', 'sellers', 'buyers', 'order_type'));
        $this->set('order', $this->request->data);
        $this->set('lasts', $this->lasts());
	}

    public function reuse($id = null, $order_type_id = null, $buyer_id = null) {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        $order_type = $this->Order->OrderType->find('first', array(
            'recursive'=>-1,
            'conditions'=>array('OrderType.id' => $order_type_id)
        ));
        $isBuy = AppController::getOrganizationType() != $order_type['OrderType']['seller_type_id'] ? true : false;
        $this->Order->create();
        $current = $this->Order->find('all', array(
            'fields'=>array('MAX(num) as current'),
            'conditions'=>array(
                'reference_year' => date('Y'),
                'order_type_id' => $order_type_id,
                'OrderType.organization_scope_id' => array(0, AppController::getScope()),
            )
        ));
        $next = $current[0][0]['current'] == null ? 1 : $current[0][0]['current'] + 1;
        $order['Order']['num'] = $next;
        $order['Order']['reference_id'] = $id;
        $order['Order']['order_type_id'] = $order_type_id;
        $order['Order']['seller_id'] = AppController::getOrganizationId();
        $order['Order']['buyer_id'] = $buyer_id;

        if ($this->Order->saveAll($order)) {
            if($isBuy){
                $result = $this->Order->query(' INSERT INTO trades(
                                                        order_id, stock_id, buy_amount, buy_price,
                                                        stock_situation_id, buyer_id)
                                                SELECT  :order_id, stock_id,
                                                        (buy_amount+sell_amount), (buy_price+sell_price),
                                                        stock_situation_id, :buyer_id
                                                FROM trades WHERE order_id = :id;', array('order_id'=>$this->Order->id, 'id'=>$id, 'buyer_id'=>$buyer_id));
            } else {
                $result = $this->Order->query(' INSERT INTO trades(
                                                        order_id, stock_id, sell_amount, sell_price,
                                                        stock_situation_id, buyer_id)
                                                SELECT  :order_id, stock_id,
                                                        (buy_amount+sell_amount), (buy_price+sell_price),
                                                        stock_situation_id, :buyer_id
                                                FROM trades WHERE order_id = :id;', array('order_id'=>$this->Order->id, 'id'=>$id, 'buyer_id'=>$buyer_id));
            }
            $this->Session->setFlash(__('The order has been saved.'));
            return $this->redirect(array('action' => 'edit', $this->Order->id));
        } else {
            $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function print_order($id = null) {
        AppController::callJasperReport(
            'almoxarifado',
            'order_m1.pdf?order_id='.$id.'&user_id='.$this->Session->read('Auth.User.id')
        );
    }

	public function delete($id = null) {
        $this->Order->unBindModel(array(
            'belongsTo'=>array('Broker', 'PaymentType', 'Seller', 'Buyer'),
            'hasMany'=>array('OrderDetail')
        ));
        $order = $this->Order->find('first', array(
            'conditions'=>array('Order.id'=>$id)
        ));
        $this->request->onlyAllow('post', 'delete');
        if($order['OrderType']['delete_orphan_stock']){
            $stocks = array();
            foreach($order['Trade'] as $i=>$value){
                array_push($stocks, $value['stock_id']);
            }
            $this->Order->Trade->Stock->deleteAll(array('Stock.id'=>$stocks), false);
        }
        $this->Order->Trade->deleteall(array('Trade.order_id'=>$id), false);
        $this->Order->OrderDetail->deleteall(array('OrderDetail.order_id'=>$id), false);

		if ($this->Order->delete($id)){
			$this->Session->setFlash(__('The order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action'=>'index'));
	}

    public function cancel($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Order->save($this->request->data)) {
                $result = $this->Order->query(' UPDATE trades SET
                                                canceled = true,
                                                canceled_auth_id = :user_id,
                                                canceled_note = :canceled_note,
                                                updater_id = :updater_id,
                                                updated = :updated
                                                WHERE order_id = :id', array('user_id'=>$this->Session->read('Auth.User.id'),
                                                                             'canceled_note'=>$this->request->data['Order']['canceled_note'],
                                                                             'id'=>$id,
                                                                             'updater_id'=>$this->Session->read('Auth.User.id'),
                                                                             'updated'=>date('Y-m-d')));
                $this->Session->setFlash(__('The order has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
            }
        }
        $this->request->data = $this->Order->find('first', array(
            'recursive'=>-1,
            'conditions' => array('Order.' . $this->Order->primaryKey => $id)
        ));
        $this->layout = 'modal';
        $this->set('modal_title', __('Cancel Order'));
    }

    public function lasts(){
        $this->Order->unBindModel(array('belongsTo'=>array('Broker', 'PaymentType', 'Seller', 'Buyer')));
        $lasts = $this->Order->find('all', array(
			'unsearch'=>true,
            'recursive'=>0,
            'fields'=>array('Order.id'),
            'conditions'=>array(
                'OrderType.module_id'=>AppController::getModule(),
            ),
            'order'=>array('Order.id'=>'DESC'),
            'limit'=>20
        ));
        return $lasts;
    }
}
