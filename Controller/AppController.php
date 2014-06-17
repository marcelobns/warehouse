<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Auth' => array(
            'loginAction' => array('controller' => 'users', 'action' => 'sign_in'),
            'loginRedirect' => array('controller' => 'orders', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'orders', 'action' => 'index'),
        ),
        'Session',
        'JasperHttpSocket.JasperHttpSocket',
//        'DebugKit.Toolbar'
    );

    public function beforeFilter() {
        if ($this->Session->check('Config.language')) {
            Configure::write('Config.language', $this->Session->read('Config.language'));
        }
        if(isset($this->request->query['@'])){
            foreach($this->Session->read('Auth.User.Roles') as $i=>$value){
                if($this->request->query['@'] == $value['module_id'])
                    $this->setModule($this->request->query['@']);
            }
            $this->redirect('../'.$this->request->url);
        }
    }

    public function beforeRender(){
        if($this->name == 'CakeError'){
            $this->layout = 'error';
        }
        if ($this->Session->check('Message.flash')) {
            $flash = $this->Session->read('Message.flash');
            if ($flash['element'] == 'default') {
                $flash['element'] = 'flash.default';
                $this->Session->write('Message.flash', $flash);
            }
        }
    }

    public function setModule($module_id){
        $this->Session->write('Config.module', $module_id);
        return $module_id;
    }

    public function getModule(){
        if(!$this->Session->check('Config.module') && sizeof($this->Session->Read('Config.Modules')) > 0){
            $roles = array_values($this->Session->read('Auth.User.Roles'));
            $this->setModule($roles[0]['module_id']);
            return $roles[0]['module_id'];
        }
        //TODO escrever ultimo modulo usando em um COOKIE
        return $this->Session->read('Config.module') == null ? 1 : $this->Session->read('Config.module');
    }

    public function getScope(){
        return $this->Session->read('Auth.User.Roles.'.$this->getModule().'.organization_scope_id');
    }

    public function getOrganizationType(){
        return $this->Session->read('Auth.User.Organization.organization_type_id');
    }

    public function getOrganizationId(){
        return $this->Session->read('Auth.User.organization_id');
    }

    public function callJasperReport($folder = 'root', $report){
        $username = 'abbec9b9d6fb14b06a29e76bf5554611';
        $password = 'abbec9b9d6fb14b06a29e76bf5554611';
        if(!$this->JasperHttpSocket->connect($username, $password)) {
            $this->Session->setFlash(__('JasperServer Error!'));
            return false;
        }
        $this->redirect('http://'.$_SERVER['HTTP_HOST'].':8080/jasperserver/rest_v2/reports/'.$folder.'/'.$report);
        return true;
    }
}
