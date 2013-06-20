<?php
	class EtapasController extends AppController {
		public $helpers = array('Html', 'Form');

		// Paginação
		public $paginate = array(
			'limit' => 20,
			'order' => array('Etapa.posicao' => 'asc')
		);

		public function index() {
			$this->set('etapas', $this->paginate());
		}

		public function ver($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$etapa = $this->Etapa->findById($id);

			if (!$etapa) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$this->set('etapa', $etapa);
		}

		public function adicionar($id = null) {
			if ($this->request->is('post')) {
				$this->Etapa->create();
				if ($this->Etapa->save($this->request->data)) {
					$this->Session->setFlash(__('A etapa ' . $this->data['Etapa']['nome'] . ' foi adicionada'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Nenhuma etapa foi adicionada', 'default', array('class' => 'alert alert-danger'));
				}
			}
		}

		public function editar($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$etapa = $this->Etapa->findById($id);

			if (!$etapa) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Etapa->id = $id;
				if ($this->Etapa->save($this->request->data)) {
					$this->Session->setFlash(__('As informações foram atualizadas'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('As informações não foram atualizadas', 'default', array('class' => 'alert alert-danger'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $etapa;
			}
		}

		public function deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			$etapa = $this->Etapa->findById($id);

			if ($this->Etapa->delete($id)) {
				$this->Session->setFlash(__('A etapa: ' . $etapa['Etapa']['nome'] . ' foi deletada'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
?>