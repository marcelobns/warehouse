<?php
App::uses('AppController', 'Controller');
class StocksController extends AppController {

	public $components = array('Paginator');

	public function index(){
        $conditions = array(
            'StockType.module_id'=>AppController::getModule(),
            'Stock.updated > \''.date('Y-m-d', strtotime('- 6 months')).'\'',
            AppController::getScope(). ' = any(Organization.parent_array)'

        );
        if(@$_GET['q']){
            $q = is_numeric($_GET['q']) ? $_GET['q'] : '%'.$_GET['q'].'%';
            $conditions = array(
                'StockType.module_id'=>AppController::getModule(),
                'OR'=>array(
                    'Stock.num::text ilike \''.$q.'\'',
                    'Stock.id::text ilike \''.$q.'\'',
                    'Stock.description ilike \''.$q.'\'',
                )
            );
        }
        $this->Stock->unBindModel(array(
            'belongsTo'=>array('BuyOrder')
        ));
        $this->paginate = array(
            'recursive'=>0,
            'fields'=>array(
                'Stock.id', 'Stock.num', 'Stock.description', 'Stock.units', 'Stock.price', 'Stock.stock_group_id',
                'MAX("Order"."reference_year") as "Stock__last_inventory"',
                '(array_agg("Organization"."name" ORDER BY "Trade"."id" DESC))[1] as "Organization__name"',
                'StockType.name',
                'StockType.gen_code',
                'StockGroup.name',
                'StockUnit.acronym',
                'CASE WHEN sum(Trade.buy_amount) is null THEN 0 ELSE (sum(Trade.buy_amount) - sum(Trade.sell_amount)) END as "Stock__balance"'
            ),
            'joins'=>array(
                array(
                    'table' => 'trades',
                    'alias' => 'Trade',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Stock.id = Trade.stock_id',
                        'Trade.canceled = false'
                    )
                ),
                array(
                    'table' => 'organizations',
                    'alias' => 'Organization',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Organization.id = Trade.buyer_id',
                    )
                ),
                array(
                    'table' => 'orders',
                    'alias' => 'Order',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Order.id = Trade.order_id',
                        'Order.order_type_id = 9'
                    )
                ),
            ),
            'conditions'=>$conditions,
            'group'=>array('Stock.id', 'StockType.name', 'StockType.gen_code', 'StockGroup.name', 'StockUnit.acronym', 'StockGroup.sort', 'Stock.num', 'Stock.description'),
            'order'=>array('Stock.updated'=>'DESC', 'Stock.num'=>'DESC', 'Stock.description'=>'ASC')
        );
        $stocks = $this->Paginator->paginate();
        $last_inventory = $this->Stock->Trade->Order->find('all', array(
            'recursive'=>-1,
            'fields'=>array(
                'MAX(Order.id) as "Order__id"',
                'MAX(reference_year) as "Order__year"'
            ),
            'conditions'=>array('order_type_id'=>9)
        ));
		$this->set(compact('stocks', 'stock_add', 'last_inventory'));
        $this->filters();
	}

    public function filters(){
        $stockGroups = $this->Stock->StockGroup->find('list', array());
        $this->set(compact('stockGroups'));
    }

	public function view($id = null) {
		if (!$this->Stock->exists($id)) {
			throw new NotFoundException(__('Invalid stock'));
		}
        $this->Stock->unBindModel(array(
            'belongsTo'=>array('BuyOrder'),
            'hasMany'=>array('Trade', 'StockRate')
        ));
        $stock = $this->Stock->find('first', array('conditions' => array('Stock.' . $this->Stock->primaryKey => $id)));
        $stock['Trade'] = $this->Stock->Trade->find('all', array(
            'fields'=>array('Trade.*', 'OrderType.name', 'OrderType.sort', 'Order.date_time', 'Order.num', 'Order.reference_year', 'Buyer.name', 'StockSituation.name'),
            'conditions' => array('Trade.stock_id'=>$id),
            'order'=>array('Order.date_time'=>'DESC', 'Trade.id'=>'DESC')
        ));
        $this->set('stock', $stock);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Stock->create();
			if ($this->Stock->save($this->request->data)) {
				$this->Session->setFlash(__('The stock has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock could not be saved. Please, try again.'));
			}
		}
        $stockTypes = $this->Stock->StockType->find('list', array(
            'conditions'=>array('module_id'=>AppController::getModule()),
            'order'=>array('name'=>'ASC')
        ));
		$stockUnits = $this->Stock->StockUnit->find('list', array(
            'order'=>array('acronym'=>'ASC')
        ));
		$stockSituations = $this->Stock->StockSituation->find('list');
		$this->set(compact('stockTypes', 'stockGroups', 'stockUnits', 'stockSituations', 'buyOrders'));
	}

	public function edit($id = null) {
		if (!$this->Stock->exists($id)) {
			throw new NotFoundException(__('Invalid stock'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Stock->save($this->request->data)) {
				$this->Session->setFlash(__('The stock has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Stock.' . $this->Stock->primaryKey => $id));
			$this->request->data = $this->Stock->find('first', $options);
		}
		$stockTypes = $this->Stock->StockType->find('list', array(
            'conditions'=>array('module_id'=>AppController::getModule()),
            'order'=>array('name'=>'ASC')
        ));
		$stockUnits = $this->Stock->StockUnit->find('list');
		$stockSituations = $this->Stock->StockSituation->find('list');
		$this->set(compact('stockTypes', 'stockUnits', 'stockSituations', 'buyOrders'));
	}

	public function delete($id = null) {
		$this->Stock->id = $id;
		if (!$this->Stock->exists()) {
			throw new NotFoundException(__('Invalid stock'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Stock->delete()) {
			$this->Session->setFlash(__('The stock has been deleted.'));
		} else {
			$this->Session->setFlash(__('The stock could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function getMaxCode($stock_group_id = null){
        $result = $this->Stock->find('all', array(
            'fields'=>array('MAX(num)'),
            'recursive'=>-1,
            'conditions'=>array(
                'stock_group_id'=>$stock_group_id
            )
        ));
        return new CakeResponse(array('body' => json_encode($result[0][0])));
    }

    public function getStock($id = null){
        $id = isset($id) ? $id : 0;
        $result = $this->Stock->find('all', array(
            'recursive'=>0,
            'conditions'=>array(
                'Stock.id'=>$id,
            )
        ));
        if(sizeof($result) > 0){
            return new CakeResponse(array('body' => json_encode($result[0])));
        }
        return new CakeResponse(array('body' => '{}'));
    }

    public function reports(){

    }
}