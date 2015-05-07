<?php
App::uses('AppController', 'Controller');

class ReportsController  extends AppController {

    public $uses = array('StockType', 'Organization');

	public function consumo($report = null) {
        switch($report){
            case 'lista_estoque':
                $stockTypes = array('%'=>'<[TODOS]>');
                array_push($stockTypes, $this->StockType->find('list', array(
                        'recursive'=>-1,
                        'conditions'=>array('gen_code'=>false),
                        'order'=>array('name'=>'ASC')
                    ))
                );
                $this->set(compact('stockTypes'));
            break;
        }
        $this->layout = 'modal';
        $this->set('modal_title',  'Relatório');
        $this->render('consumo/'.$report);
	}

    public function permanente($report = null) {
        switch($report){
            case 'relacao_materiais':
                $organizations = array('%'=>'<[TODOS]>');
                array_push($organizations, $this->Organization->find('list', array(
                        'recursive'=>-1,
                        'conditions'=>array('organization_type_id'=>1),
                        'order'=>array('name'=>'ASC')
                    ))
                );
                $stockTypes = array('%'=>'<[TODOS]>');
                array_push($stockTypes, $this->StockType->find('list', array(
                        'recursive'=>-1,
                        'conditions'=>array('gen_code'=>true),
                        'order'=>array('name'=>'ASC')
                    ))
                );
                $this->set(compact('stockTypes', 'organizations'));
                break;
        }
        $this->layout = 'modal';
        $this->set('modal_title',  'Relatório');
        $this->render('permanente/'.$report);
    }

    public function print_report($report_name = null) {
        AppController::callJasperReport(
            'almoxarifado',
            $report_name.'.pdf?user_id='.$this->Session->read('Auth.User.id').'&'.str_replace(',','&',$_GET['p'])
        );
    }
}
