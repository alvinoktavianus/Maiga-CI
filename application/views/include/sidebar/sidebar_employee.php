<div class="sidebar-container">
    <div class="sidebar-header">
        <div class="brand">
            <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Maiga </div>
    </div>
    <nav class="menu">
        <ul class="nav metismenu" id="sidebar-menu">
            <li class="<?php if ($page == 'homeview') { echo "active"; } ?>">
                <a href="<?php echo base_url(); ?>employee"> <i class="fa fa-home"></i> Dashboard </a>
            </li>
            <li class="<?php if ($page == 'uploadassignmentview') { echo "active"; } ?>">
                <a href="<?php echo base_url(); ?>employee/uploadassignment"> <i class="fa fa-inbox" aria-hidden="true"></i> Upload Assignment </a>
            </li>
            <li class="<?php if ($page == 'downloadpayrollview') { echo "active"; } ?>">
                <a href="<?php echo base_url(); ?>employee/downloadpayroll"> <i class="fa fa-check-square-o" aria-hidden="true"></i> Download payroll</a>
            </li>
        </ul>
    </nav>
</div>