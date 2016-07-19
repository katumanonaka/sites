<?php
App::uses('AppController', 'Controller');
/**
 * CategoryNames Controller
 *
 * @property CategoryName $CategoryName
 * @property PaginatorComponent $Paginator
 */
class CategoryNamesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CategoryName->recursive = 0;
		$this->set('categoryNames', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoryName->exists($id)) {
			throw new NotFoundException(__('Invalid category name'));
		}
		$options = array('conditions' => array('CategoryName.' . $this->CategoryName->primaryKey => $id));
		$this->set('categoryName', $this->CategoryName->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoryName->create();
			if ($this->CategoryName->save($this->request->data)) {
				$this->Flash->success(__('The category name has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category name could not be saved. Please, try again.'));
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
		if (!$this->CategoryName->exists($id)) {
			throw new NotFoundException(__('Invalid category name'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategoryName->save($this->request->data)) {
				$this->Flash->success(__('The category name has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category name could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoryName.' . $this->CategoryName->primaryKey => $id));
			$this->request->data = $this->CategoryName->find('first', $options);
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
		$this->CategoryName->id = $id;
		if (!$this->CategoryName->exists()) {
			throw new NotFoundException(__('Invalid category name'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CategoryName->delete()) {
			$this->Flash->success(__('The category name has been deleted.'));
		} else {
			$this->Flash->error(__('The category name could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
