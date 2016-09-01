<h2 class="text-center">Update <strong><?php echo $profile->email; ?></strong></h2>

<br><br>

<?php echo form_open(base_url().'admin/do_update_employee?email='.$profile->email, array( 'class' => 'form-horizontal', 'novalidate' => true )); ?>

<div class="row">

    <div class="col-md-6 col-md-offset-3">

        <div class="form-group">
            <?php echo form_label('Selesai Bekerja', 'endwork', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('endwork', '', array( 'class' => 'form-control datepicker', 'id' => 'endwork', 'required' => true, 'placeholder' => 'Masukan Tanggal Selesai Bekerja (yyyy-mm-dd)' )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Jabatan', 'position', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('position', $profile->jabatan, array( 'class' => 'form-control', 'id' => 'position', 'placeholder' => 'Masukan Jabatan', 'required' => true )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Departemen', 'department', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('department', $profile->department, array( 'class' => 'form-control', 'required' => true, 'maxlength' => 50, 'placeholder' => 'Masukan Departemen', 'id' => 'department' )); ?>
            </div>
        </div>

        <div class="form-group">
            <p class="text-center">
                <?php echo form_submit('update', 'Update', array( 'class' => 'btn btn-success' )); ?>
            </p>
        </div>

    </div>

</div>

<?php echo form_close(); ?>