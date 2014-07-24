<?php
App::uses('Helper', 'View');

class RenderControlHelper extends AppHelper {
    public $helpers = array('Session', 'Html', 'JavaScript');

    public function level($level) {
        if ($this->Session->read('Auth.User.Role.level') <= $level) {
            return true;
        } else {
            return false;
        }
    }
    public function role($role) {
        if ($this->Session->read('Auth.User.Role.name') == $role) {
            return true;
        } else {
            return false;
        }
    }

    public function construtor($html){
        $dom = new DOMDocument();
        $dom->loadHTML($html);

        $xpath = new DOMXPath($dom);

        $tags = $xpath->query('//div[@class="main"]/div[@class="text"]');
        foreach ($tags as $tag) {
            var_dump(trim($tag->nodeValue));
        }
    }
}