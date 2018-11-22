<?php echo $this->Form->create('User'); ?>
<h3 class="page-title">		<?php echo __('Añadir usuario'); ?>	</h3>
<div class="row">
	<div class="col-md-6">

<div class="portlet light bordered">

			<div class="portlet-title">
				<div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Añadir usuario</span>
                </div>
			</div>
			<div class="portlet-body">

	
	<div class="form-group" style="margin-top:50px;margin-bottom:10px">
		<?php echo $this->Form->input('name', array('class' => 'form-control','label' => 'Nombre')); ?>
	</div>

    <div class="form-group">
     <label>Email</label>
        <div class="input-group input-icon right">
            <span class="input-group-addon"><i class="fa fa-envelope font-purple"></i></span>
            <i class="fa fa-exclamation tooltips" data-original-title="Invalid email." data-container="body"></i>
		<?php echo $this->Form->input('username', array('class' => 'form-control','label' => false,'placeholder' => __('email@domain.com'))); ?>        </div>
    </div>


	
	<div class="form-group">	
		<?php echo $this->Form->input('password', array('class' => 'form-control','label' => 'Contraseña')); ?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('group_id', array('class' => 'hidden','value' => '2','label' => 'Grupo')); ?>
	</div>

	<?php
	$options = array(
		'label' => 'Guardar',
		'class' => 'btn btn-circle btn-primary',
		'type' => 'submit'
	);
	echo $this->Form->end($options);
	?>
</div>	
</div>
</div>





