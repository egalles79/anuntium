<div class="authentications index">
	<h2><?php echo __('Authentications'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('token'); ?></th>
			<th><?php echo $this->Paginator->sort('expires_on'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($authentications as $authentication): ?>
	<tr>
		<td><?php echo h($authentication['Authentication']['id']); ?>&nbsp;</td>
		<td><?php echo h($authentication['Authentication']['created']); ?>&nbsp;</td>
		<td><?php echo h($authentication['Authentication']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($authentication['User']['name'], array('controller' => 'users', 'action' => 'view', $authentication['User']['id'])); ?>
		</td>
		<td><?php echo h($authentication['Authentication']['token']); ?>&nbsp;</td>
		<td><?php echo h($authentication['Authentication']['expires_on']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $authentication['Authentication']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $authentication['Authentication']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $authentication['Authentication']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $authentication['Authentication']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Authentication'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
