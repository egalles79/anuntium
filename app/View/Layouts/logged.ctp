<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Api Hiit4All');
$cakeVersion = __d('cake_dev', 'Hiit4All %s', Configure::version())
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Hiit4All | Main Page</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
        <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo SERVER;?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo SERVER;?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet">
        
        <link href="<?php echo SERVER;?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo SERVER;?>assets/global/plugins/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
        
        <link href="<?php echo SERVER;?>assets/global/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN THEME GLOBAL STYLES -->
        <!--<link href="<?php echo SERVER;?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />-->

        <link href="<?php echo SERVER;?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo SERVER;?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo SERVER;?>assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo SERVER;?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?php echo SERVER;?>favicon.ico" /> </head>
    <!-- END HEAD -->
<meta charset="utf-8"/>
<title>Metronic | Admin Dashboard Template</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="<?php echo SERVER;?>css/magnific-popup.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>-->

<link href="<?php echo SERVER;?>assets/pages/css/pricing.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo SERVER;?>assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
<script src="<?php echo SERVER;?>assets/global/plugins/icheck/icheck.min.js"></script>
<script src="<?php echo SERVER;?>js/jquery.magnific-popup.min.js"></script>

<script src="<?php echo SERVER;?>js/jquery.magnific-popup.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.2/css/bootstrap2/bootstrap-switch.css" />


<?php 
echo $this->Html->meta('icon');
echo $this->Html->script(array('moment.min','bootstrap-datepicker.min'));
echo $this->Html->css(array('simple-line-icons.min','uniform.default','daterangepicker-bs3','fullcalendar','jqvmap','components','plugins','layout','default','custom'));

echo $this->fetch('css');
echo $this->fetch('script');
?>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<!--<link href="../assets/global/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>-->
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<!-- <link href="../../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>-->
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo SERVER;?>css/default.css" rel="stylesheet" type="text/css" id="style_color"/>


<!-- END THEME STYLES -->
</head>
<!-- END HEAD -->
<body>
<?php echo $this->element('header-logged');?>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<?php echo $this->element('sidebar'); ?>
 <!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <?php 
	  $render = $this->Flash->render();
	  echo $this->element('body-content-logged',array('content' => $this->fetch('content'),'flash_message' => $render,'user' => $user));?>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<?php echo $this->element('quick-sidebar'); 
echo $this->element('footer');
echo $this->element('javascripts');?>

</body>
</html>
