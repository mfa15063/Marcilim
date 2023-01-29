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

    .team-style .alert .alert {
        font-size: 16px !important;
        padding: 5px !important;
        margin: 0px !important;
        margin-left: 20px !important;
    }

    .team-style h2 {
        display: flex;
        padding: 11px !important;
        align-items: center;
        font-size: large;
    }

    @media (max-width: 600px) {
        .img-chart {
            height: 60px;
        }

        .team-style .alert .alert {
            font-size: 10px !important;
            padding: 5px !important;
            margin-left: 8px !important;
        }

        .team-style h2 {
            font-size: small;
            padding: 10px !important;
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
$uid = $_SESSION['user_id'];

$query = mysqli_query($conn, "SELECT SUM(`earning_report`) as er FROM `balance_report` WHERE `user_id` = '$uid'");
if ($row = mysqli_fetch_assoc($query)) {
    $t_earning = ($row['er']) ? $row['er'] : 0;
} else {
    $t_earning = 0;
}
$query1 = mysqli_query($conn, "SELECT SUM(`to_1st`) as or1 FROM `user` INNER JOIN `balance_report` ON `user`.`id` = `balance_report`.`user_id` WHERE `refferd_by` = '$invitation_code'");
if ($row1 = mysqli_fetch_assoc($query1)) {
    $t_lvl_1 = ($row1['or1']) ? $row1['or1'] : 0;
} else {
    $t_lvl_1 = 0;
}
$m_query = mysqli_query($conn, "SELECT `invitation_code` as `code` FROM user WHERE `refferd_by` = '$invitation_code'");
$or2_ern = 0;
$or3_ern = 0;
while ($m_row = mysqli_fetch_assoc($m_query)) {
    $code = $m_row['code'];
    $m2_query = mysqli_query($conn, "SELECT `invitation_code` as `code2` FROM user WHERE `refferd_by` = '$code'");
    while ($m2_row = mysqli_fetch_assoc($m2_query)) {
        $code2 = $m2_row['code2'];
        $query3 = mysqli_query($conn, "SELECT SUM(`to_3rd`) as or3 FROM `user` INNER JOIN `balance_report` ON `user`.`id` = `balance_report`.`user_id` WHERE `refferd_by` = '$code2'");
        if ($row3 = mysqli_fetch_assoc($query3))
            $or3_ern += $row3['or3'];
    }
    $query2 = mysqli_query($conn, "SELECT SUM(`to_2nd`) as or2 FROM `user` INNER JOIN `balance_report` ON `user`.`id` = `balance_report`.`user_id` WHERE `refferd_by` = '$code'");
    if ($row2 = mysqli_fetch_assoc($query2))
        $or2_ern += $row2['or2'];
}
$t_lvl_2 = $or2_ern;
$t_lvl_3 = $or3_ern;

$dates = [];
$earning_reports = [];
$lvl_1 = [];
$lvl_2 = [];
$lvl_3 = [];
$dates[0] = date("Y-m-d", strtotime('-11 day', strtotime(date("Y-m-d"))));
$dates[1] = date("Y-m-d", strtotime('-10 day', strtotime(date("Y-m-d"))));
$dates[2] = date("Y-m-d", strtotime('-9 day', strtotime(date("Y-m-d"))));
$dates[3] = date("Y-m-d", strtotime('-8 day', strtotime(date("Y-m-d"))));
$dates[4] = date("Y-m-d", strtotime('-7 day', strtotime(date("Y-m-d"))));
$dates[5] = date("Y-m-d", strtotime('-6 day', strtotime(date("Y-m-d"))));
$dates[6] = date("Y-m-d", strtotime('-5 day', strtotime(date("Y-m-d"))));
$dates[7] = date("Y-m-d", strtotime('-4 day', strtotime(date("Y-m-d"))));
$dates[8] = date("Y-m-d", strtotime('-3 day', strtotime(date("Y-m-d"))));
$dates[9] = date("Y-m-d", strtotime('-2 day', strtotime(date("Y-m-d"))));
$dates[10] = date("Y-m-d", strtotime('-1 day', strtotime(date("Y-m-d"))));
$dates[11] = date("Y-m-d");
foreach ($dates as $x => $date) {
    $query = mysqli_query($conn, "SELECT `earning_report` FROM `balance_report` WHERE `user_id` = '$uid' AND `date` = '$date'");
    if ($r_row = mysqli_fetch_assoc($query)) {
        extract($r_row);
        $earning_reports[$x] = $earning_report;
    } else {
        $earning_reports[$x] = 0;
    }

    $query1 = mysqli_query($conn, "SELECT SUM(`to_1st`) as or1 FROM `user` INNER JOIN `balance_report` ON `user`.`id` = `balance_report`.`user_id` WHERE `refferd_by` = '$invitation_code' AND `balance_report`.`date` = '$date'");
    if ($row1 = mysqli_fetch_assoc($query1)) {
        $lvl_1[$x] = ($row1['or1']) ? $row1['or1'] : 0;
    } else {
        $lvl_1[$x] = 0;
    }
    $m_query = mysqli_query($conn, "SELECT `invitation_code` as `code` FROM user WHERE `refferd_by` = '$invitation_code'");
    $or2_ern = 0.0000;
    $or3_ern = 0.0000;
    while ($m_row = mysqli_fetch_assoc($m_query)) {
        $code = $m_row['code'];
        $m2_query = mysqli_query($conn, "SELECT `invitation_code` as `code2` FROM user WHERE `refferd_by` = '$code'");
        while ($m2_row = mysqli_fetch_assoc($m2_query)) {
            $code2 = $m2_row['code2'];
            $query3 = mysqli_query($conn, "SELECT SUM(`to_3rd`) as or3 FROM `user` INNER JOIN `balance_report` ON `user`.`id` = `balance_report`.`user_id` WHERE `refferd_by` = '$code2' AND `balance_report`.`date` = '$date'");
            if ($row3 = mysqli_fetch_assoc($query3))
                $or3_ern += $row3['or3'];
        }
        $query2 = mysqli_query($conn, "SELECT SUM(`to_2nd`) as or2 FROM `user` INNER JOIN `balance_report` ON `user`.`id` = `balance_report`.`user_id` WHERE `refferd_by` = '$code' AND `balance_report`.`date` = '$date'");
        if ($row2 = mysqli_fetch_assoc($query2))
            $or2_ern += $row2['or2'];
    }
    $lvl_2[$x] = $or2_ern;
    $lvl_3[$x] = $or3_ern;
}
// echo "<pre />";
// print_r($earning_reports);
// print_r($lvl_1);
// print_r($lvl_2);
// print_r($lvl_3); 
?>

<link href="assets/css/profile.css" rel="stylesheet">

<!-- <body background="assets/img/hero-bg.png"> -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container" style="
    margin-top: 12%;">
        <center>
            <h1>My Team</h1>

        </center>
        <div class="row mt-5">
            <div class="col-12">
                <canvas id="myChart" style="max-height: 400px; min-height: 400px"></canvas>
            </div>
            <div data-aos="fade-up" class="col-12 mt-4">
                <div class="row m-0 text-center justify-content-center">
                    <h3 class="col-12">Team Report</h3>
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
                        if ($t_lvl_1 > 0) :
                        ?>
                            <canvas class="mb-2" id="lvl-1" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Level 1 earning</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $t_lvl_1 ?></span>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php
                        if ($t_lvl_2 > 0) :
                        ?>
                            <canvas class="mb-2" id="lvl-2" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Level 2 earning</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $t_lvl_2 ?></span>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <?php
                        if ($t_lvl_3 > 0) :
                        ?>
                            <canvas class="mb-2" id="lvl-3" style="max-height: 200px;"></canvas>
                        <?php
                        else :
                        ?>
                            <label class="mt-1 mb-2" style="font-size: small;">Level 3 earning</label><br>
                            <img src="./assets/img/null-doughnuts.png" class="img-chart" alt=""><br>
                        <?php
                        endif;
                        ?>
                        <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $t_lvl_3 ?></span>
                    </div>
                </div>
            </div>

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
                            label: 'level 1',
                            data: JSON.parse(`<?= json_encode($lvl_1) ?>`),
                            backgroundColor: '#e3c794'
                        }, {
                            label: 'level 2',
                            data: JSON.parse(`<?= json_encode($lvl_2) ?>`),
                            backgroundColor: '#35a7a7'
                        }, {
                            label: 'level 3',
                            data: JSON.parse(`<?= json_encode($lvl_3) ?>`),
                            backgroundColor: '#666825'
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

                const tE = {
                    labels: [
                        'Earnings',
                    ],
                    datasets: [{
                        label: 'Earning',
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
                const tL1 = {
                    labels: [
                        'Level 1 earning',
                    ],
                    datasets: [{
                        label: 'Level 1 Earning',
                        data: [
                            <?= $t_lvl_1 ?>,
                        ],
                        backgroundColor: [
                            '#e3c794',
                        ],
                        hoverOffset: 4
                    }]
                };
                const tL1C = {
                    type: 'doughnut',
                    data: tL1,
                };
                var ctx = document.getElementById("lvl-1");
                if (ctx)
                    new Chart(ctx, tL1C);
                const tL2 = {
                    labels: [
                        'Level 2 earning',
                    ],
                    datasets: [{
                        label: 'Level 2 Earning',
                        data: [
                            <?= $t_lvl_2 ?>,
                        ],
                        backgroundColor: [
                            '#35a7a7',
                        ],
                        hoverOffset: 4
                    }]
                };
                const tL2C = {
                    type: 'doughnut',
                    data: tL2,
                };
                var ctx = document.getElementById("lvl-2");
                if (ctx)
                    new Chart(ctx, tL2C);
                const tL3 = {
                    labels: [
                        'Level 3 earning',
                    ],
                    datasets: [{
                        label: 'Level 3 Earning',
                        data: [
                            <?= $t_lvl_3 ?>,
                        ],
                        backgroundColor: [
                            '#666825',
                        ],
                        hoverOffset: 4
                    }]
                };
                const tL3C = {
                    type: 'doughnut',
                    data: tL3,
                };
                var ctx = document.getElementById("lvl-3");
                if (ctx)
                    new Chart(ctx, tL3C);
            </script>

            <div data-aos="fade-up" class="col-12 mt-4">
                <h3>My Team</h3>
                <div class="text-start team-style">
                    <?php
                    $uid = $_SESSION['user_id'];
                    $query1 = mysqli_query($conn, "SELECT * FROM user WHERE refferd_by = '$invitation_code'");
                    while ($row1 = mysqli_fetch_assoc($query1)) {
                        extract($row1);
                    ?>
                        <h2 class="ptl-1 text-white alert" style="background: #e3c794;">
                            <?= $first_name . " " . $last_name ?> <span class="d-none d-md-inline-flex"> &nbsp;From <?= $country ?> </span> <span class="alert alert-success p-2" style="font-size:medium">Balance: $<?= $amount ?></span>
                        </h2>
                        <?php
                        $query2 = mysqli_query($conn, "SELECT * FROM user WHERE refferd_by = '$invitation_code'");
                        while ($row2 = mysqli_fetch_assoc($query2)) {
                            extract($row2);
                        ?>
                            <h2 class="ptl-2 text-white alert" style="background: #35a7a7;padding-left: 1.5rem !important">
                                <?= $first_name . " " . $last_name ?> <span class="d-none d-md-inline-flex"> &nbsp;From <?= $country ?> </span> <span class="alert alert-success p-2" style="font-size:medium">Balance: $<?= $amount ?></span>
                            </h2>
                            <?php
                            $query3 = mysqli_query($conn, "SELECT * FROM user WHERE refferd_by = '$invitation_code'");
                            while ($row3 = mysqli_fetch_assoc($query3)) {
                                extract($row3);
                            ?>
                                <h2 class="ptl-3 text-white alert" style="background: #666825;padding-left: 2.3rem !important">
                                    <?= $first_name . " " . $last_name ?> <span class="d-none d-md-inline-flex"> &nbsp;From <?= $country ?> </span> <span class="alert alert-success p-2" style="font-size:medium">Balance: $<?= $amount ?></span>
                                </h2>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- End Hero -->

<div class="footers">

    <?php include "footer.php"; ?>
</div>