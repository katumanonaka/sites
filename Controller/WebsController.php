<?php

App::uses('AppController', 'Controller');

/**
 * Sites Controller
 *
 * @property Site $Site
 * @property PaginatorComponent $Paginator
 */
//グローバル変数
class WebsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    //Categoryを宣言
    public $uses = array('Category', 'Site');
    //thisを設定する
    //public $layout = 'user';
    /**
     * index method
     *
     * @return void
     */
    public function index($search = null) {
        //$this->Site->recursive = 0;
        //$this->set('sites', $this->Paginator->paginate());
        $this->layout = 'user';
        if($search == null)
        {
            $result = $this->Site->find('all', array());
        }
        else
        {
           $result = $this->Site->find('all', array('conditions' => array('OR'=> array('Site.cat_id1' => $search , 'Site.cat_id2' => $search , 'Site.cat_id3' => $search , 'Site.cat_id4' => $search , 'Site.cat_id5' => $search))));
        }
        //$search = 3;
        //$result = $this->Site->find('all', array());
       // $result = $this->Site->find('all', array('conditions' => array('Site.id between ? and ?' =>array(2,5))));
        //debug($result);
        $this->set('sites', $result);

        //pr($result);
        //debug( $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Site->exists($id)) {
            throw new NotFoundException(__('Invalid site'));
        }
        $options = array('conditions' => array('Site.' . $this->Site->primaryKey => $id));
        $this->set('site', $this->Site->find('first', $options));
    }
}
    ?>