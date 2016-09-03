<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Update <strong><?php echo $profile->email; ?></strong></h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">

            <?php echo form_open(base_url().'admin/do_update_employee?email='.$profile->email, array( 'novalidate' => true )); ?>

            <div class="row">

                <div class="col-md-6 col-md-offset-3">

                    <div class="form-group row">
                        <?php echo form_label('Selesai Bekerja', 'endwork', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_input('endwork', '', array( 'class' => 'form-control datepicker', 'id' => 'endwork', 'required' => true, 'placeholder' => 'Masukan Tanggal Selesai Bekerja (yyyy-mm-dd)' )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Jabatan', 'position', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_input('position', $profile->jabatan, array( 'class' => 'form-control', 'id' => 'position', 'placeholder' => 'Masukan Jabatan', 'required' => true )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <?php echo form_label('Departemen', 'department', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_input('department', $profile->department, array( 'class' => 'form-control', 'required' => true, 'maxlength' => 50, 'placeholder' => 'Masukan Departemen', 'id' => 'department' )); ?>
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

        </div>
    </section>
</article>