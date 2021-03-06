<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Upload Payroll</h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">

            <?php if (count($employees) == 0): ?>
                <h4>Empty Employee</h4>
            <?php else: ?>

                <?php echo form_open_multipart(base_url().'admin/do_uploadpayroll', array( 'class' => 'form-horizontal' )); ?>

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

                        <div class="form-group row">
                            <?php echo form_label('Pilih nama karyawan', 'namakaryawan', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                            <div class="col-sm-8">
                                <?php
                                    $options[''] = '';
                                    foreach ($employees as $employee) {
                                        $options[$employee->email] = $employee->nama;
                                    }
                                    echo form_dropdown('namakaryawan', $options, '', array( 'class' => 'form-control', 'required' => true, 'id' => 'namakaryawan' ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <?php echo form_label('Upload Slip Gaji', 'slipgaji', array( 'class' => 'col-sm-4 form-control-label' )); ?>
                            <div class="col-sm-8">
                                <?php echo form_input(array( 'class'=>'form-control', 'accept'=>'application/pdf', 'required'=>true, 'type' => 'file', 'id' => 'slipgaji', 'name' => 'slipgaji' )); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <p style="text-align: center;">
                                <?php echo form_submit('save', 'Save', array( 'class'=>'btn btn-success' )); ?>    
                            </p>
                        </div>
                    </div>

                </div>

                <?php echo form_close(); ?>

            <?php endif; ?>

            <?php if (count($payrolls) > 0): ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Upload</th>
                            <th>Nama File</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($payrolls as $payroll): ?>
                            <tr>
                                <td><?php echo $payroll->nama; ?></td>
                                <td><?php echo date("D, d M Y | H:i", strtotime($payroll->createdttm)); ?></td>
                                <td><?php echo $payroll->slipgaji; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php endif; ?>

        </div>
    </section>
</article>