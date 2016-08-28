<h2 class="text-center">Upload Assignment</h2>



<?php echo form_open_multipart(base_url().'employee/do_uploadassignment', array( 'class' => 'form-horizontal' )); ?>

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
            <?php echo form_label('Upload Tugas', 'assignment', array( 'class' => 'control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php echo form_input(array( 'type' => 'file', 'id' => 'assignment', 'name' => 'assignment', 'accept' => '.doc, .docx', 'required' => true, 'class' => 'form-control' )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Deskripsi', 'description', array( 'class' => 'control-label col-sm-4' )); ?>
            <div class="col-sm-8">
                <?php echo form_textarea('description', '', array( 'class' => 'form-control', 'id' => 'description', 'required' => true, 'style' => 'resize: none;' )); ?>
            </div>
        </div>

        <div class="form-group">
            <p class="text-center">
                <?php echo form_submit('save', 'Save', array( 'class' => 'btn btn-success' )); ?>
            </p>
        </div>

    </div>

</div>

<?php echo form_close(); ?>

<?php if (count($assignments) > 0): ?>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nama File</th>
            <th>Tanggal Upload</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach( $assignments as $assignment ): ?>
            <tr>
                <td><?php echo $assignment->assignment; ?></td>
                <td><?php echo $assignment->createdttm; ?></td>
                <td><?php echo $assignment->description; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>