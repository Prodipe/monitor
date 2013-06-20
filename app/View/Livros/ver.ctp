
<span class="alert alert-info">Dados do Livro: <strong><?php echo $livro['Livro']['nome']; ?></strong></span>
<hr />

<table class="table table-hover">
<tr>
	<td>Nome do Livro</td>
	<td><?php echo $livro['Livro']['nome']; ?></td>
</tr>
<tr>
	<td>Descrição</td>
	<td><?php echo $livro['Livro']['descricao']; ?></td>
</tr>
<tr>
	<td>Professor responsável</td>
	<td><?php echo $livro['Livro']['professor']; ?></td>
</tr>
<tr>
	<td>Status</td>
	<td><?php echo $livro['Livro']['status']; ?></td>
</tr>
</table>
<?php echo $this->HTML->link('Ir para livros', array('controller' => 'livros', 'action' => 'index'), array('class' => 'btn')); ?>

<hr />
<!-- Link para voltar -->
