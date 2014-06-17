<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

	public $components = array('Paginator');

    public function index() {
        $this->User->recursive = 0;
        $this->paginate = array(
            'fields' => array(
                'User.id',
                'User.name',
                'User.username',
                'User.enabled',
                'Organization.*',
            ),
            'conditions' => array(
                AppController::getScope().' = ANY(Organization.parent_array)'
            ),
            'order' => array('name'=>'ASC')
        );
        $this->set('users', $this->Paginator->paginate());
    }

    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->User->unBindModel(array(
            'belongsTo'=>array('Creator','Updater'),
            'hasMany'=>array('UserRole')
        ));
        $user = $this->User->find('first', array('conditions' => array('User.' . $this->User->primaryKey => $id)));
        $user['UserRole'] = $this->User->UserRole->find('all', array(
            'conditions' => array('UserRole.user_id' => $id)
        ));
        $this->set('user', $user);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['User']['password'] = Security::hash($this->data['User']['password'], 'md5', false);
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $organizations = $this->User->Organization->getChildOrganization(1, AppController::getScope());
        $this->set(compact('organizations'));
    }

    public function edit($id = null) {
        $isUser = $this->Session->read('Auth.User.id') == $id ? true : false;

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if($isUser) {
                $options = array(
                    'conditions' => array(
                        'User.' . $this->User->primaryKey => $id,
                        'User.password' => Security::hash($this->data['User']['confirm_password'], 'md5', false)
                    )
                );
                $checkUser = $this->User->find('first', $options);
                if($checkUser){
                    if(isset($this->request->data['User']['password'])){
                        $this->request->data['User']['password'] = Security::hash($this->data['User']['password'], 'md5', false);
                    };
                    if ($this->User->save($this->request->data)) {
                        $this->Session->setFlash(__('The user has been saved.'));
                        return $this->redirect(array('action' => 'logout'));
                    } else {
                        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                    }
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            } else {
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
            $this->request->data['UserRole'] = $this->User->UserRole->find('all', array(
                'conditions' => array('UserRole.user_id' => $id)
            ));
        }
        $organizations = $this->User->Organization->getChildOrganization(1, AppController::getScope());
        $this->set(compact('organizations', 'isUser'));
    }

	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function sign_in(){
        if ($this->request->is('post')) {
            $this->User->unBindModel(array(
                'belongsTo' => array('Creator','Updater')
            ));
            $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.username' => $this->data['User']['username'],
                        'User.password' => Security::hash($this->data['User']['password'], 'md5', false)
                    )
                )
            );
            if($user != false){
                unset($user['User']['password']);
                $signin = array(
                    'id' => $user['User']['id'],
                    'last_signin' => date('Y-m-d H:i:s')
                );
                if($this->User->save($signin)){
                    if(sizeof($user['UserRole']) == 0){
                        $this->Session->destroy();
                        $this->Session->setFlash(__('Invalid! Role(s) not found'));
                        $this->redirect($this->Auth->logout());
                    }
                    foreach($user['UserRole'] as $value){
                        $roles[$value['module_id']] = $value;
                    }
                    $user['User']['Roles'] = $roles;
                    $user['User']['Organization'] = $user['Organization'];
                    $organization_types = $this->User->Organization->OrganizationType->find('list', array(
                        'recursive'=>-1,
                        'order'=>array('sort'=>'ASC')
                    ));
                    $this->Session->write('Config.OrganizationTypes', $organization_types);
                    if($this->Auth->login($user['User'])){
                        $modules = array();
                        foreach($roles as $i=>$value){
                            if($i==1){
                                AppController::setModule($value['module_id']);
                            }
                            array_push($modules, $value['module_id']);
                        }
                        $modules = $this->User->UserRole->Module->find('all', array(
                            'conditions'=>array('id'=>$modules),
                            'order'=>array('Module.sort'=> 'ASC')
                        ));
                        $this->Session->write('Config.Modules', $modules);
                        $this->redirect($this->Auth->redirectUrl());
                    }
                }
            }else{
                $this->Session->setFlash(__('Invalid! username or password.'));
            }
        }
        $this->layout = 'sign_in';
    }

    public function logout(){
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }
}
