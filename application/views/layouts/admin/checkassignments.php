<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Check Assignment</h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">

            <form action="<?php echo base_url(); ?>admin/checkassignments" class="form-horizontal" enctype="multipart/form-data" method="get" accept-charset="utf-8">
            <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
            <div class="row">

                <div class="col-md-6 col-md-offset-3">

                    <div class="form-group">
                        <?php echo form_label('Pilih Topik', 'topic', array( 'class' => 'col-sm-4 control-label' )); ?>
                        <div class="col-sm-8">
                            <?php echo form_dropdown('topic', $topics, $topic, array( 'class' => 'form-control', 'required' => true )); ?>
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

            <?php if (count($assignments) > 0): ?>

            <table class="table table-bordered table-striped">
                <thead>
                    <th>Email</th>
                    <th>Nama Karyawan</th>
                    <th>Deskripsi</th>
                    <th>File Tugas</th>
                    <th>Tanggal Upload</th>
                    <th>Tanggal Update</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach($assignments as $assignment): ?>
                        <tr>
                            <td><?php echo $assignment->email; ?></td>
                            <td><?php echo $assignment->nama; ?></td>
                            <td><?php echo nl2br($assignment->description); ?></td>
                            <td><a target="_blank" href="<?php echo base_url(); ?>admin/downloadassignment?filename=<?php echo $assignment->assignment; ?>"><?php echo $assignment->assignment; ?></a></td>
                            <td><?php echo date("D, d M Y | H:i", strtotime($assignment->createdttm)); ?></td>
                            <td><?php if ( $assignment->updatedttm != null ) echo date("D, d M Y | H:i", strtotime($assignment->updatedttm)); ?></td>
                            <td>
                                <?php 
                                    if ( $assignment->status == 'P' ) {
                                        echo form_open(base_url().'admin/updateassignmentstatus?email='.$assignment->email.'&filename='.$assignment->assignment.'&status=A&topic='.$this->input->get('topic'));
                                        echo form_submit('', 'Approve', array( 'class' => 'btn btn-success btn-xs' ));
                                        echo form_close();
                                    }
                                    else {
                                        switch ($assignment->status) {
                                            case 'A':
                                                echo 'Approved';
                                                break;
                                            case 'C':
                                                echo 'Canceled';
                                                break;
                                            case 'R':
                                                echo 'Need Revision';
                                                break;
                                        }
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if ( $assignment->status == 'P' ) {
                                        echo form_open(base_url().'admin/updateassignmentstatus?email='.$assignment->email.'&filename='.$assignment->assignment.'&status=R&topic='.$this->input->get('topic'));
                                        echo form_submit('', 'Need Revision', array( 'class' => 'btn btn-warning btn-xs' ));
                                        echo form_close();
                                    }
                                    else {
                                        switch ($assignment->status) {
                                            case 'A':
                                                echo 'Approved';
                                                break;
                                            case 'C':
                                                echo 'Canceled';
                                                break;
                                            case 'R':
                                                echo 'Need Revision';
                                                break;
                                        }
                                    }
                                ?>                    
                            </td>
                            <td>
                                <?php 
                                    if ( $assignment->status == 'P' ) {
                                        echo form_open(base_url().'admin/updateassignmentstatus?email='.$assignment->email.'&filename='.$assignment->assignment.'&status=C&topic='.$this->input->get('topic'));
                                        echo form_submit('', 'Cancel', array( 'class' => 'btn btn-danger btn-xs' ));
                                        echo form_close();
                                    }
                                    else {
                                        switch ($assignment->status) {
                                            case 'A':
                                                echo 'Approved';
                                                break;
                                            case 'C':
                                                echo 'Canceled';
                                                break;
                                            case 'R':
                                                echo 'Need Revision';
                                                break;
                                        }
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php else: ?>

            <h4>No assignments</h4>

            <?php endif; ?>


        </div>

    </section>
</article>