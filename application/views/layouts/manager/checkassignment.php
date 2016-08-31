<h2 class="text-center">Check Assignment</h2>
<br>

<form action="<?php echo base_url(); ?>manager/checkassignments" class="form-horizontal" enctype="multipart/form-data" method="get" accept-charset="utf-8">

<div class="row">

    <div class="col-md-6 col-md-offset-3">

        <div class="form-group">
            <?php echo form_label('Pilih Topik', 'topic', array( 'class' => 'col-sm-4 control-label' )); ?>
            <div class="col-sm-8">
                <?php echo form_dropdown('topic', $topics, '', array( 'class' => 'form-control', 'required' => true )); ?>
            </div>
        </div>

        <div class="form-group">
            <p class="text-center">
                <?php echo form_submit('', 'Pilih', array( 'class' => 'btn btn-success' )); ?>
            </p>
        </div>

    </div>

</div>

<?php echo form_close(); ?>