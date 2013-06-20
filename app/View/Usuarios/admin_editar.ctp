<span class="alert alert-info">Editar informações do usuário</span>
<hr />

<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'usuarios', 'action' => 'index'), array('class' => 'btn')); ?></p>
<hr />

<?php
    echo $this->Form->create('Usuario');
	echo $this->Form->input('username', array('required' => true, 'label' => 'Nome de Usuário'));
	echo $this->Form->input('status', array('required' => true, 'label' => 'Status', 'options' => array('Inativo', 'Ativo'), 'empty' => '(Escolha um)'));
    echo $this->Form->input('id', array('type' => 'hidden'));

    echo $this->HTML->link('Mudar senha do usuário', array('controller' => 'usuarios', 'action' => 'mudar_senha', $usuario['Usuario']['id']));

    echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); 
?>