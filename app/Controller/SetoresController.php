<?php
	class SetoresController extends AppController {
		public $helpers = array('Html', 'Form');

		// Paginação
		public $paginate = array(
			'limit' => 20,
			'order' => array('Setor.nome' => 'asc')
		);

		public function index() {
			$this->set('setores', $this->paginate());
		}
		/*
		public function ver($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$setor = $this->Setor->findById($id);

			if (!$setor) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$this->set('setor', $setor);
		}
		*/
		public function adicionar($id = null) {
			if ($this->request->is('post')) {
				$this->Setor->create();
				if ($this->Setor->save($this->request->data)) {
					$this->Session->setFlash(__('O setor ' . $this->data['Setor']['nome'] . ' foi adicionado'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Nenhum setor foi adicionado', 'default', array('class' => 'alert alert-danger'));
				}
			}
		}

		public function editar($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$setor = $this->Setor->findById($id);

			if (!$setor) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Setor->id = $id;
				if ($this->Setor->save($this->request->data)) {
					$this->Session->setFlash(__('As informações foram atualizadas'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('As informações não foram atualizadas', 'default', array('class' => 'alert alert-danger'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $setor;
			}
		}

		public function deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			$setor = $this->Setor->findById($id);

			if ($this->Setor->delete($id)) {
				$this->Session->setFlash(__('O setor: ' . $setor['Setor']['nome'] . ' foi deletado'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
?>