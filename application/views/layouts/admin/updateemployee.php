<h2 class="text-center">Update <strong><?php echo $profile->email; ?></strong></h2>

<?php echo form_open(base_url().'admin/do_update_employee?email='.$profile->email); ?>

<?php var_dump($profile); ?>

<?php echo form_close(); ?>