<?php
App::uses('AppController', 'Controller');
/**
 * Stores Controller
 *
 * @property Store $Store
 */
class StoresController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->__index();
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->__add();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->__edit($id);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->__delete($id);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->__index();
		$this->render('index');
	}
	
	

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->__view($id);
		$this->render('view');
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->__add();
		$this->render('add');
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->__edit($id);
		$this->render('edit');
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->__delete($id);
		$this->render('delete');
	}
	
	private function __index(){
		$this->paginate = array('Store' => array(
			'contain' => array('Item.name1'),
			'paramType'=> 'querystring',
			'limit'=> ROWS_PER_PAGE,
		));
		$stores = $this->paginate('Store');
		$this->set(compact('stores'));
	}
	
	private function __add(){
		if ($this->request->is('post')) {
			$this->Store->create();
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store could not be saved. Please, try again.'));
			}
		}
		$items = $this->Store->Item->find('list');
		$this->set(compact('items'));
	}
	
	private function __edit($id){
		if (!$this->Store->exists($id)) {
			throw new NotFoundException(__('Invalid store'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
			$this->request->data = $this->Store->find('first', $options);
		}
		$items = $this->Store->Item->find('list');
		$this->set(compact('items'));
	}
	
	private function __delete($id){
		$this->Store->id = $id;
		if (!$this->Store->exists()) {
			throw new NotFoundException(__('Invalid store'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Store->delete()) {
			$this->Session->setFlash(__('Store deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Store was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
