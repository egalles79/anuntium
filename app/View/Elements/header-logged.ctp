<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo SERVER;?>">
                <img src="<?php echo SERVER;?>assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler"> </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <?php 
            $action = SERVER."Exercises/index";
            if ($user['group_id'] == 1) {
        ?>
        <form class="search-form" action="<?php echo $action ?>" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar ejercicios..." name="query">
                <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i>
                    </a>
                </span>
            </div>
        </form>
        <?php
        }
        if (isset($quitarfiltro)) {
            if ($quitarfiltro) {
                echo '<div style="float:left;margin-top:10px;margin-left:5px">'.$this->Html->link('      Eliminar filtro',array('action' => 'index'),array('style' => 'margin-top:2px;color:#ccc;text-decoration:none')).'</div>';
            }
        }
        ?>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <?php 
                        $id = (empty($user['id'])) ? $user['User']['id'] : $user['id'];
                        if (!empty($user['User'])) {
                            $avatar =  $user['User']['avatar'];
                        } else {
                            $avatar = $user['avatar'];
                        }
                        
                        $image = (!empty($avatar)) ? 'http://media.hiit4all.com/users/'.$id.'/'.$avatar : SERVER.'assets/layouts/layout/img/avatar3_small.jpg';?>
                        <img alt="" class="img-circle" src="<?php echo $image;?>" />
                        <span class="username username-hide-on-mobile">
                         <?php
                          $name = (empty($user['name'])) ? $user['User']['name'] : $user['name'];
                            echo $name;
                            ?> 
                         </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?php echo SERVER;?>Users/logout">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <!--<li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li> -->
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>