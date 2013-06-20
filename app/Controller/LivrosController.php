<?php
	class LivrosController extends AppController {
		public $helpers = array('Html', 'Form');

		// Paginação
		public $paginate = array(
			'limit' => 20,
			'order' => array('Livro.nome' => 'asc')
		);

		public function index() {
			//$this->set('livros', $this->Livro->find('all'));
			$this->set('livros', $this->paginate());
		}

		public function ver($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$livro = $this->Livro->findById($id);

			if (!$livro) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$this->set('livro', $livro);
		}

		public function adicionar($id = null) {
			if ($this->request->is('post')) {
				$this->Livro->create();
				if ($this->Livro->save($this->request->data)) {
					$this->Session->setFlash(__('O livro ' . $this->data['Livro']['nome'] . ' foi adicionado'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Nenhum livro foi adicionado', 'default', array('class' => 'alert alert-danger'));
				}
			}
		}

		public function editar($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$livro = $this->Livro->findById($id);

			if (!$livro) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Livro->id = $id;
				if ($this->Livro->save($this->request->data)) {
					$this->Session->setFlash(__('As informações foram atualizadas'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('As informações não foram atualizadas', 'default', array('class' => 'alert alert-danger'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $livro;
			}
		}

		public function deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			$livro = $this->Livro->findById($id);

			if ($this->Livro->delete($id)) {
				$this->Session->setFlash(__('O livro: ' . $livro['Livro']['nome'] . ' foi deletado'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
?>