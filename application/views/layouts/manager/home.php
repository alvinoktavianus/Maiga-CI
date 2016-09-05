<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Home</h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">

            <div class="row">
                
                <div class="col-sm-8">
                    <div class="alert alert-success" role="alert">
                        <p class="text-center">
                            <strong>Welcome, </strong><?php echo $this->session->userdata('user_session')['email']; ?>
                        </p>
                    </div>              
                </div>

                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-xs-12"> <?php $profilepic = base_url().'uploads/profilepics/'.$this->session->userdata('user_session')['profilepic'];  ?>
                            <img style="max-width: 100%; display: block; height: 225px; margin: 0 auto;" src="<?php echo $profilepic; ?>" alt="<?php echo $this->session->userdata('user_session')['profilepic']; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <td><?php echo $profile->nama; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tempat Lahir</th>
                                            <td><?php echo $profile->tempatlahir; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td><?php echo date("D, d M Y", strtotime($profile->tanggallahir)); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Jabatan</th>
                                            <td><?php echo $profile->jabatan; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Departemen</th>
                                            <td><?php echo $profile->department; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Mulai Bekerja</th>
                                            <td><?php echo date("D, d M Y", strtotime($profile->mulaibekerja)); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>
</article>