<?php
App::uses('AppController', 'Controller');
/**
 * Suppliers Controller
 *
 * @property Supplier $Supplier
 */
class SuppliersController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Supplier->recursive = 0;
		$this->set('suppliers', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Supplier->exists($id)) {
			throw new NotFoundException(__('Invalid supplier'));
		}
		$options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
		$this->set('supplier', $this->Supplier->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Supplier->create();
			if ($this->Supplier->save($this->request->data)) {
				$this->Session->setFlash(__('The supplier has been saved'), 'default', array('class'=> 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplier could not be saved. Please, try again.'), 'default', array('class'=> 'alert alert-error'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Supplier->exists($id)) {
			throw new NotFoundException(__('Invalid supplier'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Supplier->save($this->request->data)) {
				$this->Session->setFlash(__('The supplier has been saved'), 'default', array('class'=> 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplier could not be saved. Please, try again.'), 'default', array('class'=> 'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Supplier.' . $this->Supplier->primaryKey => $id));
			$this->request->data = $this->Supplier->find('first', $options);
		}
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
		$this->Supplier->id = $id;
		if (!$this->Supplier->exists()) {
			throw new NotFoundException(__('Invalid supplier'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Supplier->delete()) {
			$this->Session->setFlash(__('Supplier deleted'), 'default', array('class'=> 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Supplier was not deleted'), 'default', array('class'=> 'alert alert-error'));
		$this->redirect(array('action' => 'index'));
	}
}
