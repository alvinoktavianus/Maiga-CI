<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Daftar Karyawan</h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">

            <?php if (count($employees) > 0): ?>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead class="thead-inverse">
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Hak Akses</th>
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
                            <td>
                                <?php
                                    switch ($employee->role) {
                                        case 'emp':
                                            echo "Karyawan";
                                            break;
                                        case 'mgr':
                                            echo "Manager";
                                            break;
                                    }
                                ?>
                            </td>
                    		<td><?php echo $employee->status; ?></td>
                    		<td><a href="<?php echo base_url(); ?>admin/updateemployee?email=<?php echo $employee->email; ?>">Update Employee</a></td>
                    		<td>
                    			<?php echo form_open(base_url().'admin/removeemployee?email='.$employee->email); ?>
                				<?php echo form_submit('remove', 'Remove', array( 'class' => 'btn btn-danger btn-sm' )); ?>
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

        </div>
    </section>
</article>