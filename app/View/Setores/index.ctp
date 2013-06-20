<span class="alert alert-info">Setores</span>
<hr />

<p><?php echo $this->Html->link('Adicionar um setor', array('controller' => 'setores', 'action' => 'adicionar'), array('class' => 'btn')); ?></p>

<table class="table table-hover table-bordered">
    <tr>
        <th><?php echo $this->Paginator->sort('nome', 'Nome do setor'); ?></th>
		<th>Ações</th>
    </tr>

    <?php foreach ($setores as $setor): ?>

    <tr>
        <td><?php echo $setor['Setor']['nome']; ?></td>
		<td>
            <?php echo $this->Html->link('Editar', array('action' => 'editar', $setor['Setor']['id']), array('class' => 'btn btn-small')); ?>

			<?php echo $this->Form->postLink('Deletar',
            array('action' => 'deletar', $setor['Setor']['id']),
            array('class'=>'btn btn-danger btn-small', 'escape' => false),
            __('Você tem certeza que deseja excluir o setor: %s?', $setor['Setor']['nome'])); ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($setor); ?>
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