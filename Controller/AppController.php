<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
    public $components = array(
        'Auth' => array(
            'loginAction' => array('controller' => 'users', 'action' => 'login'),
            'loginRedirect' => array('controller' => 'orders', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'orders', 'action' => 'index'),
            'authorize' => array('Controller'),
        ),
        'Session',
        'JasperHttpSocket.JasperHttpSocket',
        'AccessKit.Control'
    );

    public $helpers = array(
      'AccessKit.AuthView'
    );

    public function httpHistory($record = false){
        $_SERVER['REQUEST_SCHEME'] = @$_SERVER['REQUEST_SCHEME'] ? $_SERVER['REQUEST_SCHEME'] : 'http';
        $request_uri = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        if($record){
            if(!isset($_SESSION['HTTP_HISTORY']))
                $_SESSION['HTTP_HISTORY'] = array();

            if($_SERVER['REQUEST_METHOD'] == 'GET' && @$_SESSION['HTTP_HISTORY'][0] != $request_uri){
                array_unshift($_SESSION['HTTP_HISTORY'], $request_uri);
                $_SESSION['HTTP_REFERER'] = $_SESSION['HTTP_HISTORY'][1];
            }

            if(sizeof($_SESSION['HTTP_HISTORY']) == 11)
                unset($_SESSION['HTTP_HISTORY'][10]);
        }
        return $_SESSION['HTTP_HISTORY'];
    }

    public function beforeFilter() {
        $this->httpHistory(true);
        $this->Session->write('ClientIp', $this->request->clientIp());

        if ($this->Session->check('Config.language')) {
            Configure::write('Config.language', $this->Session->read('Config.language'));
        }
        if(isset($this->request->query['@']) && in_array($this->request->query['@'], $this->Session->read('Auth.User.modules_array'))){
            $this->setModule(@$this->request->query['@']);
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
        return $this->Session->read('Config.module') == null ? 1 : $this->Session->read('Config.module');
    }

    public function getScope(){
        return $this->Session->read('Auth.User.organization_scope_id');
    }

    public function getRoleSort(){
        return $this->Session->read('Auth.User.Role.sort');
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

    public function isAuthorized($user) {
        return $this->Control->authorize(
          $user['Rule'],
          $this->name,
          $this->action);
    }
}
