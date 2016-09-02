<?php if (count($employees) > 0): ?>

<h2 class="text-center">Daftar Karyawan</h2>
<br>
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <strong><?php echo $this->session->flashdata('success'); ?></strong>
    </div>
<?php endif; ?>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nama Karyawan</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Departemen</th>
            <th colspan="3">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($employees as $employee): ?>
        	<tr>
        		<td><?php echo $employee->nama; ?></td>
        		<td><?php echo $employee->email; ?></td>
        		<td><?php echo $employee->jabatan; ?></td>
        		<td><?php echo $employee->department; ?></td>
        		<td><?php echo $employee->status; ?></td>
        		<td><a href="<?php echo base_url(); ?>admin/updateemployee?email=<?php echo $employee->email; ?>">Update Employee</a></td>
        		<td>
        			<?php echo form_open(base_url().'admin/removeemployee?email='.$employee->email); ?>
    				<?php echo form_submit('remove', 'Remove', array( 'class' => 'btn btn-danger btn-xs' )); ?>
        			<?php echo form_close(); ?>
        		</td>
        	</tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else: ?>

	<h4>No employee</h4>

<?php endif; ?>