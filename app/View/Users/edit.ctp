<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<h3 class="page-title"><?php echo __('Edit User'); ?></h3>
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->input('id'); ?>
			<div class="form-group"><?php echo $this->Form->input('level_id', array('class' => 'form-control')); ?></div>
		</div>
		<div class="col-md-6">
			<div class="form-group"><?php echo $this->Form->input('group_id', array('class' => 'form-control')); ?></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group"><?php echo $this->Form->input('email', array('class' => 'form-control')); ?></div>
		</div>
		<div class="col-md-4">
			<div class="form-group"><?php echo $this->Form->input('username', array('class' => 'form-control')); ?></div>
		</div>
		<div class="col-md-4">
			<div class="form-group"><?php echo $this->Form->input('password', array('class' => 'form-control')); ?></div>
		</div>
	</div>
		<div class="form-group"><?php echo $this->Form->input('avatar', array('class' => 'form-control')); ?></div>
<?php
	$options = array(
		'label' => 'Guardar',
		'class' => 'btn btn-circle btn-primary',
		'type' => 'submit'
	);
	echo $this->Form->end($options);
?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="nav nav-pills">

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Levels'), array('controller' => 'levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Level'), array('controller' => 'levels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images Users'), array('controller' => 'images_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Images User'), array('controller' => 'images_users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercise'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rewards'), array('controller' => 'rewards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reward'), array('controller' => 'rewards', 'action' => 'add')); ?> </li>
	</ul>
</div>
