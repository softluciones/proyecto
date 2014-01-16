<?php
App::uses('AppController', 'Controller');
/**
 * ChequeEstadocheques Controller
 *
 * @property ChequeEstadocheque $ChequeEstadocheque
 * @property PaginatorComponent $Paginator
 */
class ChequeEstadochequesController extends AppController {

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
             
		$this->ChequeEstadocheque->recursive = 0;
		$this->set('chequeEstadocheques', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
                
		if (!$this->ChequeEstadocheque->exists($id)) {
			throw new NotFoundException(__('Cheque estado cheque invalido'));
		}
		$options = array('conditions' => array('ChequeEstadocheque.' . $this->ChequeEstadocheque->primaryKey => $id));
		$this->set('chequeEstadocheque', $this->ChequeEstadocheque->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
             
                
		if ($this->request->is('post')) {
			$this->ChequeEstadocheque->create();
			if ($this->ChequeEstadocheque->save($this->request->data)) {
				$this->Session->setFlash(__('El cheque estado del cheque ha sido guardado.'));
				return $this->redirect(array('controller'=>'cheques','action' => 'index'));
			} else {
				$this->Session->setFlash(__('El cheque estado del cheque no ha sido guardado. Intentalo de nuevo'));
			}
		}
                $conditions=array('Cheque.id'=>$id);
		$cheques = $this->ChequeEstadocheque->Cheque->find('list',array('fields'=>array('id','chequess'),
                                                                                    'conditions'=>$conditions));
		$estadocheques = $this->ChequeEstadocheque->Estadocheque->find('list',array('fields'=>array('id','nombresss')));
		$users = $this->ChequeEstadocheque->User->find('list');
                $x=$this->ChequeEstadocheque->query("select id, username from users where id=".$this->Auth->user('id')."");                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('cheques', 'estadocheques', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
               
            $this->ChequeEstadocheque->recursive=2;
		if (!$this->ChequeEstadocheque->exists($id)) {
			throw new NotFoundException(__('Invalido estado de cheque'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ChequeEstadocheque->save($this->request->data)) {
				$this->Session->setFlash(__('El estado del cheque estado del cheque ha sido Modificado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El estado de cheque estado del cheque no ha sido Modificado. Intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('ChequeEstadocheque.' . $this->ChequeEstadocheque->primaryKey => $id));
			$this->request->data = $this->ChequeEstadocheque->find('first', $options);
                    
		}
		$cheques = $this->ChequeEstadocheque->Cheque->find('list');
               
		$estadocheques = $this->ChequeEstadocheque->Estadocheque->find('list');
		$users = $this->ChequeEstadocheque->User->find('list');
                $x=$this->ChequeEstadocheque->query("select id, username from users where id=".$this->Auth->user('id')."");
                
                $users=array($x[0]['users']['id']=>$x[0]['users']['username']);
		$this->set(compact('cheques', 'estadocheques', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
               
		$this->ChequeEstadocheque->id = $id;
		if (!$this->ChequeEstadocheque->exists()) {
			throw new NotFoundException(__('Cheque estado del cheque invalida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ChequeEstadocheque->delete()) {
			$this->Session->setFlash(__('El cheque estado del cheque ha sido eliminada'));
		} else {
			$this->Session->setFlash(__('El cheque estado del cheque no ha sido eliminada. Intentalo de nuevo y revisa.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
