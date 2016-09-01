<?php if (count($assignments) > 0): ?>

    <h2 class="text-center">Download Assignment</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>File</th>
                <th>Tanggal Upload</th>
                <th>Keterangan</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($assignments as $assignment): ?>
                <tr>
                    <td><?php echo $assignment->nama; ?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>admin/getassignment?filename=<?php echo $assignment->assignment; ?>" target="_blank"><?php echo $assignment->assignment; ?></a>
                    </td>
                    <td>
                        <?php echo date("D, d M Y | H:i", strtotime($assignment->createdttm)); ?>
                    </td>
                    <td>
                        <?php echo nl2br($assignment->description); ?>
                    </td>
                    <td>
                        <?php if ( $assignment->ischecked == 'N' ): ?>
                            <?php
                                $param = "email=".$assignment->email."&filename=".$assignment->assignment;
                                echo form_open(base_url().'admin/markassignment?'.$param);
                                echo form_submit('mark', 'Mark as Checked', array( 'class' => 'btn btn-danger btn-xs' ));
                                echo form_close();
                            ?>
                        <?php elseif ( $assignment->ischecked == 'Y' ): ?>
                            Checked
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h4>No assignment or employee</h4>
<?php endif; ?>