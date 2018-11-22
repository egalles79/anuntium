<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
$options = array(
	'label' => 'Login',
	'class' => 'success hidden',
	'type' => 'submit'
);
?>
<div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 login-container bs-reset">
            <?php echo $this->Html->image('login/login-invert.png',array('class' => 'login-logo login-6'));?>
            <div class="login-content">
                <h1>Anuntium</h1>
                <?php
					echo $this->Form->create('User', array(
					    'url' => array(
					        'controller' => 'users',
					        'action' => 'login'
					    ),
					    'class' => 'login-form'
					));
				?>
                    <div class="alert alert-danger display-hide">
                        <button data-close="alert" class="close"></button>
                        
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                        	<?php 
                        		echo $this->Form->input('User.username', array( 
                        				'label' => false,
                        				'placeholder' => 'Correu electrònic',
                        				'required' => '',
                        				'class' => 'form-control form-control-solid placeholder-no-fix form-group')
                        		); 
                        	?>
                        </div>
                        <div class="col-xs-6">
                        	<?php 
                        		echo $this->Form->input('User.password', array( 
                        				'label' => false,
                        				'placeholder' => 'Contrassenya',
                        				'required' => '',
                        				'class' => 'form-control form-control-solid placeholder-no-fix form-group')
                        		); 
                        	?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="rememberme mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" value="1" name="remember"> Recordar 
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-8 text-right">
                            <button type="submit" class="btn btn-info">Accedir</button>
                        </div>
                    </div>
                <?php echo $this->Form->end($options);?>
                <!-- BEGIN FORGOT PASSWORD FORM -->
                <form method="post" action="javascript:;" class="forget-form" style="display: none;">
                    <h3>Has olvidado tu contraseña ?</h3>
                    <p> Entri el seu correu electrònic i resetegi la seva contrassenya</p>
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix"> </div>
                    <div class="form-actions">
                        <button class="btn blue btn-outline" id="back-btn" type="button">Enrere</button>
                        <button class="btn blue uppercase pull-right" type="submit">Enviar</button>
                    </div>
                </form>
                <!-- END FORGOT PASSWORD FORM -->
            </div>
            <div class="login-footer">
                <div class="row bs-reset">
                    <div class="col-xs-5 bs-reset">
                        <ul class="login-social">
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-social-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-7 bs-reset">
                        <div class="login-copyright text-right">
                            
                           <!--<p>
                                <?php echo $this->Html->link('API Documentation',array('controller' => 'Pages', 'action'=>'display','home'));?> | <?php echo date('Y'); ?> &copy; Powered by Doonamis
                            </p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 bs-reset">
            <div class="login-bg" style="position: relative; z-index: 0; background: transparent none repeat scroll 0% 0%;"> <div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 884px; width: 960px; z-index: -999998; position: absolute;">
            <?php echo $this->Html->image('login/bg3.jpg',array('style' => 'position: absolute; margin: 0px; padding: 0px; border: medium none; width: 982.222px; height: 884px; max-height: none; max-width: none; z-index: -999999; left: -11.1111px; top: 0px;'));?>
        </div>
    </div>
</div>
