<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="javascript:void(0);"><img src="<?php echo base_url('assets/images/icon/logo.png');?>" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">

                        <?php

                        $headers = $this->module->get_menu_header();

                        foreach ($headers as $header) {
                            $name = $header->moduleName;
                            $path = $header->modulePath;
                            $icon = $header->icon;
                            $hasSubMenu = $header->hasSubMenu;

                            if ($hasSubMenu) { ?>
                                <li class="<?php echo $nav['menu'] == $path ? 'active' : '' ?>">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span><?php echo $name; ?></span></a>
                                    <?php
                                    $subHeaders = $this->module->get_submenu_header($header->firstLvl);
                                    foreach ($subHeaders as $sub) { 
                                        $subName = $sub->moduleName;
                                        $subPath = $sub->modulePath; ?>

                                        <ul class="collapse">
                                            <li><a href="<?php echo base_url($subPath); ?>"><?php echo $subName; ?></a></li>
                                        </ul>
                                    <?php
                                    }
                                    ?>
                                </li>
                            <?php
                            } else { ?>
                                <li class="<?php echo $nav['menu'] == $path ? 'active' : '' ?>">
                                    <a href="<?php echo base_url($path); ?>">
                                        <i class="<?php echo $icon; ?>"></i>
                                        <span><?php echo $name; ?></span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        <?php
                        } 
                        ?>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        