<h2 class="text-center">Check Assignment</h2>
<br>

<form action="<?php echo base_url(); ?>manager/checkassignments" class="form-horizontal" enctype="multipart/form-data" method="get" accept-charset="utf-8">

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
    </thead>
    <tbody>
        <?php foreach($assignments as $assignment): ?>
            <tr>
                <td><?php echo $assignment->email; ?></td>
                <td><?php echo $assignment->nama; ?></td>
                <td><?php echo nl2br($assignment->description); ?></td>
                <td><a target="_blank" href="<?php echo base_url(); ?>manager/downloadassignment?filename=<?php echo $assignment->assignment; ?>"><?php echo $assignment->assignment; ?></a></td>
                <td><?php echo date("D, d M Y | H:i", strtotime($assignment->createdttm)); ?></td>
                <td><?php if ( $assignment->updatedttm != null ) echo date("D, d M Y | H:i", strtotime($assignment->updatedttm)); ?></td>
                <td>
                    <?php 
                        if ( $assignment->status == 'P' ) {
                            echo form_open(base_url().'manager/updateassignmentstatus?email='.$assignment->email.'&filename='.$assignment->assignment.'&status=A');
                            echo form_submit('approve', 'Approve', array( 'class' => 'btn btn-success btn-xs' ));
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
                            }
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        if ( $assignment->status == 'P' ) {
                            echo form_open(base_url().'manager/updateassignmentstatus?email='.$assignment->email.'&filename='.$assignment->assignment.'&status=C');
                            echo form_submit('approve', 'Cancel', array( 'class' => 'btn btn-danger btn-xs' ));
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