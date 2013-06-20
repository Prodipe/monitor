<style>
	.login-form {
		width: 465px;
		margin: 100px auto;
		border:1px solid #DDDDDD;
		padding:10px;
	}
</style>

<div class="login-form sombra borda-arredondada">
	<h4>Login - Átomo</h4>
<?php 
	echo $this->Session->flash('auth'); 
	echo $this->Form->create('Usuario');
    echo $this->Form->input('username', array('label' => 'Nome de usuário'));
    echo $this->Form->input('password', array('label' => 'Senha'));
	echo $this->Form->submit(__('Entrar'), array('div' => false, 'class' => 'btn'));
?>	
</div>
