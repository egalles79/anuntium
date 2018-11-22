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
					<th><?php echo $this->Paginator->sort('level_id', ' Nivel'); ?></th>
					<th><?php echo $this->Paginator->sort('email', ' Correo electrónico'); ?></th>
					<th><?php echo $this->Paginator->sort('name','Nombre'); ?></th>
					<!-- <th><?php echo $this->Paginator->sort('password'); ?></th> -->
					<th><?php echo $this->Paginator->sort('facebook_uid' , 'Id. de Facebook'); ?></th>
					<th><?php echo $this->Paginator->sort('gender_id',' Género'); ?></th>
					<th class="center"><?php echo $this->Paginator->sort('height', 'Altura'); ?></th>
					<th class="center"><?php echo $this->Paginator->sort('weight', ' Peso'); ?></th>
					<!--<th><?php echo ' Premium' ?></th>-->
			</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
				<!-- <td><?php echo h($user['User']['created']); ?>&nbsp;</td> -->
				<!-- <td><?php echo h($user['User']['modified']); ?>&nbsp;</td> -->
				<td>
					<?php echo $user['Level']['name']; //$this->Html->link($user['Level']['name'], array('controller' => 'levels', 'action' => 'view', $user['Level']['id'])); ?>
				</td>
				<!--<td>
					<?php //echo $user['Group']['name'];//$this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
				</td>-->
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
				<!-- <td><?php echo h($user['User']['password']); ?>&nbsp;</td>  -->
				<td><?php echo h($user['User']['facebook_uid']); ?>&nbsp;</td>
				<td><?php 
				$generoText = ($user['User']['gender_id'] == 1) ? 'Hombre' : 'Mujer';
				echo h($generoText); ?>&nbsp;</td>
				<td class="center"><?php echo h($user['User']['height']); ?>&nbsp;</td>
				<td class="center"><?php echo h($user['User']['weight']); ?>&nbsp;</td>
				<td>
					<div style="margin-left:30px">
					<?php 
						if ($user['User']['is_premium'] != 'N') {
							if ($user['User']['is_premium'] == 'C') {
								$textIcon = 'icon-briefcase';
								$textTitle = 'Pago por empresa';

							} else if ($user['User']['is_premium'] == 'A') {
								$textIcon = 'fa fa-android';
								$textTitle = 'Pago por Android';
							} else if ($user['User']['is_premium'] == 'P') {
								$textIcon = 'fa fa-apple';
								$textTitle = 'Pago por Apple Store';
							} else if ($user['User']['is_premium'] == 'W') {
								$textIcon = 'fa fa-globe';
								$textTitle = 'Pago por Web';
							}
							/*echo $this->Html->Link('<i class="glyphicon glyphicon-check"></i>&nbsp;<i title="'.$textTitle.'" class="'.$textIcon.' fa-lg"></i>',array('controller' => 'Clients','action' => 'checkClient',$user['User']['id']),array('escape' => false));
								echo ''*/;
							
						} else {
							echo '<i class="glyphicon glyphicon-unchecked"></i>';
						}
					?>
					</div>
				</td>			
			</tr>
			<?php endforeach; ?>
			</tbody>
			</table>
		</div>
		
	</div>	
</div>
</div>
</div>
</div>