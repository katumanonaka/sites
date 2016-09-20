<?php

App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Sites Controller
 *
 * @property Site $Site
 * @property PaginatorComponent $Paginator
 */
//グローバル変数
class UsersController extends AppController {
    public $scaffold = "";

    public function index(){
        //パスワード
     var_dump(AuthComponent::password('aaa'));
     
    }
    
    
}
?>