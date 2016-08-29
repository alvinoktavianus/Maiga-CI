<?php if (count($payrolls) > 0): ?>

    <h2 class="text-center">Download Payroll</h2>

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <table class="table table-bordered table-striped">
                <thead>
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

<?php else: ?>

    <h4>No payroll</h4>

<?php endif; ?>