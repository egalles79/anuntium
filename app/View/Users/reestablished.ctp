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
                <h1>Contraseña reestablecida correctamente</h1>
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
            <?php echo $this->Html->image('login/bg1.jpg',array('style' => 'position: absolute; margin: 0px; padding: 0px; border: medium none; width: 982.222px; height: 884px; max-height: none; max-width: none; z-index: -999999; left: -11.1111px; top: 0px;'));?>
        </div>
    </div>
</div>
