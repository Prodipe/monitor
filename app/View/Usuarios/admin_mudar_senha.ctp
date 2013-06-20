<span class="alert alert-info">Mudar a senha</span>
<hr />
<?php
	echo $this->Form->create('Usuario');
	echo $this->Form->input('password', array('required' => true, 'label' => 'Nova senha', 'value' => ''));
	echo $this->Form->input('password_confirm', array('required' => true, 'label' => 'Repita a senha:', 'type' => 'password'));
	echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success'));
?>