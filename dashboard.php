<?php include "header.php"; ?>
<style>
    .hero {
        min-height: 100vh;
        height: auto;
    }

    p {
        overflow-wrap: break-word;
    }

    .img-chart {
        height: 90px;
        /* position: absolute; */
        /* top: 35px;
        left: 90px; */
    }

    @media (max-width: 600px){
        .img-chart{
            height: 60px;
        }
    }
</style>
<?php
if ($uid < 1)
    echo '<script> window.location.href = "signin.php" </script>';

// print_r($_SESSION);
extract($_SESSION);
$qq = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$user_id'");
// echo "SELECT * FROM `user` WHERE `id` = '$user_id'";
if ($row = mysqli_fetch_assoc($qq))
    extract($row);
$query = mysqli_query($conn, "SELECT SUM(`report_deposit`) as dp, SUM(`report_withdraw`) as wt, SUM(`earning_report`) as er FROM `balance_report` WHERE `user_id` = '$uid'");
if ($row = mysqli_fetch_assoc($query)) {
    $t_deposit = ($row['dp']) ? $row['dp'] : 0;
    $t_earning = ($row['er']) ? $row['er'] : 0;
    $t_withdraw = ($row['wt']) ? $row['wt'] : 0;
} else {
    $t_deposit = 0;
    $t_earning = 0;
    $t_withdraw = 0;
}
$d_date = date("Y-m-d", strtotime('-1 month', strtotime(date("Y-m-d"))));
$query = mysqli_query($conn, "SELECT SUM(`report_deposit`) as dp, SUM(`report_withdraw`) as wt, SUM(`earning_report`) as er FROM `balance_report` WHERE `user_id` = '$uid' AND `date` >= '$d_date'");
if ($row = mysqli_fetch_assoc($query)) {
    $m_deposit = ($row['dp']) ? $row['dp'] : 0;
    $m_earning = ($row['er']) ? $row['er'] : 0;
    $m_withdraw = ($row['wt']) ? $row['wt'] : 0;
} else {
    $m_deposit = 0;
    $m_earning = 0;
    $m_withdraw = 0;
}
$uid = $_SESSION['user_id'];
$dates = [];
$earning_reports = [];
$report_deposits = [];
$report_withdraws = [];
$dates[0] = date("Y-m-d", strtotime('-6 day', strtotime(date("Y-m-d"))));
$dates[1] = date("Y-m-d", strtotime('-5 day', strtotime(date("Y-m-d"))));
$dates[2] = date("Y-m-d", strtotime('-4 day', strtotime(date("Y-m-d"))));
$dates[3] = date("Y-m-d", strtotime('-3 day', strtotime(date("Y-m-d"))));
$dates[4] = date("Y-m-d", strtotime('-2 day', strtotime(date("Y-m-d"))));
$dates[5] = date("Y-m-d", strtotime('-1 day', strtotime(date("Y-m-d"))));
$dates[6] = date("Y-m-d");

foreach ($dates as $x => $date) {
    $query = mysqli_query($conn, "SELECT `report_deposit`, `report_withdraw`, `earning_report` FROM `balance_report` WHERE `user_id` = '$uid' AND `date` = '$date'");
    if ($r_row = mysqli_fetch_assoc($query)) {
        extract($r_row);
        $earning_reports[$x] = $earning_report;
        $report_deposits[$x] = $report_deposit;
        $report_withdraws[$x] = $report_withdraw;
    } else {
        $earning_reports[$x] = 0;
        $report_deposits[$x] = 0;
        $report_withdraws[$x] = 0;
    }
}
// echo "<pre/>";
// print_r($earning_reports);
// print_r($report_deposits);
// print_r($report_withdraws);
// print_r($dates);
?>
<link href="assets/css/profile.css" rel="stylesheet">

<!-- <body background="assets/img/hero-bg.png"> -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container" style="
    margin-top: 50px;">
        <center>
            <h1>Dashboard</h1>

        </center>
        <div class="row mt-4 justify-content-center m-0">
            <div class="col-12 col-md-7 col-lg-8">
                <canvas id="myChart" style="max-height: 300px; min-height: 300px"></canvas>
            </div>
            <div class="col-12 col-md-5 col-lg-4 text-center">
                <h3>Balance Amount</h3>
                <canvas class="mb-3" id="balanceChart" style="max-height: 250px;"></canvas>
                <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $amount ?></span>
            </div>
            <div class="col-12 mt-4">
                <div class="row m-0 text-center justify-content-center">
                    <h3 class="col-12">Daily Report</h3>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php
                        if ($earning_reports[6] > 0) :
                        ?>
                            <canvas class="mb-2" id="daily-earning" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Earning</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $earning_reports[6] ?></span>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php
                        if ($report_deposits[6] > 0) :
                        ?>
                            <canvas class="mb-2" id="daily-deposit" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Deposits</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $report_deposits[6] ?></span>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php
                        if ($report_withdraws[6] > 0) :
                        ?>
                            <canvas class="mb-2" id="daily-withdraw" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Withdrawals</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $report_withdraws[6] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="row m-0 text-center justify-content-center">
                    <h3 class="col-12">Monthly Report</h3>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php
                        if ($m_earning > 0) :
                        ?>
                            <canvas class="mb-2" id="monthly-earning" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Earnings</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $m_earning ?></span>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php
                        if ($m_deposit > 0) :
                        ?>
                            <canvas class="mb-2" id="monthly-deposit" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Deposits</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $m_deposit ?></span>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php
                        if ($m_withdraw > 0) :
                        ?>
                            <canvas class="mb-2" id="monthly-withdraw" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Withdrawals</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $m_withdraw ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="row m-0 text-center justify-content-center">
                    <h3 class="col-12">All Time Report</h3>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php
                        if ($t_earning > 0) :
                        ?>
                            <canvas class="mb-2" id="earning" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Earnings</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $t_earning ?></span>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php
                        if ($t_deposit > 0) :
                        ?>
                            <canvas class="mb-2" id="deposit" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Deposits</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $t_deposit ?></span>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php
                        if ($t_withdraw > 0) :
                        ?>
                            <canvas class="mb-2" id="withdraw" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Withdrawals</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $t_withdraw ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: JSON.parse(`<?= json_encode($dates) ?>`),
            datasets: [{
                label: 'Earnings',
                data: JSON.parse(`<?= json_encode($earning_reports) ?>`),
                backgroundColor: '#1a75bd'
            }, {
                label: 'Deposits',
                data: JSON.parse(`<?= json_encode($report_deposits) ?>`),
                backgroundColor: '#218380'
            }, {
                label: 'withdrawals',
                data: JSON.parse(`<?= json_encode($report_withdraws) ?>`),
                backgroundColor: '#ff5a00'
            }]
        },

        options: {
            legend: {
                position: 'right' // place legend on the right side of chart
            },
            scales: {
                xAxes: [{
                    stacked: true // this should be set to make the bars stacked
                }],
                yAxes: [{
                    stacked: true // this also..
                }]
            },
            //causes chart to resize when its container resizes
            responsive: true,
            //setting to false will prevent the height of the chart from shrinking when resizing
            maintainAspectRatio: false
        }
    });

    const balanceData = {
        labels: [
            'Earnings',
            'Deposits',
            'withdrawals'
        ],
        datasets: [{
            label: 'Balance Report',
            data: [
                <?= $t_earning ?>,
                <?= $t_deposit ?>,
                <?= $t_withdraw ?>,
            ],
            backgroundColor: [
                '#1a75bd',
                '#218380',
                '#ff5a00'
            ],
            hoverOffset: 4
        }]
    };
    const balanceConfig = {
        type: 'doughnut',
        data: balanceData,
    };
    var ctx = document.getElementById("balanceChart");
    new Chart(ctx, balanceConfig);

    const dE = {
        labels: [
            'Earnings',
        ],
        datasets: [{
            label: 'Daily Earning',
            data: [
                <?= $earning_reports[6] ?>,
            ],
            backgroundColor: [
                '#1a75bd',
            ],
            hoverOffset: 4
        }]
    };
    const dEC = {
        type: 'doughnut',
        data: dE,
    };
    var ctx = document.getElementById("daily-earning");
    if (ctx)
        new Chart(ctx, dEC);
    const dD = {
        labels: [
            'Deposits',
        ],
        datasets: [{
            label: 'Daily Deposit',
            data: [
                <?= $report_deposits[6] ?>,
            ],
            backgroundColor: [
                '#218380',
            ],
            hoverOffset: 4
        }]
    };
    const dDC = {
        type: 'doughnut',
        data: dD,
    };
    var ctx = document.getElementById("daily-deposit");
    if (ctx)
        new Chart(ctx, dDC);
    const dW = {
        labels: [
            'withdrawals'
        ],
        datasets: [{
            label: 'Daily Withdraw',
            data: [
                <?= $report_withdraws[6] ?>,
            ],
            backgroundColor: [
                '#ff5a00'
            ],
            hoverOffset: 4
        }]
    };
    const dWC = {
        type: 'doughnut',
        data: dW
    };
    var ctx = document.getElementById("daily-withdraw");
    if (ctx)
        new Chart(ctx, dWC);

    const mE = {
        labels: [
            'Earnings',
        ],
        datasets: [{
            label: 'Monthly Earning',
            data: [
                <?= $m_earning ?>,
            ],
            backgroundColor: [
                '#1a75bd',
            ],
            hoverOffset: 4
        }]
    };
    const mEC = {
        type: 'doughnut',
        data: mE,
    };
    var ctx = document.getElementById("monthly-earning");
    if (ctx)
        new Chart(ctx, mEC);
    const mD = {
        labels: [
            'Deposits',
        ],
        datasets: [{
            label: 'Monthly Deposit',
            data: [
                <?= $m_deposit ?>,
            ],
            backgroundColor: [
                '#218380',
            ],
            hoverOffset: 4
        }]
    };
    const mDC = {
        type: 'doughnut',
        data: mD,
    };
    var ctx = document.getElementById("monthly-deposit");
    if (ctx)
        new Chart(ctx, mDC);
    const mW = {
        labels: [
            'withdrawals'
        ],
        datasets: [{
            label: 'Monthly Withdraw',
            data: [
                <?= $m_withdraw ?>,
            ],
            backgroundColor: [
                '#ff5a00'
            ],
            hoverOffset: 4
        }]
    };
    const mWC = {
        type: 'doughnut',
        data: mW
    };
    var ctx = document.getElementById("monthly-withdraw");
    if (ctx)
        new Chart(ctx, mWC);

    const tE = {
        labels: [
            'Earnings',
        ],
        datasets: [{
            label: 'Total Earning',
            data: [
                <?= $t_earning ?>,
            ],
            backgroundColor: [
                '#1a75bd',
            ],
            hoverOffset: 4
        }]
    };
    const tEC = {
        type: 'doughnut',
        data: tE,
    };
    var ctx = document.getElementById("earning");
    if (ctx)
        new Chart(ctx, tEC);
    const tD = {
        labels: [
            'Deposits',
        ],
        datasets: [{
            label: 'Total Deposit',
            data: [
                <?= $t_deposit ?>,
            ],
            backgroundColor: [
                '#218380',
            ],
            hoverOffset: 4
        }]
    };
    const tDC = {
        type: 'doughnut',
        data: tD,
    };
    var ctx = document.getElementById("deposit");
    if (ctx)
        new Chart(ctx, tDC);
    const tW = {
        labels: [
            'withdrawals'
        ],
        datasets: [{
            label: 'Total Withdraw',
            data: [
                <?= $t_withdraw ?>,
            ],
            backgroundColor: [
                '#ff5a00'
            ],
            hoverOffset: 4
        }]
    };
    const tWC = {
        type: 'doughnut',
        data: tW
    };
    var ctx = document.getElementById("withdraw");
    if (ctx)
        new Chart(ctx, tWC);
</script>

<div class="footers">
    <?php include "footer.php"; ?>
</div>