<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title">Download Payroll</h1>
        <p class="title-description"> Maiga Corp. </p>
    </div>
    <section class="section">

        <div class="card card-block">
            <?php if (count($payrolls) > 0): ?>

                <div class="row">

                    <div class="col-md-6 col-md-offset-3">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>Payroll</th>
                                    <th>Upload Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($payrolls as $payroll): ?>
                                    <tr>
                                        <td>
                                            <a target="_blank" href="<?php echo base_url(); ?>employee/getpayroll?filename=<?php echo $payroll->slipgaji; ?>"><?php echo $payroll->slipgaji; ?></a>
                                        </td>
                                        <td><?php echo date("D, d M Y | H:i", strtotime($payroll->createdttm)); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php else: ?>

                <h4>No payroll</h4>

            <?php endif; ?>
        </div>

    </section>
</article>