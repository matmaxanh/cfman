<?php
App::uses('AppController', 'Controller');
/**
 * Bookings Controller
 *
 * @property Booking $Booking
 */
class BookController extends AppController {

	public $uses = array('Booking');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->__index();
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->__view($id);
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
	}

	private function __index(){
		$tables = $this->Booking->Table->find('list');
		$this->Booking->recursive = 0;
		$this->paginate = array('Booking'=> array(
			'paramType'=> 'querystring',
			'limit'=> ROWS_PER_PAGE,
			'order'=> 'Booking.created DESC'
			));
			$conditions = array();
			foreach($this->params['url'] as $key=> $value){
				if(empty($value)){
					continue;
				}
				$value = urldecode($value);
				switch($key){
					case 'booker_name':
					case 'booker_contact':
						$conditions['Booking.'.$key.' LIKE'] = '%'.$value.'%';
						break;
					case 'table_id':
						$conditions['Booking.table_id'] = $value;
						break;
					case 'book_day':
						$date = date_create_from_format('d/m/Y', $value);
						$conditions['DATE(Booking.time_from)'] = date_format($date, 'Y-m-d');
						break;
					case 'receive_day':
						$date = date_create_from_format('d/m/Y', $value);
						$conditions['DATE(Booking.created)'] = date_format($date, 'Y-m-d');
						break;
				}
			}
			$bookings = $this->paginate('Booking', $conditions);
			$this->set(compact('tables', 'bookings'));
	}

	private function __view($id){
		if (!$this->Booking->exists($id)) {
			throw new NotFoundException(__('Invalid booking'));
		}
		$options = array('conditions' => array('Booking.' . $this->Booking->primaryKey => $id));
		$this->set('booking', $this->Booking->find('first', $options));
	}

	private function __add(){
		if ($this->request->is('post')) {
			if(!empty($this->request->data['Booking']['book_from'])){
				$this->request->data['Booking']['time_from'] = date_format(date_create_from_format('d/m/Y H:i', $this->request->data['Booking']['book_from']), 'Y-m-d H:i:s');
			}
			if(!empty($this->request->data['Booking']['book_to'])){
				$this->request->data['Booking']['time_to'] = date_format(date_create_from_format('d/m/Y H:i', $this->request->data['Booking']['book_to']), 'Y-m-d H:i:s');
			}
			$this->Booking->create();
			if ($this->Booking->save($this->request->data)) {
				$this->Session->setFlash(__('The booking has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The booking could not be saved. Please, try again.'));
			}
		}
		$tables = $this->Booking->Table->find('list');
		$this->set(compact('tables'));
	}

	private function __edit($id){
		if (!$this->Booking->exists($id)) {
			throw new NotFoundException(__('Invalid booking'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if(!empty($this->request->data['Booking']['book_from'])){
				$this->request->data['Booking']['time_from'] = date_format(date_create_from_format('d/m/Y H:i', $this->request->data['Booking']['book_from']), 'Y-m-d H:i:s');
			}else{
				$this->request->data['Booking']['time_from'] = null;
			}
			if(!empty($this->request->data['Booking']['book_to'])){
				$this->request->data['Booking']['time_to'] = date_format(date_create_from_format('d/m/Y H:i', $this->request->data['Booking']['book_to']), 'Y-m-d H:i:s');
			}else{
				$this->request->data['Booking']['time_to'] = null;
			}
			if ($this->Booking->save($this->request->data)) {
				$this->Session->setFlash(__('The booking has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The booking could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Booking.' . $this->Booking->primaryKey => $id));
			$this->request->data = $this->Booking->find('first', $options);
			$this->request->data['Booking']['book_from'] = date('d/m/Y H:i', strtotime($this->request->data['Booking']['time_from']));
			$this->request->data['Booking']['book_to'] = date('d/m/Y H:i', strtotime($this->request->data['Booking']['time_to']));
		}
		$tables = $this->Booking->Table->find('list');
		$this->set(compact('tables'));
	}

	private function __delete($id){
		$this->Booking->id = $id;
		if (!$this->Booking->exists()) {
			throw new NotFoundException(__('Invalid booking'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Booking->delete()) {
			$this->Session->setFlash(__('Booking deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Booking was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
