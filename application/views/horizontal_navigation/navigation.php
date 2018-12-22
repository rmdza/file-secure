        <!-- header area start -->
        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <?php

                                    $headers = $this->module->get_menu_header();

                                    foreach ($headers as $header) {
                                        $name = $header->moduleName;
                                        $path = $header->modulePath;
                                        $icon = $header->icon;
                                        $hasSubMenu = $header->hasSubMenu;

                                        if ($hasSubMenu) { ?>
                                            <li>
                                                <a href="<?php echo base_url($path); ?>">
                                                    <i class="<?php echo $icon; ?>"></i><span><?php echo $name; ?></span>
                                                </a>
                                                <?php
                                                $subHeaders = $this->module->get_submenu_header($header->firstLvl);
                                                foreach ($subHeaders as $sub) { 
                                                    $subName = $sub->moduleName;
                                                    $subPath = $sub->modulePath; ?>

                                                    <ul class="submenu">
                                                        <li><a href="<?php echo base_url($subPath); ?>"><?php echo $subName; ?></a></li>
                                                    </ul>
                                                <?php
                                                }
                                                ?>
                                            </li>
                                        <?php
                                        } else { ?>
                                            <li>
                                                <a href="<?php echo base_url($path); ?>">
                                                    <i class="<?php echo $icon; ?>"></i><span><?php echo $name; ?></span>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    } 
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- nav and search button -->
                    <div class="col-lg-3 clearfix">
                        <div class="search-box">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->

