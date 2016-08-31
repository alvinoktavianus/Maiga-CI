<?php if (count($assignments) > 0): ?>

<h2 class="text-center">Check Assignment</h2>
<br>

<table class="table table-bordered table-striped">
    <thead>
        <th>Email</th>
        <th>Nama Karyawan</th>
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