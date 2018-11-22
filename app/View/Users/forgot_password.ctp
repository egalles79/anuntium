<div class="col-md-4">&nbsp;</div>
		<div class="col-md-4">
	<div style="background-color:#fff;color:#000;margin:30px;padding:10px" class="center">
		<h2>¿ Olvidaste tu password ?</h2>
		<p>Pon tu correo electrónico de contacto y te enviaremos un enlace para reestablecerla</p>
			<?php
			echo $this->Form->create('User', array(
			    'url' => array(
			        'controller' => 'users',
			        'action' => 'forgotPassword'
			    )
			));
			echo $this->Form->input('User.email',array('class' => 'form-control form-input','label' => 'Correo electrónico'));
			echo '<br />';
			echo $this->Form->input('User.id',array('type' => 'hidden'));
			$options = array(
			    		'label' => 'Restablecer contraseña',
			    		'class' => 'btn green-sharp btn-outline  btn-block sbold uppercase ',
			    		'type' => 'submit'
					);
			echo $this->Form->end($options);?>
		</div>
		<div class="col-md-4">&nbsp;</div>
	</div>
</div>