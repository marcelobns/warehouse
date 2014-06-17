<?php
App::uses('AppController', 'Controller');
class StocksController extends AppController {

	public $components = array('Paginator');

	public function index() {
        $conditions = array(
            'StockType.module_id'=>AppController::getModule(),
            'Stock.updated > \'2014-01-01\'',
        );
        if(@$_GET['q']){
            $_GET['q'] = is_numeric($_GET['q']) ? $_GET['q'] : '%'.$_GET['q'].'%';
            $conditions = array(
                'StockType.module_id'=>AppController::getModule(),
                'OR'=>array(
                    'Stock.num::text ilike \''.$_GET['q'].'\'',
                    'Stock.id::text ilike \''.$_GET['q'].'\'',
                    'Stock.description ilike \''.$_GET['q'].'\'',
                )
            );
        }
        $this->paginate = array(
            'recursive'=>-1,
            'fields'=>array(
                'Stock.id', 'Stock.num', 'Stock.description', 'Stock.units', 'Stock.price', 'Stock.stock_group_id',
                'StockType.name',
                'StockType.gen_code',
                'StockGroup.name',
                'StockUnit.acronym',
                'CASE WHEN sum(Trade.buy_amount) is null THEN 0 ELSE (sum(Trade.buy_amount) - sum(Trade.sell_amount)) END as "Stock__balance"'
            ),
            'joins'=>array(
                array(
                    'table' => 'stock_types',
                    'alias' => 'StockType',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'StockType.id = Stock.stock_type_id'
                    )
                ),
                array(
                    'table' => 'stock_groups',
                    'alias' => 'StockGroup',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'StockGroup.id = Stock.stock_group_id'
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
                array(
                    'table' => 'trades',
                    'alias' => 'Trade',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Stock.id = Trade.stock_id',
                        'Trade.canceled = false'
                    )
                ),
            ),
            'conditions'=>$conditions,
            'group'=>array('Stock.id', 'StockType.name', 'StockType.gen_code', 'StockGroup.name', 'StockUnit.acronym', 'StockGroup.sort', 'Stock.num', 'Stock.description'),
            'order'=>array('Stock.updated'=>'DESC', 'Stock.num'=>'DESC', 'Stock.description'=>'ASC')
        );
        $stocks = $this->Paginator->paginate();
        foreach($this->Session->Read('Config.Modules') as $i=>$value){
            if($value['Module']['id'] == AppController::getModule()){
                $stock_add = $value['Module']['stock_add'];
            }
        }
		$this->set(compact('stocks', 'stock_add'));
	}

	public function view($id = null) {
		if (!$this->Stock->exists($id)) {
			throw new NotFoundException(__('Invalid stock'));
		}
        $this->Stock->unBindModel(array(
            'hasMany'=>array('Trade', 'StockRate')
        ));
        $stock = $this->Stock->find('first', array('conditions' => array('Stock.' . $this->Stock->primaryKey => $id)));
        $this->Stock->Trade->unBindModel(array(
            'belongsTo'=>array('Stock'),
            'hasMany'=>array('Trade', 'StockRate')
        ));
        $stock['Trade'] = $this->Stock->Trade->find('all', array(
            'fields'=>array('Trade.*', 'Order.date_time', 'Order.num', 'Order.reference_year', 'Buyer.name', 'StockSituation.name'),
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
}