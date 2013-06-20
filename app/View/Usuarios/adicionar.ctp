<span class="alert alert-info">Cadastrar novo usuário</span>
<hr />
<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'usuarios', 'action' => 'index'), array('class' => 'btn')); ?></p>
<hr />

<?php
	echo $this->Form->create('Usuario');
	echo $this->Form->input('username', array('required' => true, 'label' => 'Nome de Usuário'));
	echo $this->Form->input('status', array('required' => true, 'label' => 'Status', 'options' => array('Inativo', 'Ativo'), 'empty' => '(Escolha um)'));
?>	
	<fieldset>
		<legend>Senha</legend>
		<?php echo $this->Form->input('password', array('required' => true, 'label' => 'Senha', 'value' => ''));?>
		<?php echo $this->Form->input('password_confirm', array('required' => true, 'label' => 'Repita a senha:', 'type' => 'password'));?>
	<fieldset>
	
<?php //echo $this->Form->end('Salvar');
	echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success'));
?>