<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    //ハッシュ化して保存する
    public function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        //parent::beforeSave($options);
        return true;
    }
}

?>