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

            //========================================================================================
            //画像データ保存
            //========================================================================================
            //サイト名取得
            $sitenameid = $this->request->data('Site.site_name');
            //一時保存画像の名前を保存
            $img = $this->request->data('Site.img_src.tmp_name');
            //画像の名前を保存
            $imgname = $this->request->data('Site.img_src.name');
            //ファイルパスを保存
            $uploaddir = "C:" . DS . "xampp" . DS . "htdocs" . DS . "sites" . DS . "webroot" . DS . "upimg" . DS;

            //idを取得する
            $iddata = $this->request->data('Site.id');
            //画像のファイルパス
            $img_src = IMAGES . $img;
            //ファイルパス保存
            $root = "http://localhost/sites/upimg/";
            //データにファイル名を表示する
            $request['Site']['img_src'] = "";
            //データにサイト名を保存する
            //$request['Site']['site_name'] = $sitenameid;
            //カテゴリーデータ保存
            $this->set('categorydata', $request);

            $this->Site->create();

            //保存
            if ($this->Site->save($request)) {                      //保存する    
                //idの取得
                $id = $this->Site->getLastInsertID();
                //結果的に使う画像を保存
                $uploadfile = $uploaddir . "$id.jpg"; //basename($imgname);
                //ファイル移動
                move_uploaded_file($img, $uploadfile);   //.$fileName['img']    //$fileName[
                //画像の名前を更新
                $this->Site->id = $id;
                $this->Site->saveField('img_src', "$id.jpg");
                
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

            //--------------------------------------------------------------------------
            //画像を加工して保存する
            //--------------------------------------------------------------------------
            $idedit = $this->request->data('Site.id');
            $file1 = "upimg/{$idedit}.jpg";                              //　元画像ファイル
            $file2 = "img/{$idedit}.jpg";                                      //　画像保存先
            $in = ImageCreateFromJPEG($file1);                          //　元画像ファイル読み込み
            $size = GetImageSize($file1);                               //　元画像サイズ取得
            //$width = $size[0] / 2;                                      //　生成する画像サイズ（横）
            //$height = $size[1] / 2;                                     //　生成する画像サイズ（縦）
            $width = 250; //$size[0] / 2;                                      //　生成する画像サイズ（横）
            $height = 250; //$size[1] / 2;                                     //　生成する画像サイズ（縦）
            $out = ImageCreateTrueColor($width, $height);               //　画像生成
            ImageCopyResampled($out, $in, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);    //　サイズ変更・コピー
            ImageJPEG($out, $file2);                                    //　画像保存
            ImageDestroy($in);
            ImageDestroy($out);

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

            //========================================================================================
            //画像データ保存
            //========================================================================================
            //$id = find('first', id);
            //サイト名取得
            $sitenameid = $this->request->data('Site.site_name');
            //一時保存する画像の名前を保存
            $img = $this->request->data('Site.img_src.tmp_name');
            //画像の名前を保存
            $imgname = $this->request->data('Site.img_src.name');
            //ファイルパスを保存
            $uploaddir = "C:" . DS . "xampp" . DS . "htdocs" . DS . "sites" . DS . "webroot" . DS . "upimg" . DS;
            //idを取得する
            $iddata = $this->request->data('Site.id');
            //画像のファイルパス
            $img_src = IMAGES . $img;
            //ファイルパス保存
            $root = "http://localhost/sites/upimg/";
            //データにファイル名を表示する
            $request['Site']['img_src'] = "$iddata.jpg";
            //結果的に使う画像を保存
            $uploadfile = $uploaddir . "$iddata.jpg"; //basename($imgname);
            //画像をファイル移動してID.jpgとして保存している
            move_uploaded_file($img, $uploadfile);   //.$fileName['img']    //$fileName[

            $this->set('editcategory', $data);
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
