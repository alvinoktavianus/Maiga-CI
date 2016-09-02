<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li class="<?php if ($page == 'homeview') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin">Home</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Employee <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li class="<?php if ($page == 'registerview') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/register">Register Employee</a></li>
                <li class="<?php if ($page == 'employeelistview' || $page == 'updateemployee') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/employeelist">Employee List</a></li>
            </ul>
        </li>
        <li class="<?php if ($page == 'checkassignmentview' || $page == 'checkassignmentsview') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/checkassignment">Check Assignment</a></li>
        <li class="<?php if ($page == 'uploadpayrollview') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/uploadpayroll">Upload payroll</a></li>
        <li><a href="<?php echo base_url(); ?>users/do_logout">Logout</a></li>
    </ul>
</div><!-- /.navbar-collapse -->