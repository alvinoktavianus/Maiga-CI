<?php if (count($assignments) > 0): ?>

    <h2 class="text-center">Download Assignment</h2>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nama Karyawan</th>
            <th>File</th>
            <th>Tanggal Upload</th>
            <th>Keterangan</th>
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
                    <?php echo $assignment->description; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
    <h4>No assignment or employee</h4>
<?php endif; ?>