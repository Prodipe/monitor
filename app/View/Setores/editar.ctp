<span class="alert alert-info">Editar informações do setor</span>
<hr />
<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'setores', 'action' => 'index'), array('class' => 'btn')); ?></p>

<?php
	echo $this->Form->create('Setor');
	echo $this->Form->input('nome', array('required' => true, 'label' => 'Nome do Setor'));
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success'));
?>