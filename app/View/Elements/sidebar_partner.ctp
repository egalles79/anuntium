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
            <?php $parts = explode('/',$_SERVER['REQUEST_URI']); $minipart  = false; if (isset($parts[2])) { $minipart = $parts[2];} ?>
            <li class="nav-item start " style="margin-top:35px">
                <a href="<?php echo SERVER;?>Partners/indexpartner" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Inicio</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="heading">
                <li class="nav-item <?php if ($parts[2] != 'promote') echo 'active';?> uppercase">
                <a href="<?php echo SERVER;?>Partners/indexpartner" class="nav-link nav-toggle">MENÚ INICIAL</a>
                </li>
            </li>
            <li class="heading">
                <li class="nav-item <?php if ($parts[2] == 'promote') echo 'active';?> uppercase">
                <a href="<?php echo SERVER;?>Partners/promote" class="nav-link nav-toggle">PROMOCIONAR</a>
                </li>
            </li>
            
            <!--<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/Hiit4All/ImagesUsers/add' || $_SERVER['REQUEST_URI'] == '/Hiit4All/ImagesUsers') { echo 'active open';}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-camera"></i>
                    <span class="title">Images Users</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/Hiit4All/ImagesUsers') { echo 'active';}?>">
                        <a href="/Hiit4All/ImagesUsers" class="nav-link">
                            <span class="title">List</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/Hiit4All/ImagesUsers/add') { echo 'active';}?>">
                        <a href="/Hiit4All/ImagesUsers/add" class="nav-link ">
                            <span class="title">Add</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/Hiit4All/Advices/add' || $_SERVER['REQUEST_URI'] == '/Hiit4All/Advices') { echo 'active open';}?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Advices</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/Hiit4All/Advices') { echo 'active';}?>">
                        <a href="/Hiit4All/Advices" class="nav-link">
                            <span class="title">List</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/Hiit4All/Advices/add') { echo 'active';}?>">
                        <a href="/Hiit4All/Advices/add" class="nav-link ">
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