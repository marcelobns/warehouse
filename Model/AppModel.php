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

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    public function beforeSave($options = array()) {

        App::uses('CakeSession', 'Model/Datasource');
        $user = CakeSession::read('Auth.User');
        if (!isset($this->data[$this->alias]['id'])) {
            $this->data[$this->alias]['created'] = date('Y-m-d H:i:s');
            $this->data[$this->alias]['creator_id'] = $user['id'];
            $this->data[$this->alias]['updater_id'] = $user['id'];
        } else {
            $this->data[$this->alias]['updated'] = date('Y-m-d H:i:s');
            $this->data[$this->alias]['updater_id'] = $user['id'];
        }
        return true;
    }

    public function beforeFind($query){

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
