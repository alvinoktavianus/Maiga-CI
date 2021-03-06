<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Home</h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">

            <div class="row">
                <div class="col-sm-10">
                    <h2 class="text-center">Profile</h2>
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo base_url(); ?>employee/updateprofile" class="btn btn-info">Update</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <strong><?php echo $this->session->flashdata('success'); ?></strong>
                        </div>
                    <?php endif; ?>

                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Nama</th>
                            <td><?php echo $employee->nama; ?></td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td><?php echo $employee->tempatlahir; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td><?php echo date("D, d M Y", strtotime($employee->tanggallahir)); ?></td>
                        </tr>
                        <tr>
                            <th>No. Handphone</th>
                            <td><?php echo $employee->mobile; ?></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td><?php echo $employee->jabatan; ?></td>
                        </tr>
                        <tr>
                            <th>Departemen</th>
                            <td><?php echo $employee->department; ?></td>
                        </tr>
                        <tr>
                            <th>Mulai Bekerja</th>
                            <td><?php echo date("D, d M Y", strtotime($employee->mulaibekerja)); ?></td>
                        </tr>
                        <tr>
                            <th>Nama Bank</th>
                            <td><?php echo $employee->namabank; ?></td>
                        </tr>
                        <tr>
                            <th>No. Rekening</th>
                            <td><?php echo $employee->norekening; ?></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>

</div>
</section>
</article>