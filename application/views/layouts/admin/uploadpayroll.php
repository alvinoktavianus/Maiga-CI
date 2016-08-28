<h2 class="text-center">Upload Payroll</h2>

<?php if (count($employees) == 0): ?>
    <h4>Empty Employee</h4>
<?php else: ?>

    <?php echo form_open_multipart(base_url().'admin/do_uploadpayroll', array( 'class' => 'form-horizontal' )); ?>

    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <?php echo form_label('Pilih nama karyawan', 'namakaryawan', array( 'class' => 'col-sm-4 control-label' )); ?>
                <div class="col-sm-8">
                    <?php
                        $options[''] = '';
                        foreach ($employees as $employee) {
                            $options[$employee->email] = $employee->nama;
                        }
                        echo form_dropdown('namakaryawan', $options, '', array( 'class' => 'form-control', 'required' => true ));
                    ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('Upload Slip Gaji', 'slipgaji', array( 'class' => 'col-sm-4 control-label' )); ?>
                <div class="col-sm-8">
                    <?php echo form_input(array( 'class'=>'form-control', 'accept'=>'application/pdf', 'required'=>true, 'type' => 'file' )); ?>
                </div>
            </div>

            <div class="form-group">
                <p class="text-center">
                    <?php echo form_submit('save', 'Save', array( 'class'=>'btn btn-success' )); ?>    
                </p>
            </div>
        </div>

    </div>

    <?php echo form_close(); ?>

<?php endif; ?>

<?php if (count($payrolls) > 0): ?>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nama</th>
            <th>Date</th>
            <th>Nama File</th>
            <th>Checked</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($payrolls as $payroll): ?>
            <tr>
                <td><?php echo $payroll->nama; ?></td>
                <td><?php echo $payroll->createdttm; ?></td>
                <td><?php echo $payroll->slipgaji; ?></td>
                <td>
                    <?php if ($payroll->isdownloaded == 'Y'): ?>
                        <input type="checkbox" checked disabled>
                    <?php elseif($payroll->isdownloaded == 'N'): ?>
                        <input type="checkbox" disabled>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>