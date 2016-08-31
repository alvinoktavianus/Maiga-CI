<h2 class="text-center">Register</h2>

<?php echo form_open_multipart(base_url().'admin/do_register', array( 'class' => 'form-horizontal', 'novalidate' => true )); ?>

<br><br>

<div class="row">

    <div class="col-md-6 col-md-offset-3">

        <?php if ($this->session->flashdata('errors')): ?>
            <div class="alert alert-danger" role="alert">
                <strong><?php echo $this->session->flashdata('errors'); ?></strong>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <?php echo form_label('Email', 'email', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input(array( 'class' => 'form-control', 'id' => 'email', 'name' => 'email', 'maxlength' => 255, 'required' => true, 'autofocus' => true, 'type' => 'email', 'placeholder' => 'Masukan alamat email', 'value' => $this->session->flashdata('email') )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Nama Lengkap', 'name', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('name', $this->session->flashdata('name'), array( 'class' => 'form-control', 'id' => 'name', 'maxlength' => 255, 'required' => true, 'placeholder' => 'Masukan Nama Lengkap' )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Password', 'password', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_password('password', $this->session->flashdata('password'), array( 'class' => 'form-control', 'id' => 'password', 'required' => true, 'placeholder' => 'Masukan Password' )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Ulangi Password', 'conf-pass', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_password('conf-pass', $this->session->flashdata('conf-pass'), array( 'class' => 'form-control', 'id' => 'conf-pass', 'required' => true, 'placeholder' => 'Ulangi Password' )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Tempat Lahir', 'lob', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('lob', $this->session->flashdata('lob'), array( 'class' => 'form-control', 'id' => 'lob', 'placeholder' => 'Masukan Tempat Lahir', 'required' => true )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Tanggal Lahir', 'dob', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('dob', $this->session->flashdata('dob'), array( 'class' => 'form-control datepicker', 'required' => true, 'placeholder' => 'Masukan Tanggal Lahir (yyyy-mm-dd)', 'id' => 'dob' )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('No. HP', 'mobile', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input(array( 'class' => 'form-control', 'placeholder' => 'Masukan No. HP.', 'id' => 'mobile', 'name' => 'mobile', 'type' => 'tel', 'required' => true, 'value' => $this->session->flashdata('mobile') )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Jabatan', 'position', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('position', $this->session->flashdata('position'), array( 'class' => 'form-control', 'id' => 'position', 'placeholder' => 'Masukan Jabatan', 'required' => true )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Departemen', 'department', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('department', $this->session->flashdata('department'), array( 'class' => 'form-control', 'required' => true, 'maxlength' => 50, 'placeholder' => 'Masukan Departemen', 'id' => 'department' )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Mulai Bekerja', 'startwork', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('startwork', $this->session->flashdata('startwork'), array( 'class' => 'form-control datepicker', 'required' => true, 'placeholder' => 'Masukan Tanggal Mulai Bekerja (yyyy-mm-dd)', 'id' => 'startwork' )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Selesai Bekerja', 'endwork', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('endwork', $this->session->flashdata('endwork'), array( 'class' => 'form-control datepicker', 'placeholder' => 'Masukan Tanggal Selesai Bekerja (yyyy-mm-dd)', 'id' => 'endwork' )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Nama Bank Karyawan', 'bankaccountname', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('bankaccountname', $this->session->flashdata('bankaccountname'), array( 'class' => 'form-control', 'id' => 'bankaccountname', 'required' => true, 'maxlength' => 50, 'placeholder' => 'Masukan Nama Bank yang digunakan Karyawan' )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('No. Rekening Karyawan', 'bankaccountnumber', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input(array( 'class' => 'form-control', 'type' => 'number', 'required' => true, 'placeholder' => 'Masukan Nomor Rekening Karyawan', 'min' => 0, 'id' => 'bankaccountnumber', 'name' => 'bankaccountnumber', 'value' => $this->session->flashdata('bankaccountnumber') )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Status Karyawan', 'status', array( 'class' => 'control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php
                    $data = array(
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif'
                    );
                    echo form_dropdown('status', $data, 'Aktif', array( 'class' => 'form-control', 'required' => true, 'id' => 'status' ));
                ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Pegawai Kontrak?', 'iscontract', array( 'class' => 'control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php
                    $data = array(
                        'Y' => 'Ya',
                        'N' => 'Tidak'
                    );
                    echo form_dropdown('iscontract', $data, 'N', array( 'class' => 'form-control', 'id' => 'iscontract', 'required' => true ));
                ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Peran', 'role', array( 'class' => 'control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php 
                    $data = array(
                        'adm' => 'Administrator',
                        'mgr' => 'Manager',
                        'emp' => 'Karyawan'
                    );
                    echo form_dropdown('role', $data, 'emp', array( 'class' => 'form-control', 'id' => 'role', 'required' => true ));
                ?>
            </div>
        </div>

        <div class="form-group">
            <p class="text-center">
                <?php echo form_submit('register', 'Register', array( 'class' => 'btn btn-success' )); ?>
            </p>
        </div>

    </div>

</div>

<?php echo form_close(); ?>