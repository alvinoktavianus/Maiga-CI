<h2 class="text-center">Update Profile</h2>

<?php echo form_open(base_url().'employee/do_updateprofile', array( 'novalidate' => true )); ?>
<br><br>
<div class="row">
    
    <div class="col-md-6 col-md-offset-3">
        
        <?php if ($this->session->flashdata('errors')): ?>
            <div class="alert alert-danger" role="alert">
                <strong><?php echo $this->session->flashdata('errors'); ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-group row">
            <?php echo form_label('Nama Karyawan', 'nama', array( 'class' => 'form-control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('nama', $employee->nama, array( 'class' => 'form-control', 'id' => 'nama', 'autofocus' => true )); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo form_label('Password', 'password', array( 'class' => 'form-control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php echo form_password('password', '', array( 'class' => 'form-control', 'id' => 'password' )); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo form_label('Ulangi Password', 'conf-pass', array( 'class' => 'form-control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php echo form_password('conf-pass', '', array( 'class' => 'form-control', 'id' => 'conf-pass' )); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo form_label('Tempat Lahir', 'tempatlahir', array( 'class' => 'form-control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('tempatlahir', $employee->tempatlahir, array( 'class' => 'form-control', 'id' => 'tempatlahir' )); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo form_label('Tanggal Lahir', 'tanggallahir', array( 'class' => 'form-control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('tanggallahir', $employee->tanggallahir, array( 'class' => 'form-control datepicker', 'id' => 'tanggallahir' )); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo form_label('No. HP', 'mobile', array( 'class' => 'form-control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php echo form_input( array( 'type' => 'tel', 'value' => $employee->mobile, 'class' => 'form-control', 'id' => 'mobile', 'name' => 'mobile' ) ); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo form_label('Nama Bank', 'namabank', array( 'class' => 'form-control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('namabank', $employee->namabank, array( 'class' => 'form-control', 'id' => 'namabank' )); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo form_label('No. Rekening', 'norekening', array( 'class' => 'form-control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php echo form_input( array( 'type' => 'number', 'id' => 'norekening', 'name' => 'norekening', 'value' => $employee->norekening, 'class' => 'form-control' ) ); ?>
            </div>
        </div>

        <div class="form-group row">
            <p style="text-align: center;">
                <?php echo form_submit('update', 'Update', array( 'class' => 'btn btn-success' )); ?>
            </p>
        </div>

    </div>

</div>
<?php echo form_close(); ?>