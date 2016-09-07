<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Assignment History</h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">

            <form action="<?php echo base_url(); ?>manager/checkassignments" enctype="multipart/form-data" method="get" accept-charset="utf-8">
                <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
            </form>
            
            <?php if (count($assignments) > 0): ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="thead-inverse">
                            <th>Email</th>
                            <th>Topik</th>
                            <th>File Tugas</th>
                            <th>Tanggal Upload</th>
                        </thead>
                        <tbody>
                            <?php foreach($assignments as $assignment): ?>
                                <tr>
                                    <td><?php echo $assignment->email ?></td>
                                    <td><?php echo $assignment->topic ?></td>
                                    <td>
                                        <a href="<?php echo base_url() ?>admin/downloadassignment/?filename=<?php echo $assignment->assignment ?>" target="_blank"><?php echo $assignment->assignment ?></a>
                                    </td>
                                    <td><?php echo $assignment->createdttm ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>      

            <?php else: ?>
                <h4>No assignment history.</h4>
            <?php endif; ?>

        </div>

    </section>
</article>