<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendor.css">
    <title><?php echo $page_title; ?></title>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                Maiga
                <!-- <img alt="Brand" src="{{asset('/logo.png')}}" class="img-responsive" style="margin: 0; height: 40px; margin-top: -10px;"> -->
            </a>
        </div>

        <?php
            switch ($this->session->userdata('user_session')['role']) {
                case 'adm':
                    $this->load->view('navbar/nav_admin');
                    break;
                case 'mgr':
                    $this->load->view('navbar/nav_manager');
                    break;
                case 'emp':
                    $this->load->view('navbar/nav_employee');
                    break;
            }
        ?>

    </div><!-- /.container-fluid -->
</nav>

<div class="container">
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
                    }
                    break;

            }
        }
    ?>
</div>

<script src="<?php echo base_url(); ?>assets/js/vendor.js"></script>
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
<script type="text/javascript">
    $(function() {
        $( "input.datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>
</body>
</html>