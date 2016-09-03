<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Edit Profile</h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">

            <?php echo form_open_multipart(base_url().'users/do_editprofile', array( 'novalidate' => true )); ?>
            
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

                    <div class="form-group row">
                        <?php echo form_label('Password Lama', 'old-password', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_password('old-password', '', array( 'class' => 'form-control', 'id' => 'password', 'required' => true, 'placeholder' => 'Masukan Password Lama' )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Password', 'password', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_password('password', '', array( 'class' => 'form-control', 'id' => 'password', 'required' => true, 'placeholder' => 'Masukan Password' )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Ulangi Password', 'conf-pass', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_password('conf-pass', '', array( 'class' => 'form-control', 'id' => 'conf-pass', 'required' => true, 'placeholder' => 'Ulangi Password' )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Tempat Lahir', 'lob', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_input('lob', $profile->tempatlahir, array( 'class' => 'form-control', 'id' => 'lob', 'placeholder' => 'Masukan Tempat Lahir', 'required' => true )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Tanggal Lahir', 'dob', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_input('dob', $profile->tanggallahir, array( 'class' => 'form-control datepicker', 'required' => true, 'placeholder' => 'Masukan Tanggal Lahir (yyyy-mm-dd)', 'id' => 'dob' )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('No. HP', 'mobile', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_input(array( 'class' => 'form-control', 'placeholder' => 'Masukan No. HP.', 'id' => 'mobile', 'name' => 'mobile', 'type' => 'tel', 'required' => true, 'value' => $profile->mobile )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Foto Profile', 'profilepic', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_input(array( 'class'=>'form-control', 'accept'=>'image/*', 'required'=>true, 'type' => 'file', 'id' => 'profilepic', 'name' => 'profilepic' )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Nama Bank Karyawan', 'bankaccountname', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_input('bankaccountname', $profile->namabank, array( 'class' => 'form-control', 'id' => 'bankaccountname', 'required' => true, 'maxlength' => 50, 'placeholder' => 'Masukan Nama Bank yang digunakan Karyawan' )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('No. Rekening Karyawan', 'bankaccountnumber', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_input(array( 'class' => 'form-control', 'type' => 'number', 'required' => true, 'placeholder' => 'Masukan Nomor Rekening Karyawan', 'min' => 0, 'id' => 'bankaccountnumber', 'name' => 'bankaccountnumber', 'value' => $profile->norekening )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <p style="text-align: center;">
                            <?php echo form_submit('', 'Update', array( 'class' => 'btn btn-success' )); ?>
                        </p>
                    </div>

                </div>



                </div>

                <?php echo form_close(); ?>


            </div>


        </div>
    </section>
</article>