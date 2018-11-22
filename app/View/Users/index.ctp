<div class="programs index">
	<h2 class="page-title"><?php echo __('Usuarios'); ?></h2>
	<div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
					<div class="portlet-title">
	                    <div class="caption font-dark">
	                        <i class="icon-settings font-dark"></i>
	                        <span class="caption-subject bold uppercase"> Lista de usuarios</span>
	                    </div>
	 				</div>



	<div class="portlet-body">

		<div class="table-scrollable">
			<table class="table table-striped table-hover">
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<!-- <th><?php echo $this->Paginator->sort('created'); ?></th> -->
					<!-- <th><?php echo $this->Paginator->sort('modified'); ?></th> -->
					<th><?php echo $this->Paginator->sort('email', ' Correo electrónico'); ?></th>
					<th><?php echo $this->Paginator->sort('name','Nombre'); ?></th>
					<!-- <th><?php echo $this->Paginator->sort('password'); ?></th> -->
					<th class="actions center"><?php echo __('Acciones'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user): 
				$colorBackground = ($user['User']['is_enabled'] == 0) ? '#ddd' : ''; 
				if ($colorBackground == '') {
					echo '<tr>';
				} else {
					echo '<tr style="background-color: '.$colorBackground.'">';
				}
				 ?>
				
			
				<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
				<!-- <td><?php echo h($user['User']['created']); ?>&nbsp;</td> -->
				<!-- <td><?php echo h($user['User']['modified']); ?>&nbsp;</td> -->
				<!--<td>
					<?php //echo $user['Group']['name'];//$this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
				</td>-->
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
				<!-- <td><?php echo h($user['User']['password']); ?>&nbsp;</td>  -->
				<td class="actions">
				<?php /*echo $this->Html->link(
															'<i class="fa fa-share"></i> '.__('Ver'), 
															array('action' => 'view', $user['User']['id']),
															array('class' => 'btn btn-outline btn-circle btn-sm red','escape' => FALSE));*/ ?>
									<?php
									if ($user['User']['is_enabled']) {
									 echo $this->Form->postLink(
															'<i class="fa fa-trash-o"></i> '.__('Eliminar'), 
															array('action' => 'delete', $user['User']['id']), 
															array('class' => 'btn btn-outline btn-circle btn-sm dark',
																  'escape' => FALSE, 
																  'confirm' => __('Está seguro de querer eliminar el usuario "%s" ?',  $user['User']['name']))); } else { echo 'Deshabilitado'; } ?>
									
			</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="paging btn-group">
					<?php
						echo $this->Paginator->prev(
							'< ' . __('Anterior'), 
							array('class' => 'btn btn-default prev'),
							null, 
							array('class' => 'btn btn-default prev disabled')
						);
						echo $this->Paginator->numbers(array('separator' => '', 'class' => 'btn btn-default'));
						echo $this->Paginator->next(
							__('Següent') . ' >', 
							array('class' => 'btn btn-default next'), 
							null, 
							array('class' => 'btn btn-default next disabled')
						);
					?>
				</div>
			</div>
			<div class="col-md-6 text-right">
				<p class="pagination-info">
					<?php
					echo $this->Paginator->counter(array(
						'format' => __('Página {:page} de {:pages}')
					));
					//, mostrando {:current} registros de {:count} totales, empezando en el registro {:start}, finalizando en {:end}
					?>
				</p>
			</div>
			<?php echo $this->Html->link(
			    'Crear excel',
			    array(
			        'controller' => 'Users',
			        'action' => 'createExcel'
			    ),
			    array('class' => 'btn btn-transparent dark btn-outline btn-circle btn-sm')
			);?>
		</div>		



	</div>	
</div>
</div>
</div>
</div>