<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $components = array('Paginator');

    public function index() {
        $conditions = array(
            AppController::getScope().' = ANY(Organization.parent_array)',
        );
        $this->paginate = array(
            'recursive'=>0,
            'fields' => array(
                'User.id',
                'User.name',
                'User.username',
                'User.enabled',
                'Organization.name',
            ),
            'conditions' => $conditions,
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

    public function login(){
        if ($this->request->is('post')) {
            $user = $this->User->find('first', array(
                    'recursive'=>1,
                    'conditions'=>array(
                        'User.username' => $this->data['User']['username'],
                        'User.password' => Security::hash($this->data['User']['password'], 'md5', false)
                    )
                )
            );
			// Debugger::dump($user);
			// exit;
            if($user != false){
                unset($user['User']['password']);

				$user['User']['modules_array'] = explode(',', str_replace(array('{','}'), '', $user['User']['modules_array']));
				$user['User']['Module'] = array();

				foreach ($user['Module'] as $key => $value) {
					$user['User']['Module'][$value['id']] = $value;
				}

				$user['User']['Organization'] = $user['Organization'];
				$user['User']['Role'] = $user['Role'];

				$user['User']['OrganizationTypes'] = $this->User->Organization->OrganizationType->find('list', array(
                    'recursive'=>-1,
                    'order'=>array('sort'=>'ASC')
                ));
                if($this->Auth->login($user['User'])) {
					AppController::setModule($user['User']['modules_array'][0]);
                    $this->redirect($this->Auth->redirectUrl());
                }
            } else {
                $this->Session->setFlash(__('Invalid! username or password.'));
            }
        }
        $this->layout = 'login';
    }

    public function logout(){
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }
}
