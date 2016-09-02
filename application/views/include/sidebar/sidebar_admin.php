<div class="sidebar-container">
    <div class="sidebar-header">
        <div class="brand">
            <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Maiga </div>
    </div>
    <nav class="menu">
        <ul class="nav metismenu" id="sidebar-menu">
            <li class="<?php if ($page == 'homeview') { echo "active"; } ?>">
                <a href="<?php echo base_url(); ?>admin"> <i class="fa fa-home"></i> Home </a>
            </li>
            <li class="<?php if ( $page == 'registerview' || $page == 'employeelistview' || $page == 'updateemployee' ) { echo "active open"; } ?>">
                <a href=""> <i class="fa fa-credit-card" aria-hidden="true"></i> Employee <i class="fa arrow"></i> </a>
                <ul>
                    <li class="<?php if ($page == 'registerview') { echo "active"; } ?>"> <a href="<?php echo base_url(); ?>admin/register">
                Register Employee
            </a> </li>
                    <li class="<?php if ($page == 'employeelistview' || $page == 'updateemployee') { echo "active"; } ?>"> <a href="<?php echo base_url(); ?>admin/employeelist">
                Employee List
            </a> </li>
                </ul>
            </li>
            <li class="<?php if ($page == 'checkassignmentview' || $page == 'checkassignmentsview') { echo "active"; } ?>">
                <a href="<?php echo base_url(); ?>admin/checkassignment"> <i class="fa fa-inbox" aria-hidden="true"></i> Check Assignment </a>
            </li>
            <li class="<?php if ($page == 'uploadpayrollview') { echo "active"; } ?>">
                <a href="<?php echo base_url(); ?>admin/uploadpayroll"> <i class="fa fa-check-square-o" aria-hidden="true"></i> Upload payroll</a>
            </li>
        </ul>
    </nav>
</div>