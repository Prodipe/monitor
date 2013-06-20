<span class="alert alert-info">Usuários</span>
<hr />

<?php echo $this->Html->link('Adicionar um usuário', array('controller' => 'usuarios', 'action' => 'adicionar'), array('class' => 'btn')); ?>
<hr />

<table class="table table-hover table-bordered">
    <tr>
		<th>Login</th>
		<th>Status</th>
		<th>Ações</th>
    </tr>

    <?php foreach ($usuarios as $usuario): ?>
	<!-- Verifica o status do usuário. 0 = 'Ativo' e 1 = 'Inativo' -->
	<?php 
		if ($usuario['Usuario']['status']) {
			$status = "Ativo";
		}
		else {
			$status = "Inativo";
		}
	?>
    <tr>
        <td><?php echo $usuario['Usuario']['username']; ?></td>
		<td><?php echo $status; ?></td>
		<td><?php echo $this->Html->link('Editar', array('action' => 'editar', $usuario['Usuario']['id']), array('class' => 'btn')); ?>
			
			<?php echo $this->Form->postLink('<i class="icon-trash icon-white"></i> ' . __('Deletar'), 
            array('action' => 'deletar', $usuario['Usuario']['id']),
            array('class'=>'btn btn-danger', 'escape' => false),
            __('Você tem certeza que deseja excluir o usuario: %s?', $usuario['Usuario']['username'])); ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($usuario); ?>
</table>