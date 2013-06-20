<span class="alert alert-info">Adicionar Livro</span>
<hr />
<!-- Link para voltar -->
<p><?php echo $this->HTML->link('Voltar', array('controller' => 'livros', 'action' => 'index'), array('class' => 'btn')); ?></p>

<?php
	echo $this->Form->create('Livro');
	echo $this->Form->input('nome', array('required' => true, 'label' => 'Nome do Livro'));
	echo $this->Form->input('descricao', array('required' => false, 'label' => 'Descrição', 'rows' => '2'));
	echo $this->Form->input('professor', array('required' => true, 'label' => 'Nome do Professor'));
	echo $this->Form->input('status', array('type' => 'hidden', 'value' => 'Iniciado'));
	echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success'));
?>