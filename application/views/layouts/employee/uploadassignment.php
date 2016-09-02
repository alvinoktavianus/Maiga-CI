<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Home</h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">

            <?php echo form_open_multipart(base_url().'employee/do_uploadassignment', array( 'class' => 'form-horizontal' )); ?>

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
                        <?php echo form_label('Pilih Topik', 'topic', array( 'class' => 'control-label col-sm-4' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_dropdown('topic', $options, '', array( 'class' => 'form-control', 'required' => true, 'id' => 'topic' )); ?>
                        </div>
                    </div>

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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Nama File</th>
                            <th>Topik</th>
                            <th>Keterangan</th>
                            <th>Tanggal Upload</th>
                            <th>Tanggal Periksa</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach( $assignments as $assignment ): ?>
                            <tr>
                                <td><?php echo $assignment->assignment; ?></td>
                                <td><?php echo $assignment->topic; ?></td>
                                <td><?php echo nl2br($assignment->description); ?></td>
                                <td><?php echo date("D, d M Y | H:i", strtotime($assignment->createdttm)); ?></td>
                                <td><?php if ($assignment->checkedon != null) echo date("D, d M Y | H:i", strtotime($assignment->checkedon)); ?></td>
                                <td>
                                    <?php if ( $assignment->status == 'P' ): ?>
                                        <a class="btn btn-info btn-xs">Pending</a>
                                    <?php elseif( $assignment->status == 'A' ): ?>
                                        <a class="btn btn-success btn-xs">Approved</a>
                                    <?php elseif( $assignment->status == 'C' ): ?>
                                        <a class="btn btn-danger btn-xs">Canceled</a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                        if ( $assignment->status == 'C' ) {
                                            $filename = $assignment->assignment;
                                            $topic = $assignment->topic;
                                            $url = base_url().'employee/do_upload_revision?topic='.$topic.'&filename='.$filename;
                                            echo form_open_multipart($url); ?>

                                            <div class="form-group">
                                                <?php echo form_input(array( 'type' => 'file', 'id' => 'revision', 'name' => 'revision', 'accept' => '.doc, .docx', 'required' => true, 'class' => 'form-control' )); ?>
                                            </div>

                                            <div class="form-group">
                                                <p class="text-center">
                                                <?php echo form_submit('', 'Upload Revisi', array('class' => 'btn btn-warning btn-xs')); ?>
                                                </p>
                                            </div>

                                            <?php echo form_close();
                                        } else {
                                            switch ($assignment->status) {
                                                case 'P':
                                                    echo "Pending";
                                                    break;
                                                case 'A':
                                                    echo "Approved";
                                                    break;
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

        </div>
    </section>
</article>