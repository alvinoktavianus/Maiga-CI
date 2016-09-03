
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> <?php echo $page_title; ?> </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vendor.css">
        <!-- Theme initialization -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app-green.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css">
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app sidebar-fixed header-fixed" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
                <i class="fa fa-bars"></i>
            </button> </div>
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php $profilepic = base_url().'uploads/profilepics/'.$this->session->userdata('user_session')['profilepic'];  ?>
                                    <div class="img" style="background-image: url('<?php echo $profilepic; ?>')"> </div> <span class="name"> <?php echo $this->session->userdata('user_session')['email']; ?> </span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>users/editprofile"> <i class="fa fa-user icon"></i> Profile </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>users/do_logout"> <i class="fa fa-power-off icon"></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>

                <aside class="sidebar">
                    <?php
                        switch ($this->session->userdata('user_session')['role']) {
                            case 'adm':
                                $this->load->view('include/sidebar/sidebar_admin');
                                break;
                            case 'mgr':
                                $this->load->view('include/sidebar/sidebar_manager');
                                break;
                            case 'emp':
                                $this->load->view('include/sidebar/sidebar_employee');
                                break;
                        }
                    ?>
                </aside>

                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                
    <?php
        if ($this->session->userdata('user_session')['isloggedin']) {
            switch ($this->session->userdata('user_session')['role']) {

                case 'adm':
                    switch ($page) {
                        case 'homeview':
                            $this->load->view('layouts/admin/home');
                            break;
                        case 'registerview':
                            $this->load->view('layouts/admin/register');
                            break;
                        case 'employeelistview':
                            $this->load->view('layouts/admin/employeelist');
                            break;
                        case 'checkassignmentview':
                            $this->load->view('layouts/admin/checkassignment');
                            break;
                        case 'checkassignmentsview':
                            $this->load->view('layouts/admin/checkassignments');
                            break;
                        case 'uploadpayrollview':
                            $this->load->view('layouts/admin/uploadpayroll');
                            break;
                        case 'updateemployee':
                            $this->load->view('layouts/admin/updateemployee');
                            break;
                        case 'editprofileview':
                            $this->load->view('include/editprofile');
                            break;
                    }
                    break;
                case 'mgr':
                    switch ($page) {
                        case 'homeview':
                            $this->load->view('layouts/manager/home');
                            break;
                        case 'createassignmentview':
                            $this->load->view('layouts/manager/createassignment');
                            break;
                        case 'checkassignmentview':
                            $this->load->view('layouts/manager/checkassignment');
                            break;
                        case 'checkassignmentsview':
                            $this->load->view('layouts/manager/checkassignments');
                            break;
                        case 'editprofileview':
                            $this->load->view('include/editprofile');
                            break;
                    }
                    break;
                case 'emp':
                    switch ($page) {
                        case 'homeview':
                            $this->load->view('layouts/employee/home');
                            break;
                        case 'profileview':
                            $this->load->view('layouts/employee/profile');
                            break;
                        case 'uploadassignmentview':
                            $this->load->view('layouts/employee/uploadassignment');
                            break;
                        case 'downloadpayrollview':
                            $this->load->view('layouts/employee/downloadpayroll');
                            break;
                        case 'updateprofileview':
                            $this->load->view('layouts/employee/updateprofile');
                            break;
                        case 'editprofileview':
                            $this->load->view('include/editprofile');
                            break;
                    }
                    break;

            }
        }
    ?>

            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/js/vendor.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $( "input.datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' })
            });
        </script>
    </body>

</html>

