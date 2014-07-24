<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');
App::uses('CakeSession', 'Model/Datasource');
/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    public $recursive = 0;

    public function beforeSave($options = array()) {
        if (!isset($this->data[$this->alias]['id'])) {
            $this->data[$this->alias]['created'] = date('Y-m-d H:i:s');
            $this->data[$this->alias]['creator_id'] = CakeSession::read('Auth.User.id');
            $this->data[$this->alias]['updater_id'] = CakeSession::read('Auth.User.id');
        } else {
            $this->data[$this->alias]['updated'] = date('Y-m-d H:i:s');
            $this->data[$this->alias]['updater_id'] = CakeSession::read('Auth.User.id');
        }
        return true;
    }

    public function afterSave($created, $options = array()) {
        if($this->alias != 'Log'){
            foreach($this->hasMany as $v){
                if($v['className'] == 'Log'){
                    $this->Log->save(array(
                        'date_time'=>date('Y-m-d H:i:s'),
                        'schema'=>'public',
                        'alias'=>$this->alias,
                        'action'=>$created?'INSERT':'UPDATE',
                        'oid'=>$this->data[$this->alias]['id'],
                        'content'=> json_encode($this->data[$this->alias]),
                        'user_id'=>CakeSession::read('Auth.User.id'),
                        'username'=>CakeSession::read('Auth.User.username'),
                        'client_ip'=>CakeSession::read('ClientIp')
                    ));
                }
            }
        }
    }

    public function beforeDelete($cascade = false) {
        if($this->alias != 'Log'){
            foreach($this->hasMany as $v){
                if($v['className'] == 'Log'){
                    $data = $this->find('first', array('conditions'=>array('id'=>$this->id)));
                    $this->Log->save(array(
                        'date_time'=>date('Y-m-d H:i:s'),
                        'schema'=>'public',
                        'alias'=>$this->alias,
                        'action'=>'DELETE',
                        'oid'=>$this->id,
                        'content'=> json_encode($data[$this->alias]),
                        'user_id'=>CakeSession::read('Auth.User.id'),
                        'username'=>CakeSession::read('Auth.User.username'),
                        'client_ip'=>CakeSession::read('ClientIp')
                    ));
                }
            }
        }
        return true;
    }

    public function beforeFind($query){
        return true;
    }

    public function afterFind($results, $primary = false){
        return $results;
    }

    function checkUnique($data, $fields){
        if(sizeof($data) == sizeof($fields)){
            if (!is_array($fields)){
                $fields = array($fields);
            }
            foreach($fields as $key){
                $unique[$key] = $this->data[$this->name][$key];
            }
            if (isset($this->data[$this->name][$this->primaryKey])){
                $unique[$this->primaryKey] = "<>" . $this->data[$this->name][$this->primaryKey];
            }
            return $this->isUnique($unique, false);
        }
        return true;
    }
}
