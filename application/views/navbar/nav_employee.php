<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li class="<?php if ($page == 'homeview') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="<?php if ($page == 'profileview' || $page == 'updateprofileview') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>employee/profile">Profile</a></li>
        <li class="<?php if ($page == 'uploadassignmentview') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>employee/uploadassignment">Upload Assignment</a></li>
        <li class="<?php if ($page == 'downloadpayrollview') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>employee/downloadpayroll">Download Payroll</a></li>
        <li><a href="<?php echo base_url(); ?>users/do_logout">Logout</a></li>
    </ul>
</div><!-- /.navbar-collapse -->