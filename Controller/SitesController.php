<?php
App::uses('AppController', 'Controller');
/**
 * Sites Controller
 *
 * @property Site $Site
 * @property PaginatorComponent $Paginator
 */

class SitesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        //Categoryを宣言
        public $uses = array('Category','Site');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Site->recursive = 0;
		$this->set('sites', $this->Paginator->paginate());
                
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
                    
                    //$this->request->data[Site][cat_id][0];
                    
                    //$var = array(10 => '遠藤', '斉藤', '伊藤');
                    //print_r($var);
                    
                    $test01 = $this->request->data( 'Site.cat_id.0');
                    $test02 = $this->request->data( 'Site.cat_id.1');
                    $test03 = $this->request->data( 'Site.cat_id.2');
                    $test04 = $this->request->data( 'Site.cat_id.3');
                    $test05 = $this->request->data( 'Site.cat_id.4');
                    //$test = $this->request->query('Category.review');  
                    //Hash::get($test, 'Site.cat_id.0');
                    //$test01 = $this->request->data['Site']['cat_id'][0];                    
                    //$test02 = $this->request->data['Site']['cat_id'][1];
                    //$test03 = $this->request->data['Site']['cat_id'][2];
                    /*
                    print_r($test01);
                    print_r($test02);                    
                    print_r($test03);
                    print_r($test04);                    
                    print_r($test05);
                    */                  
                    $request = $this->request->data;
                    
                    $request['Site']['cat_id1'] = $test01; 
                    $request['Site']['cat_id2'] = $test02;
                    $request['Site']['cat_id3'] = $test03;
                    $request['Site']['cat_id4'] = $test04;
                    $request['Site']['cat_id5'] = $test05;
                    
                    debug($request);     //データの確認表示する
                       // exit;   //強制終了
                    
			$this->Site->create();

                        //保存
			if ($this->Site->save($request)) {                      //保存する
                                                        
				$this->Flash->success(__('The site has been saved.'));      //保存で来た
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
		if (!$this->Site->exists($id)) {
			throw new NotFoundException(__('Invalid site'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Site->save($this->request->data)) {
				$this->Flash->success(__('The site has been saved.'));
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

