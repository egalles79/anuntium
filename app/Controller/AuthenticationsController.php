<?php
App::uses('AppController', 'Controller');
/**
 * Authentications Controller
 *
 * @property Authentication $Authentication
 * @property PaginatorComponent $Paginator
 */
class AuthenticationsController extends AppController {

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
		$this->Authentication->recursive = 0;
		$this->set('authentications', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Authentication->exists($id)) {
			throw new NotFoundException(__('Invalid authentication'));
		}
		$options = array('conditions' => array('Authentication.' . $this->Authentication->primaryKey => $id));
		$this->set('authentication', $this->Authentication->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Authentication->create();
			if ($this->Authentication->save($this->request->data)) {
				$this->Session->setFlash(__('The authentication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The authentication could not be saved. Please, try again.'));
			}
		}
		$users = $this->Authentication->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Authentication->exists($id)) {
			throw new NotFoundException(__('Invalid authentication'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Authentication->save($this->request->data)) {
				$this->Session->setFlash(__('The authentication has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The authentication could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Authentication.' . $this->Authentication->primaryKey => $id));
			$this->request->data = $this->Authentication->find('first', $options);
		}
		$users = $this->Authentication->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Authentication->id = $id;
		if (!$this->Authentication->exists()) {
			throw new NotFoundException(__('Invalid authentication'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Authentication->delete()) {
			$this->Session->setFlash(__('The authentication has been deleted.'));
		} else {
			$this->Session->setFlash(__('The authentication could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
