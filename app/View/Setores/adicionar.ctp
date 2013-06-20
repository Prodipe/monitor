<span class="alert alert-info">Adicionar Setor</span>
<hr />
<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'setores', 'action' => 'index'), array('class' => 'btn')); ?></p>

<?php
	echo $this->Form->create('Setor');
	echo $this->Form->input('nome', array('required' => true, 'label' => 'Nome do Setor'));
	echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success'));
?>