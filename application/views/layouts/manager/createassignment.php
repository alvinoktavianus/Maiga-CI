<h2 class="text-center">Create New Assignment</h2>

<?php echo form_open_multipart(base_url().'manager/do_createassignment', array( 'class' => 'form-horizontal', 'novalidate' => true )); ?>

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
            <?php echo form_label('Topik', 'topic', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input('topic', $this->session->flashdata('topic'), array( 'class' => 'form-control', 'id' => 'topic', 'placeholder' => 'Masukan topik tugas' )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('File Tugas', 'filetugas', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_input(array( 'type' => 'file', 'id' => 'filetugas', 'name' => 'filetugas', 'class' => 'form-control' )); ?>
            </div>
        </div>

        <div class="form-group">
            <p class="text-center">
                <?php echo form_submit('save', 'Simpan', array( 'class' => 'btn btn-success' )); ?>
            </p>
        </div>

    </div>

</div>

<?php echo form_close(); ?>


<?php if (count($homeworks) > 0): ?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <table class="table table-bordered table-striped">
            <thead>
                <th>Topik</th>
                <th>File Tugas</th>
                <th>Tanggal Dibuat</th>
            </thead>
            <tbody>
                <?php foreach($homeworks as $homework): ?>
                    <tr>
                        <td><?php echo $homework->topic; ?></td>
                        <td><?php echo $homework->homework; ?></td>
                        <td><?php echo date("D, d M Y | H:i", strtotime($homework->createdttm)); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

<?php else: ?>
    <h4>No assignment</h4>
<?php endif; ?>