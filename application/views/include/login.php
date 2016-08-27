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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style-signin.css">
    <title>Login | Maiga</title>
</head>
<body>

<div class="container">
    <?php if ($this->session->flashdata('errors')): ?>
        <div class="alert alert-danger" role="alert">
            <strong><?php echo $this->session->flashdata('errors'); ?></strong>
        </div>
    <?php endif; ?>
    <?php echo form_open(base_url().'users/do_login', array( 'class' => 'form-signin' )); ?>
    <h2 class="form-signin-heading">Please sign in</h2>
    <?php echo form_label('Email Address', 'inputEmail', array( 'class' => 'sr-only' )); ?>
    <?php echo form_input(array( 'id' => 'inputEmail', 'name' => 'inputEmail', 'type' => 'email', 'class' => 'form-control', 'required' => true, 'autofocus' => 'true', 'maxlength' => 50, 'placeholder' => 'Email address' )); ?>
    <?php echo form_label('Password', 'inputPassword', array( 'class' => 'sr-only' )); ?>
    <?php echo form_password('inputPassword', '', array( 'class' => 'form-control', 'required' => true, 'id' => 'inputPassword', 'maxlength' => 50, 'placeholder' => 'Password'  )); ?>
    <?php echo form_submit('inputSubmit', 'Sign In', array('class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
</div>

<script src="<?php echo base_url(); ?>assets/js/vendor.js"></script>
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
</body>
</html>