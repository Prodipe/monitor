<?php
	class UsuariosController extends AppController {
		public $helpers = array('Html', 'Form');
		public $name = 'Usuarios';
        public $uses = array('Usuario');

        // Override da função beforeFilter do AppController
		/*public function beforeFilter() {
			parent::beforeFilter();
		}*/

		public function index() {
			// Somente os usuários comuns com nível de acesso igual a 0 (não administradores)
			$this->set('usuarios', $this->Usuario->find('all', array('conditions' => array('Usuario.nivel_acesso' => 0))));
		}

		public function adicionar() {
			if ($this->request->is('post')) {
				$this->Usuario->create();
				if ($this->Usuario->save($this->request->data)) {
					$this->Session->setFlash(__('Usuário cadastrado com sucesso!'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Erro durante o cadastro de usuário!', 'default', array('class' => 'alert alert-danger'));
				}
			}
		}

		public function editar($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$usuario = $this->Usuario->findById($id);

			if (!$usuario) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			// Verifica se o usuário não é administrador
			// Um administrador só pode editar informações de usuários comuns ou de si próprio
			if ($usuario['Usuario']['nivel_acesso'] != 1) {
				$this->set('usuario', $usuario);
				
				if ($this->request->is('post') || $this->request->is('put')) {
					$this->Usuario->id = $id;
					if ($this->Usuario->save($this->request->data)) {
						$this->Session->setFlash(__('As informações do usuário foram atualizadas'), 'default', array('class' => 'alert alert-success'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash('As informações não foram atualizadas', 'default', array('class' => 'alert alert-danger'));
					}
				}
				if (!$this->request->data) {
					$this->request->data = $usuario;
				}
			}
			// Verifica se o usuário é o mesmo que está logado
			// O usuário só pode editar informações referentes a si próprio
			else if ($id == $this->Auth->user('id')) {
				$this->set('usuario', $usuario);
				
				if ($this->request->is('post') || $this->request->is('put')) {
					$this->Usuario->id = $id;
					if ($this->Usuario->save($this->request->data)) {
						$this->Session->setFlash(__('As informações do usuário foram atualizadas'), 'default', array('class' => 'alert alert-success'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash('As informações não foram atualizadas', 'default', array('class' => 'alert alert-danger'));
					}
				}
				if (!$this->request->data) {
					$this->request->data = $usuario;
				}
			}
			else {
				$this->redirect(array('action' => 'index'));
			}
		}

		public function admin_deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			$usuario = $this->Usuario->findById($id);
			
			if ($this->Usuario->delete($id)) {
				$this->Session->setFlash(__('O usuário: ' . $usuario['Usuario']['username'] . ' foi deletado'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			}
		}

		public function admin_mudar_senha($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			
			$usuario = $this->Usuario->findById($id);
			
			if (!$usuario) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			// Verifica se o usuário não é administrador
			// Um administrador só pode editar informações de usuários comuns ou de si próprio
			if ($usuario['Usuario']['nivel_acesso'] != 1) {
				if ($this->request->is('post') || $this->request->is('put')) {
					$this->Usuario->id = $id;
					if ($this->Usuario->save($this->request->data)) {
						$this->Session->setFlash(__('As informações do usuário foram atualizadas'), 'default', array('class' => 'alert alert-success'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash('As informações não foram atualizadas', 'default', array('class' => 'alert alert-danger'));
					}
				}
			}
			// Verifica se o usuário é o mesmo que está logado
			// O usuário só pode editar informações referentes a si próprio
			else if ($id == $this->Auth->user('id')) {
				if ($this->request->is('post') || $this->request->is('put')) {
					$this->Usuario->id = $id;
					if ($this->Usuario->save($this->request->data)) {
						$this->Session->setFlash(__('As informações do usuário foram atualizadas'), 'default', array('class' => 'alert alert-success'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash('As informações não foram atualizadas', 'default', array('class' => 'alert alert-danger'));
					}
				}
			}
			else {
				$this->redirect(array('action' => 'index'));
			}
		}
		
		/* Área de login */
		public function login() {
			$this->set('title_for_layout', __('Log in'));
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					if ($this->Auth->user('nivel_acesso')) {
						return $this->redirect(array(
							'admin' => true,
                            'controller' => 'usuarios',
                            'action' => 'index'
                        ));
					}
					else {
						return $this->redirect(array(
                            'controller' => 'livros',
                            'action' => 'index'
                        ));
					}
				} else {
					$this->Session->setFlash('Nome de usúario ou senha não conferem!', 'default', array('class' => 'alert alert-danger'));
				}
			}
		}

		public function logout() {
			$this->Session->setFlash(__('Deslogado com sucesso!'), 'default', array('class' => 'alert alert-success'));
			$this->redirect($this->Auth->logout());
		}
		/* Fim */
	}	
?>