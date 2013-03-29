<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {

	public $uses = array('Order', 'Zone');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		//find order in current day.
		$orders = $this->Order->find('list', array(
			'fields'=> array('Order.table_id', 'Order.status'),
			'conditions'=> array('Order.status !='=> STATUS_ORDER_CLOSE, 'DATE(Order.created)'=> date('Y-m-d')),
		));
		$tableStatuses = array(
			'served'=> 0,
			'waiting'=> 0,
			'ordering'=> 0,
			'empty'=> 0,
		);
		//get data for each zone.
		$zones = $this->Zone->find('all');
		$zoneData = array();
		foreach($zones as $zone){
			if(empty($zone['Table'])){
				continue;
			}
			$tables = array();
			foreach($zone['Table'] as $table){
				//check current status of each table
				if(isset($orders[$table['id']])){
					switch($orders[$table['id']]){
						case STATUS_ORDER_ORDERING:
							$status = 'ordering';
							break;
						case STATUS_ORDER_WAITING:
							$status = 'waiting';
							break;
						case STATUS_ORDER_SERVICED:
							$status = 'serviced';
							break;
					}
				}else{
					$status = 'empty';
				}
				$tableStatuses[$status]++;
				$tables[] = array(
					'id'=> $table['id'],
					'name'=> $table['name'],
					'status'=> $status,
				);
			}
			$zoneData[] = array(
				'id'=> $zone['Zone']['id'],
				'name'=> $zone['Zone']['name'],
				'tables'=> $tables,
			);
		}
		$this->set(compact('zoneData', 'tableStatuses'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($tableId = null) {
		if($this->request->is('ajax')){
			$this->layout = 'ajax';
		}
		$options = array(
			'contain'=> array('OrderItem.Item', 'Table.name'),
			'conditions' => array('Order.table_id' => $tableId, 'DATE(Order.created)'=> date('Y-m-d'), 'Order.status !='=> STATUS_ORDER_CLOSE),
		);
		$order = $this->Order->find('first', $options);
		$this->set(compact('order'));
		if($this->request->is('ajax')){
			$this->render('view_popup');
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$tables = $this->Order->Table->find('list');
		$users = $this->Order->User->find('list');
		$this->set(compact('tables', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$tables = $this->Order->Table->find('list');
		$users = $this->Order->User->find('list');
		$this->set(compact('tables', 'users'));
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
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('Order deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Order was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Order->recursive = 0;
		$this->set('orders', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$tables = $this->Order->Table->find('list');
		$users = $this->Order->User->find('list');
		$this->set(compact('tables', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$tables = $this->Order->Table->find('list');
		$users = $this->Order->User->find('list');
		$this->set(compact('tables', 'users'));
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
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('Order deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Order was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
