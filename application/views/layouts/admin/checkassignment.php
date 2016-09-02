<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Check Assignment</h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">

            <form action="<?php echo base_url(); ?>admin/checkassignments" enctype="multipart/form-data" method="get" accept-charset="utf-8">
            <?php echo form_hidden($csrf['name'], $csrf['hash']); ?>
            <div class="row">

                <div class="col-md-6 col-md-offset-3">

                    <div class="form-group row">
                        <?php echo form_label('Pilih Topik', 'topic', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_dropdown('topic', $topics, '', array( 'class' => 'form-control', 'required' => true )); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <p style="text-align: center;">
                            <?php echo form_submit('', 'Pilih', array( 'class' => 'btn btn-success' )); ?>
                        </p>
                    </div>

                </div>

            </div>

            <?php echo form_close(); ?>

        </div>
    </section>
</article>