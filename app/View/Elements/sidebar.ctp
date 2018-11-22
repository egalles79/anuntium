<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"> </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <?php $parts = explode('/',$_SERVER['REQUEST_URI']); $minipart  = false; if (isset($parts[3])) { $minipart = $parts[3];} ?>
            <li class="nav-item start " style="margin-top:35px">
                <a href="<?php echo SERVER;?>Programs/index" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Inicio</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">MENÚ INICIAL</h3>
            </li>

            <li class="nav-item <?php if (strtoupper($parts[1]) == 'PROGRAMS')  { echo 'active open';}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-cog"></i>
                    <span class="title">Programas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if  (strtoupper($minipart) == 'INDEX')  { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Programs/index" class="nav-link">
                            <span class="title">Listado</span>
                        </a>
                    </li>
                    <!--<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Programs/add') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Programs/add" class="nav-link ">
                            <span class="title">Añadir</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Programs/assignToUser') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Programs/assignToUser" class="nav-link ">
                            <span class="title">Asignar programa a usuario</span>
                        </a>
                    </li> -->
                    <li class="nav-item <?php if  (strtoupper($minipart) == 'IMAGEBANK')  { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Programs/imageBank" class="nav-link ">
                            <span class="title">Imágenes</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Trainings/add' || $_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Trainings') { echo 'active open';}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-road"></i>
                    <span class="title">Trainings</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Trainings') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Trainings" class="nav-link">
                            <span class="title">List</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Trainings/add') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Trainings/add" class="nav-link ">
                            <span class="title">Add</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Levels/add' || $_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Levels') { echo 'active open';}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-line-chart"></i>
                    <span class="title">Levels</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Levels') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Levels" class="nav-link">
                            <span class="title">List</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Levels/add') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Levels/add" class="nav-link ">
                            <span class="title">Add</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Rewards/add' || $_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Rewards') { echo 'active open';}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Rewards</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Rewards') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Rewards" class="nav-link">
                            <span class="title">List</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Rewards/add') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Rewards/add" class="nav-link ">
                            <span class="title">Add</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item <?php if ((strtoupper($parts[1]) == 'EXERCISES')) { echo 'active open';}?>">
                <a href="<?php echo SERVER;?>Exercises" class="nav-link nav-toggle">
                    <i class="fa fa-video-camera"></i>
                    <span class="title">Ejercicios</span>
                </a>
            </li>

            <li class="nav-item <?php if ((strtoupper($parts[1]) == 'USERS'))  { echo 'active open';}?>">
                <a href="<?php echo SERVER;?>Users" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">Usuarios</span>
                </a>
            </li>            
            <li class="nav-item <?php if (strtoupper($parts[1]) == 'COMPANIES')  { echo 'active open';}?>">
                <a href="<?php echo SERVER;?>Companies" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Empresas</span>
                </a>
            </li>
            <li class="nav-item <?php if (strtoupper($parts[1]) == 'CLIENTS')  { echo 'active open';}?>">
                <a href="<?php echo SERVER;?>Clients" class="nav-link nav-toggle">
                    <i class="fa fa-male"></i>
                    <span class="title">Clientes</span>
                </a>
            </li>
            <li class="nav-item <?php if (strtoupper($parts[1]) == 'PAYMENTS')  { echo 'active open';}?>">
                <a href="<?php echo SERVER;?>Payments" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Pagos</span>
                </a>
            </li>
            <li class="nav-item <?php if (strtoupper($parts[1]) == 'PARTNERS')  { echo 'active open';}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Partners</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if  (strtoupper($minipart) == 'INDEX')  { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Partners/index" class="nav-link">
                            <span class="title">Listado</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if  (strtoupper($minipart) == 'INDEXPARTNER')  { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Partners/indexpartner" class="nav-link ">
                            <span class="title">Facturación</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php if (strtoupper($parts[1]) == 'PROMOTIONCODES') { echo 'active open';}?>">
                <a href="<?php echo SERVER;?>PromotionCodes" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-tags"></i>
                    <span class="title">Códigos promocionales</span>
                </a>
            </li>
            <li class="nav-item <?php if (strtoupper($parts[1]) == 'BONUSES') { echo 'active open';}?>">
                <a href="<?php echo SERVER;?>Bonuses" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-info-sign"></i>
                    <span class="title">Tipo de pago</span>
                </a>
            </li>
            
            
            <!--<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>ImagesUsers/add' || $_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>ImagesUsers') { echo 'active open';}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-camera"></i>
                    <span class="title">Images Users</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>ImagesUsers') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>ImagesUsers" class="nav-link">
                            <span class="title">List</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>ImagesUsers/add') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>ImagesUsers/add" class="nav-link ">
                            <span class="title">Add</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Advices/add' || $_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Advices') { echo 'active open';}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Advices</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Advices') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Advices" class="nav-link">
                            <span class="title">List</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '<?php echo SERVER;?>Advices/add') { echo 'active';}?>">
                        <a href="<?php echo SERVER;?>Advices/add" class="nav-link ">
                            <span class="title">Add</span>
                        </a>
                    </li>
                </ul>
            </li>-->
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->