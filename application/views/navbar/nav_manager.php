<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li class="<?php if ($page == 'homeview') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>manager">Home</a></li>
        <li class="<?php if ($page == 'createassignmentview') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>manager/createassignment">Create Assignment</a></li>
        <li class="<?php if ($page == 'checkassignmentview') { echo "active"; } ?>"><a href="<?php echo base_url(); ?>manager/checkassignment">Check Assignment</a></li>
        <li><a href="<?php echo base_url(); ?>users/do_logout">Logout</a></li>
    </ul>
</div><!-- /.navbar-collapse -->