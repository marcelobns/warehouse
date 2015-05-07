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
        $isInventory = $order['OrderType']['inventory'];
		if ($this->request->is('post')) {
            switch($order['OrderType']['trade_mode']){
                case 'select' :
                    $this->request->data['Stock']['id'] = $this->request->data['Trade']['stock_id'];
                    $trade_amount = $this->request->data['Trade']['amount'];
                    $stock_units = $this->request->data['Stock']['units'];
                    $trade_amount_unit = @$this->request->data['Trade']['amount_unit'] ? $this->request->data['Trade']['amount_unit'] : 0;
                    $this->request->data['Trade']['buyer_id'] = $order['Order']['buyer_id'];
                    if($isBuy){
                        $this->request->data['Trade']['buy_amount'] = ($trade_amount*$stock_units)+$trade_amount_unit;
                        $this->request->data['Trade']['buy_price'] = $this->request->data['Trade']['price'];
                        $this->request->data['Stock']['price'] = $this->request->data['Trade']['price'];
                    } else {
                        $this->request->data['Trade']['sell_amount'] = ($trade_amount*$stock_units)+$trade_amount_unit;
                        $this->request->data['Trade']['sell_price'] = $this->request->data['Trade']['price'];
                    }
                    if ($this->Trade->saveall($this->request->data)) {
                        $this->Session->setFlash(__('The trade has been saved.'));
                        return $this->redirect(array('controller'=>'orders', 'action' => 'edit', $order_id));
                    } else {
                        $this->Session->setFlash(__('The trade could not be saved. Please, try again.'));
                    }
                    break;
                case 'create' :
                    $this->Session->write('Inventory.buyer_id', @$this->request->data['Trade']['buyer_id']);

                    if($this->request->data['Stock'])

                    $num_ini = $this->request->data['Stock']['num'];
                    $num = $this->request->data['Stock']['num'];
                    $num_end = ($num_ini + ($this->request->data['Stock']['amount']-1));
                    $tradesToSave = array();
                    while ($num <= $num_end){
                        $this->request->data['Stock']['num'] = $num;
                        $this->request->data['Stock']['depreciation_date'] = date('Y-m-d');
                        $this->request->data['Stock']['reference_year'] = $order['Order']['reference_year'];
                        $this->request->data['Stock']['last_inventory'] = $order['Order']['reference_year'];
                        $this->request->data['Stock']['stock_unit_id'] = 34;//FIXME generalizar
                        if($isInventory){
                            $this->request->data['Stock']['organization_id'] = $this->request->data['Trade']['buyer_id'];
                        }
                        if($isBuy){
                            $this->request->data['Trade']['buy_amount'] = 1;
                            $this->request->data['Trade']['buy_price'] = isset($this->request->data['Stock']['price']) ? $this->request->data['Stock']['price'] : 0;
                        } else {
                            $this->request->data['Trade']['sell_amount'] = 1;
                            $this->request->data['Trade']['sell_price'] = isset($this->request->data['Stock']['price']) ? $this->request->data['Stock']['price'] : 0;
                        }
                        array_push($tradesToSave, $this->request->data);
                        $num++;
                    }
                    if ($this->Trade->saveMany($tradesToSave, array('atomic'=>true, 'deep'=>true))) {
                        $this->Session->setFlash(__('The trade has been saved.').' '.$num_ini.' - '.$num_end);
                        if($isInventory){
                            return $this->redirect($this->Session->read('request_ref'));
                        }
                        return $this->redirect(array('controller'=>'orders', 'action' => 'edit', $order_id));
                    } else {
                        $this->Session->setFlash(__('The trade could not be saved. Please, try again.').' '.$num_ini.' - '.$num_end);
                    }
                    break;
                case 'num' :
                    $isInterval = strrpos($this->request->data['Trade']['num'], ":");                    
                    $conditions = array('1=0');

                    if($isInterval !== false){                                                                        
                        $num = $this->request->data['Trade']['num'];
                        $nums = split(':', $num);
                        $num_ini = $nums[0];                        
                        $num_end = $nums[1]; 
                        $conditions = array(
                            'Stock.stock_group_id'=>$this->request->data['Trade']['stock_group_id'],
                            'Stock.num between '.$num_ini.' and '.$num_end,
                            'Stock.id not in (select stock_id from trades where order_id = '. $order_id .')'
                        );
                    } else {
                        $all = $this->request->data['Trade']['num'];                                            
                        $conditions = array(
                            'Stock.stock_group_id'=>$this->request->data['Trade']['stock_group_id'],
                            'Stock.num in ('.$all.')',
                            'Stock.id not in (select stock_id from trades where order_id = '. $order_id .')'
                        );
                    }

                    $Stocks = $this->Trade->Stock->find('all', array(
                        'recursive'=>-1,
                        'conditions'=>$conditions
                    ));

                    foreach($Stocks as $key=>$value){
                        $data = array();
                        if($value['Stock']['stock_situation_id'] != $this->request->data['Trade']['stock_situation_id']){
                            $data['Stock']['id'] = $value['Stock']['id'];
                            $data['Stock']['stock_situation_id'] = $this->request->data['Trade']['stock_situation_id'];
                        }
                        $data['Trade']['order_id'] = $this->request->data['Trade']['order_id'];
                        $data['Trade']['stock_id'] = $value['Stock']['id'];
                        $data['Trade']['buyer_id'] = $order['Order']['buyer_id'];
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
                    if(isset($num_end)) {                        
                        $this->Session->setFlash(__('The trade has been saved.').' '.$num_ini.' - '.$num_end);                        
                        return $this->redirect(array('controller'=>'orders', 'action' => 'edit', $order_id));
                    } else if(isset($all) && isset($num)){
                        $this->Session->setFlash(__('The trade has been saved.').' '.$all);                        
                        return $this->redirect(array('controller'=>'orders', 'action' => 'edit', $order_id));
                    } else if (sizeof($Stocks) == 0) {
                        $this->Session->setFlash(__('The trade has been saved.'));
                        return $this->redirect(array('controller'=>'orders', 'action' => 'edit', $order_id));
                    } else {
                        $this->Session->setFlash(__('The trade could not be saved. Please, try again.').' '.$num);
                    }
                    break;
            }
		}
        $this->Session->write('request_ref', $this->request->referer());
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
                $buyers = $this->Trade->Buyer->getChildOrganization(1, AppController::getScope());
                break;
            case 'num' :
                $stockGroups = $this->Trade->Stock->StockGroup->find('list', array(
                    'order'=>array('sort'=>'ASC', 'name'=>'ASC')
                ));
                $stockSituations = $this->Trade->StockSituation->find('list');
                break;
        }
		$this->set(compact('stocks', 'stockSituations', 'order', 'stockTypes', 'stockGroups', 'isBuy', 'isInventory', 'buyers'));
	}

	public function edit($id = null) {
		if (!$this->Trade->exists($id)) {
			throw new NotFoundException(__('Invalid trade'));
		}
        $this->Trade->unBindModel(array('belongsTo' => array('StockSituation', 'Buyer')));
        $order = $this->Trade->find('all', array(
            'recursive'=> 0,
            'fields'=>array(
                'Trade.id',
                'Trade.stock_id',
                'trunc(("Trade"."buy_amount"+"Trade"."sell_amount")/"Stock"."units") AS "Trade__amount"',
                'trunc((("Trade"."buy_amount"+"Trade"."sell_amount")/"Stock"."units" - trunc(("Trade"."buy_amount"+"Trade"."sell_amount")/"Stock"."units", 0)) * "Stock"."units") AS "Trade__amount_unit"',
                'Stock.*','Order.id', 'OrderType.trade_mode', 'OrderType.seller_type_id', 'StockUnit.name',
                '("Trade"."buy_price"+"Trade"."sell_price") AS "Trade__price"',
            ),
            'conditions'=> array('Trade.id'=>$id)
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
                        $this->request->data['Stock']['price'] = $this->request->data['Trade']['price'];
                    } else {
                        $this->request->data['Trade']['sell_amount'] = ($trade_amount*$stock_units)+$trade_amount_unit;
                        $this->request->data['Trade']['sell_price'] = $this->request->data['Trade']['price'];
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

    public function sale(){
        $orders = $this->Trade->Order->find('list', array(
                'recursive'=>-1,
                'limit'=>100
        ));
        $paymentTypes = $this->Trade->Order->PaymentType->find('list');
        $stocks = $this->Trade->Stock->getStockList(2);
        $trades = array();
        $this->set(compact('paymentTypes', 'stocks', 'trades'));
        $this->layout = 'clean';
    }

    public function inventory($stock_id = null, $order_id = null){
        if (!$this->Trade->Stock->exists($stock_id)) {
            throw new NotFoundException(__('Invalid stock'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->Session->write('Inventory.buyer_id', $this->request->data['Trade']['buyer_id']);
            if ($this->Trade->save($this->request->data)) {
                $this->Session->setFlash(__('The trade has been saved.'));
                return $this->redirect($this->Session->read('request_ref'));
            } else {
                $this->Session->setFlash(__('The stock group could not be saved. Please, try again.'));
            }
        } else {
            $this->Session->write('request_ref', $this->request->referer());
            $this->Trade->Stock->unBindModel(array('belongsTo' => array('BuyOrder')));
            $this->request->data = $this->Trade->Stock->find('first', array(
                'recursive'=> 0,
                'fields'=>array('Stock.*', 'Trade.*', 'StockGroup.*', 'StockType.*', 'StockUnit.*', 'StockSituation.*'),
                'conditions' => array('Stock.id'=> $stock_id),
                'joins'=>array(
                    array(
                        'table' => 'trades',
                        'alias' => 'Trade',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'Trade.stock_id'=>$stock_id,
                            'Trade.order_id'=>$order_id
                        )
                    ),
                )
            ));
        }
        $buyers = $this->Trade->Buyer->getChildOrganization(1, AppController::getScope());
        $stockSituations = $this->Trade->StockSituation->find('list', array('conditions'=>array('StockSituation.inventory')));
        $this->set(compact('stock_id', 'order_id', 'buyers', 'stockSituations'));
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