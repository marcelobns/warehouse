<?php
App::uses('AppController', 'Controller');
class TradesController extends AppController {

	public $components = array('Paginator');

	public function index() {
		$this->Trade->recursive = 0;
		$this->set('trades', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->Trade->exists($id)) {
			throw new NotFoundException(__('Invalid trade'));
		}
		$options = array('conditions' => array('Trade.' . $this->Trade->primaryKey => $id));
		$this->set('trade', $this->Trade->find('first', $options));
	}

	public function add($order_id = null) {
        $this->Trade->Order->unBindModel(array('belongsTo' => array('Broker', 'PaymentType', 'Seller', 'Buyer')));
        $order = $this->Trade->Order->find('all', array(
            'recursive'=> 0,
            'conditions'=> array(
                'Order.id'=>$order_id
            )
        ));
        $order = $order[0];
        $isBuy = AppController::getOrganizationType() != $order['OrderType']['seller_type_id'] ? true : false;
		if ($this->request->is('post')) {
            switch($order['OrderType']['trade_mode']){
                case 'select' :
                    $this->request->data['Stock']['id'] = $this->request->data['Trade']['stock_id'];
                    $trade_amount = $this->request->data['Trade']['amount'];
                    $stock_units = $this->request->data['Stock']['units'];
                    $trade_amount_unit = @$this->request->data['Trade']['amount_unit'] ? $this->request->data['Trade']['amount_unit'] : 0;
                    if($isBuy){
                        $this->request->data['Trade']['buy_amount'] = ($trade_amount*$stock_units)+$trade_amount_unit;
                        $this->request->data['Trade']['buy_price'] = $this->request->data['Trade']['price'];
                        $this->request->data['Stock']['price'] = $this->request->data['Trade']['price']*$stock_units;
                    } else {
                        $this->request->data['Trade']['sell_amount'] = ($trade_amount*$stock_units)+$trade_amount_unit;
                        $this->request->data['Trade']['sell_price'] = $this->request->data['Trade']['price']*$stock_units;
                    }
                    if ($this->Trade->saveall($this->request->data)) {
                        $this->Session->setFlash(__('The trade has been saved.'));
                        return $this->redirect(array('controller'=>'orders', 'action' => 'edit', $order_id));
                    } else {
                        $this->Session->setFlash(__('The trade could not be saved. Please, try again.'));
                    }
                    break;
                case 'create' :
                    $num_ini = $this->request->data['Stock']['num'];
                    $num = $num_ini;
                    $num_end = ($num_ini + $this->request->data['Stock']['amount']);
                    while ($num < $num_end){
                        $this->request->data['Stock']['num'] = $num;
                        $this->request->data['Stock']['depreciation_date'] = date('Y-m-d');
                        $this->request->data['Stock']['reference_year'] = $order['Order']['reference_year'];
                        $this->request->data['Stock']['last_inventory'] = $order['Order']['reference_year'];
                        $this->request->data['Stock']['organization_id'] = $order['Order']['buyer_id'];
                        $this->request->data['Stock']['stock_unit_id'] = 34;//FIXME generalizar
                        if($isBuy){
                            $this->request->data['Trade']['buy_amount'] = 1;
                            $this->request->data['Trade']['buy_price'] = $this->request->data['Stock']['price'];
                        } else {
                            $this->request->data['Trade']['sell_amount'] = 1;
                            $this->request->data['Trade']['sell_price'] = $this->request->data['Stock']['price'];
                        }
                        $this->Trade->create();
                        if ($this->Trade->saveall($this->request->data)) {
                            $num++;
                        } else {
                            break;
                        }
                    }
                    if($num == $num_end) {
                        if($num_ini == ($num_end-1)){
                            $this->Session->setFlash(__('The trade has been saved.').' '.$num_ini);
                        }else{
                            $this->Session->setFlash(__('The trade has been saved.').' '.$num_ini.' - '.$num_end);
                        }
                        return $this->redirect(array('controller'=>'orders', 'action' => 'edit', $order_id));
                    } else {
                        $this->Session->setFlash(__('The trade could not be saved. Please, try again.').' '.$num);
                    }
                    break;
                case 'num' :
                    $num_ini = $this->request->data['Trade']['num'];
                    $num = $this->request->data['Trade']['num'];
                    $num_end = $this->request->data['Trade']['num_end'];
                    $Stocks = $this->Trade->Stock->find('all', array(
                        'recursive'=>-1,
                        'conditions'=>array(
                            'Stock.stock_group_id'=>$this->request->data['Trade']['stock_group_id'],
                            'Stock.num between '.$num.' and '.$num_end
                        )
                    ));
                    foreach($Stocks as $key=>$value){
                        $data = array();
                        if($value['Stock']['stock_situation_id'] != $this->request->data['Trade']['stock_situation_id']){
                            $data['Stock']['id'] = $value['Stock']['id'];
                            $data['Stock']['stock_situation_id'] = $this->request->data['Trade']['stock_situation_id'];
                        }
                        $data['Trade']['order_id'] = $this->request->data['Trade']['order_id'];
                        $data['Trade']['stock_id'] = $value['Stock']['id'];
                        $data['Trade']['buyer_id'] = $this->request->data['Trade']['buyer_id'];
                        $data['Trade']['stock_situation_id'] = $this->request->data['Trade']['stock_situation_id'];
                        if($isBuy){
                            $data['Trade']['buy_amount'] = 1;
                            $data['Trade']['buy_price'] = $value['Stock']['price'];
                        } else {
                            $data['Trade']['sell_amount'] = 1;
                            $data['Trade']['sell_price'] = $value['Stock']['price'];
                        }
                        $num = $value['Stock']['num'];
                        if (!$this->Trade->saveall($data)) {
                            break;
                        }
                    }
                    if($num == $num_end) {
                        if($num_ini == $num_end){
                            $this->Session->setFlash(__('The trade has been saved.').' '.$num);
                        }else{
                            $this->Session->setFlash(__('The trade has been saved.').' '.$num.' - '.$num_end);
                        }
                        return $this->redirect(array('controller'=>'orders', 'action' => 'edit', $order_id));
                    } else {
                        $this->Session->setFlash(__('The trade could not be saved. Please, try again.').' '.$num);
                    }
                    break;
            }
		}
        switch($order['OrderType']['trade_mode']){
            case 'select' :
                $stocks = $this->Trade->Stock->getStockList(AppController::getModule());
                break;
            case 'create' :
                $stockTypes = $this->Trade->Stock->StockType->find('list', array(
                    'conditions'=>array('module_id'=>AppController::getModule()),
                    'order'=>array('name'=>'ASC')
                ));
                $stockGroups = $this->Trade->Stock->StockGroup->find('list', array(
                    'order'=>array('sort'=>'ASC', 'name'=>'ASC')
                ));
                $stockSituations = $this->Trade->StockSituation->find('list');
                break;
            case 'num' :
                $stockGroups = $this->Trade->Stock->StockGroup->find('list', array(
                    'order'=>array('sort'=>'ASC', 'name'=>'ASC')
                ));
                $stockSituations = $this->Trade->StockSituation->find('list');
                break;
        }
		$this->set(compact('stocks', 'stockSituations', 'order', 'stockTypes', 'stockGroups', 'isBuy'));
	}

	public function edit($id = null) {
		if (!$this->Trade->exists($id)) {
			throw new NotFoundException(__('Invalid trade'));
		}
        $this->Trade->unBindModel(array('belongsTo' => array('StockSituation', 'Buyer', 'Order', 'Stock')));
        $order = $this->Trade->find('all', array(
            'recursive'=> 0,
            'fields'=>array(
                'Trade.id',
                'Trade.stock_id',
                'ROUND(("Trade"."buy_amount"+"Trade"."sell_amount")/"Stock"."units", 0) AS "Trade__amount"',
                'ROUND((("Trade"."buy_amount"+"Trade"."sell_amount")/"Stock"."units" - ROUND(("Trade"."buy_amount"+"Trade"."sell_amount")/"Stock"."units", 0)) * "Stock"."units", 0) AS "Trade__amount_unit"',
                'Stock.*','Order.id', 'OrderType.trade_mode', 'OrderType.seller_type_id', 'StockUnit.name',
                '("Trade"."buy_price"+"Trade"."sell_price") AS "Trade__price"',
            ),
            'joins'=>array(
                array(
                    'table' => 'orders',
                    'alias' => 'Order',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Order.id = Trade.order_id'
                    )
                ),
                array(
                    'table' => 'order_types',
                    'alias' => 'OrderType',
                    'type' => 'INNER',
                    'conditions' => array(
                        'OrderType.id = Order.order_type_id'
                    )
                ),
                array(
                    'table' => 'stocks',
                    'alias' => 'Stock',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Stock.id = Trade.stock_id'
                    )
                ),
                array(
                    'table' => 'stock_units',
                    'alias' => 'StockUnit',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'StockUnit.id = Stock.stock_unit_id'
                    )
                ),
            ),
            'conditions'=> array(
                'Trade.id'=>$id
            )
        ));
        $order = $order[0];
        $isBuy = AppController::getOrganizationType() != $order['OrderType']['seller_type_id'] ? true : false;

		if ($this->request->is(array('post', 'put'))) {
            switch($order['OrderType']['trade_mode']){
                case 'select' :
                    $this->request->data['Stock']['id'] = $this->request->data['Trade']['stock_id'];
                    $trade_amount = $this->request->data['Trade']['amount'];
                    $stock_units = $this->request->data['Stock']['units'];
                    $trade_amount_unit = @$this->request->data['Trade']['amount_unit'] ? $this->request->data['Trade']['amount_unit'] : 0;
                    if($isBuy){
                        $this->request->data['Trade']['buy_amount'] = ($trade_amount*$stock_units)+$trade_amount_unit;
                        $this->request->data['Trade']['buy_price'] = $this->request->data['Trade']['price'];
                        $this->request->data['Stock']['price'] = $this->request->data['Trade']['price']*$stock_units;
                    } else {
                        $this->request->data['Trade']['sell_amount'] = ($trade_amount*$stock_units)+$trade_amount_unit;
                        $this->request->data['Trade']['sell_price'] = $this->request->data['Trade']['price']*$stock_units;
                    }
                    if ($this->Trade->saveall($this->request->data)) {
                        $this->Session->setFlash(__('The trade has been saved.'));
                        return $this->redirect(array('controller'=>'orders', 'action' => 'edit', $order['Order']['id']));
                    } else {
                        $this->Session->setFlash(__('The trade could not be saved. Please, try again.'));
                    }
                    break;
                case 'create' :
                    if($isBuy){
                        $this->request->data['Trade']['buy_price'] = $this->request->data['Trade']['price'];
                        $this->request->data['Stock']['price'] = $this->request->data['Trade']['price'];
                    } else {
                        $this->request->data['Trade']['sell_price'] = $this->request->data['Trade']['price'];
                    }
                    if ($this->Trade->saveall($this->request->data)) {
                        $this->Session->setFlash(__('The trade has been saved.'));
                        return $this->redirect(array('controller'=>'orders', 'action' => 'edit', $order['Order']['id']));
                    } else {
                        $this->Session->setFlash(__('The trade could not be saved. Please, try again.'));
                    }
                    break;
                case 'num' :
                    if ($this->Trade->save($this->request->data)) {
                        $this->Session->setFlash(__('The trade has been saved.'));
                        return $this->redirect(array('controller'=>'orders', 'action' => 'edit', $order['Order']['id']));
                    } else {
                        $this->Session->setFlash(__('The trade could not be saved. Please, try again.'));
                    }
                    break;
            }
		} else {
			$this->request->data = $order;
		}
        switch($order['OrderType']['trade_mode']){
            case 'select' :
                $stocks = $this->Trade->Stock->getStockList(AppController::getModule());
                break;
            case 'create' :
                $stockTypes = $this->Trade->Stock->StockType->find('list', array(
                    'conditions'=>array('module_id'=>AppController::getModule()),
                    'order'=>array('name'=>'ASC')
                ));
                $stockGroups = $this->Trade->Stock->StockGroup->find('list', array(
                    'order'=>array('sort'=>'ASC', 'name'=>'ASC')
                ));
                break;
            case 'num' :
                $stockSituations = $this->Trade->StockSituation->find('list');
                break;
        }
        $this->set(compact('stocks', 'stockSituations', 'order', 'stockTypes', 'stockGroups', 'isBuy'));
        $this->set('trade', $this->request->data);
	}

	public function delete($id = null) {
		$this->Trade->id = $id;
		if (!$this->Trade->exists()) {
			throw new NotFoundException(__('Invalid trade'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Trade->delete()) {
			$this->Session->setFlash(__('The trade has been deleted.'));
		} else {
			$this->Session->setFlash(__('The trade could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->request->referer());
	}
}