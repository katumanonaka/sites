<?php

App::uses('AppController', 'Controller');

/**
 * Sites Controller
 *
 * @property Site $Site
 * @property PaginatorComponent $Paginator
 */
//グローバル変数
class SitesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    //Categoryを宣言
    public $uses = array('Category', 'Site');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //$this->Site->recursive = 0;
        //$this->set('sites', $this->Paginator->paginate());
		$this->layout = 'bootstrap3';

        $result = $this->Site->find('all', array());
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

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        //
        $data = $this->Category->find('list', array(
            'fields' => array('Category.id', 'Category.cat_name'),
        ));

        //チェックボックスのそれぞれの名前（カテゴリー名）をセット
        $this->set('category', $data);
        // $data = $this->Category->find('list');
        // pr($data);
        // debug($data);　//デバッグ表示                

        if ($this->request->is('post')) {
            //ここで変数を処理　cat_idに変換                    
            //$test = $this->Category->find('list',site_name);
            //$test = $this->Category->find('list');
            //$pending = $this->Article->find('list', array(conditions' => array('Article.status' => 'pending')));                                         
            // echo $test;                   
            //debug($data);    //デバッグ表示    
            //入力したデータを$test01～$test05に入れる
            $test01 = $this->request->data('Site.cat_id.0');
            $test02 = $this->request->data('Site.cat_id.1');
            $test03 = $this->request->data('Site.cat_id.2');
            $test04 = $this->request->data('Site.cat_id.3');
            $test05 = $this->request->data('Site.cat_id.4');
            //$test = $this->request->query('Category.review');  
            //Hash::get($test, 'Site.cat_id.0');
            //$test01 = $this->request->data['Site']['cat_id'][0];                    
            //$test02 = $this->request->data['Site']['cat_id'][1];
            //$test03 = $this->request->data['Site']['cat_id'][2];
            /* デバッグ確認
              print_r($test01);
              print_r($test02);
              print_r($test03);
              print_r($test04);
              print_r($test05);
             */
            //データの代入
            $request = $this->request->data;
            //それぞれにチェックボックスのデータを代入する
            $request['Site']['cat_id1'] = $test01;
            $request['Site']['cat_id2'] = $test02;
            $request['Site']['cat_id3'] = $test03;
            $request['Site']['cat_id4'] = $test04;
            $request['Site']['cat_id5'] = $test05;

            //debug($request);     //データの確認表示する
            // exit;   //強制終了
            //カテゴリーデータ保存
            $this->set('categorydata', $request);

            $this->Site->create();

            //保存
            if ($this->Site->save($request)) {                      //保存する              
                $this->Flash->success(__('The site has been saved.'));      //保存できた
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The site could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $data = $this->Category->find('list', array(
            'fields' => array('Category.id', 'Category.cat_name'),
        ));

        //チェックボックスのそれぞれの名前（カテゴリー名）をセット
        $this->set('category', $data);

        //idがあるかどうか
        if (!$this->Site->exists($id)) {
            throw new NotFoundException(__('Invalid site'));
        }
        //タグ一覧を表示する　

        $data = $this->Site->find('first', array('conditions' => array('id' => $id)));
        //pr($data);

        $this->set('editcategory', $data);
        if ($this->request->is(array('post', 'put'))) {
            //サイト名、サイト写真、URL、レビューの変更
            $site_name = $this->request->data('Site.site_name');
            $img_src = $this->request->data('Site.img_src');
            $url = $this->request->data('Site.url');
            $review = $this->request->data('Site.review');

            //入力したカテゴリーデータを$test01～$test05に入れる
            $test01 = $this->request->data('Site.cat_id.0');
            $test02 = $this->request->data('Site.cat_id.1');
            $test03 = $this->request->data('Site.cat_id.2');
            $test04 = $this->request->data('Site.cat_id.3');
            $test05 = $this->request->data('Site.cat_id.4');
            //データの代入
            $request = $this->request->data;
            //サイト名、サイト写真、URL、レビューのデータを代入する
            $request['Site']['site_name'] = $site_name;
            $request['Site']['img_src'] = $img_src;
            $request['Site']['url'] = $url;
            $request['Site']['review'] = $review;

            //それぞれにチェックボックスのデータを代入する
            $request['Site']['cat_id1'] = $test01;
            $request['Site']['cat_id2'] = $test02;
            $request['Site']['cat_id3'] = $test03;
            $request['Site']['cat_id4'] = $test04;
            $request['Site']['cat_id5'] = $test05;

            // if ($this->request->is(array('post', 'put'))) {                 //データを受け取る
            //if ($this->Site->save($this->request->data)) {          //データをセーブ
            if ($this->Site->save($request)) {          //データをセーブ
                $this->Flash->success(__('The site has been saved.'));      //保存完了
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The site could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Site.' . $this->Site->primaryKey => $id));
            $this->request->data = $this->Site->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Site->id = $id;
        if (!$this->Site->exists()) {
            throw new NotFoundException(__('Invalid site'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Site->delete()) {
            $this->Flash->success(__('The site has been deleted.'));
        } else {
            $this->Flash->error(__('The site could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}

?>
