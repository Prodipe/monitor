
<span class="alert alert-info">Livros</span>
<hr />

<p><?php echo $this->Html->link('Adicionar um livro', array('controller' => 'livros', 'action' => 'adicionar'), array('class' => 'btn')); ?></p>

<table class="table table-hover table-bordered">
    <tr>
        <th><?php echo $this->Paginator->sort('nome', 'Nome'); ?></th>
        <th><?php echo $this->Paginator->sort('professor', 'Professor'); ?></th>
        <th><?php echo $this->Paginator->sort('status', 'Status'); ?></th>
		<th>Ações</th>
    </tr>

    <?php foreach ($livros as $livro): ?>

    <tr>
        <td>
            <?php echo $this->Html->link($livro['Livro']['nome'], array('controller' => 'livros', 'action' => 'ver', $livro['Livro']['id'])); ?>
        </td>
        <td><?php echo $livro['Livro']['professor']; ?></td>
        <td><?php echo $livro['Livro']['status']; ?></td>
		<td>
            <?php echo $this->Html->link('Editar', array('action' => 'editar', $livro['Livro']['id']), array('class' => 'btn btn-small')); ?>

			<?php echo $this->Form->postLink('Deletar',
            array('action' => 'deletar', $livro['Livro']['id']),
            array('class'=>'btn btn-danger btn-small', 'escape' => false),
            __('Você tem certeza que deseja excluir o livro: %s?', $livro['Livro']['nome'])); ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($livro); ?>
</table>

<!-- Paginação -->
<!-- Mostra os links anterior e próximo -->
<ul class="pager">
  <li><?php echo $this->Paginator->prev('Anterior', null, null, array('class' => 'disabled'));?></li>
  <li><?php echo $this->Paginator->next('Próximo', null, null, array('class' => 'disabled'));?></li>
</ul>
<!-- Mostra número de páginas -->
<?php echo $this->Paginator->numbers();?>
<!-- Formato: página X de Y, W resultados de um total de Z -->
<?php echo $this->Paginator->counter(array('format' => 'Página {:page} de {:pages}, mostrando {:current} resultados de um total de {:count}'));?>