

<body class="fixed-sn white-skin" onload="<?php 
                                    if (isset($delbatch)) {
                                        echo $delbatch;
                                    }elseif (isset($batchInsert)) {
                                        echo $batchInsert;
                                    }elseif (isset($delcourse)) {
                                        echo $delcourse;
                                    }elseif (isset($courseInsert)) {
                                        echo $courseInsert;
                                    }elseif (isset($user_auth_add)) {
                                        echo $user_auth_add;
                                    }elseif (isset($deluser)) {
                                        echo $deluser;
                                    }elseif (isset($delequipment)) {
                                        echo $delequipment;
                                    }elseif (isset($equipmentInsert)) {
                                        echo $equipmentInsert;
                                    }elseif (isset($delequipmentAssign)) {
                                        echo $delequipmentAssign;
                                    }elseif (isset($eqipmentAsign)) {
                                        echo $eqipmentAsign;
                                    }

                                    elseif (isset($delmarketer)) {
                                        echo $delmarketer;
                                    }elseif (isset($changeStatus)) {
                                        echo $changeStatus;
                                    }

                                    elseif (isset($del_sub_marketer)) {
                                        echo $del_sub_marketer;
                                    }elseif (isset($changeStatus_for_sub_marketer)) {
                                        echo $changeStatus_for_sub_marketer;
                                    }

                                    elseif (isset($Number_Insert)) {
                                        echo $Number_Insert;
                                    }elseif (isset($delPhone_number)) {
                                        echo $delPhone_number;
                                    }

                                    elseif (isset($notice_add)) {
                                        echo $notice_add;
                                    }elseif (isset($notice_del)) {
                                        echo $notice_del;
                                    }

                                ?>">


    <!--Main Navigation-->
    
    <header>
    
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed">
            <ul class="custom-scrollbar">
            <!-- Logo -->
            <li class=" logo-wrapper logo-sn waves-effect">
                <div class="text-center">
                    <a href="index.php" class="pl-0"><img src="assets/img/logo_png/16x16.png" class="logo"><br><b>FEEDBACK</b></a>
                </div>
            </li>
            <!--/. Logo -->

            <!-- Side navigation links -->
            <li style="margin-top: 10px;">
                <ul class="collapsible collapsible-accordion">
                    <li><a href="index.php" class="collapsible-header waves-effect"><i class="fa fa-home"></i> DASHBOARD</a></li>

                    <li><a href="user_auth_all.php" class="collapsible-header waves-effect"><i class="fa fa-user"></i> USER</a></li>

                    <li><a href="course_all.php" class="collapsible-header waves-effect"><i class="fa fa-book"></i> COURSE</a></li>                    

                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-list"></i> BATCH<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="batch_all.php" class="waves-effect">Batch</a>
                                </li>
                                <li><a href="batch_assign_student.php" class="waves-effect">Assign Student</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    

                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-sitemap"></i> EQUIPMENT<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="equipment_all.php" class="waves-effect">Equipment</a>
                                </li>
                                <li><a href="equipment_assign_all.php" class="waves-effect">Assign Equipment</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-user-secret"></i> MARKETER<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="marketer_main_list.php" class="waves-effect">Main Marketer List</a>
                                </li>
                                <li><a href="marketer_sub_list.php" class="waves-effect">Sub Marketer List</a>
                                </li>
                                <li><a href="marketer_sub_assign.php" class="waves-effect">Sub Marketer Assign</a>
                                </li>
                                <li><a href="phone_no_all.php" class="waves-effect">Phone Number</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-bell"></i> NOTICE<i class="fa fa-angle-down rotate-icon"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="notice_all.php" class="waves-effect">All Notice</a>
                                </li>                            
                            </ul>
                        </div>
                    </li>

                </ul>
            </li>
            <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav" style="line-height: 1 !important">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse black-text" data-toggle="tooltip" data-placement="bottom" title="MENU"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p><a href="index.php" data-toggle="tooltip" data-placement="right" title="Home Page" style="color: #ff9800; font-size: 23px;"><img src="assets/img/logo_png/16x16.png" class="logo"><b>FEEDBACK</b></a></p>
            </div>

            <!--Navbar links-->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

                <!-- Dropdown -->
                <!-- <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="badge red">3</span> <i class="fa fa-bell"></i>
                        <span class="d-none d-md-inline-block"></span>
                    </a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-money mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="fa fa-clock-o" aria-hidden="true"></i> 13 min</span>
                        </a>
                    </div>
                </li> -->
                
                <li class="nav-item dropdown">
                    <a href="#" class="chip nav-link dropdown-toggle waves-effect" data-toggle="dropdown" style="font-size: 13px; color: #9e9e9e" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/img/profile.jpg" alt="Contact Person"> 
                        <?php echo Session::get('user_auth_full_name') ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <?php
                            $id = Session::get('user_auth_id');
                        ?>
                        <a class="dropdown-item" href="profile.php?id=<?php echo $id ?>"> <i class="fa fa-sign-out mr-4"></i> Your Profile</a>
                        <a class="dropdown-item" href="?action=logout" onclick="return confirm('Are You Sure?')"> <i class="fa fa-sign-out mr-4"></i> Sign Out</a>
                    </div>
                </li>

            </ul>
            <!--/Navbar links-->
        </nav>
        <!-- /.Navbar -->

    </header>
    
    <!--Main Navigation-->