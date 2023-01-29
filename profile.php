<?php include "header.php"; ?>
<style>
    .hero {
        min-height: 100vh;
        height: auto;
    }

    p {
        overflow-wrap: break-word;
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
?>

<link href="assets/css/profile.css" rel="stylesheet">

<!-- <body background="assets/img/hero-bg.png"> -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container" style="
    margin-top: 12%;">
        <center>
            <h1>My Profile</h1>

        </center>
        <div class="row mt-5">
            <div class="col-lg-6 col-12 d-flex flex-column justify-content-center">
                <div class="profile-nav col-md-6 col-sm-8 col-lg-8" style="margin:auto">
                    <div class="panel">
                        <div class="user-heading round">
                            <a href="#">
                                <img src="assets\img\avtar.jpg" alt="">
                            </a>
                            <h2 class="text-white"><?= $first_name . " " . $last_name ?></h2>
                            <p><?= $email ?></p>
                            <a href="logout.php?logout=user_id" style="border-width: 2px; border-radius: 8px;" class="btn btn-outline-light">Sign Out</a>
                        </div>

                        <!-- <center><button class="btn btn-info mt-5"><a href="#"> <i class="fa fa-edit"></i> Edit profile</a></button></center> -->
                    </div>
                </div>

            </div>
            <style>
                .bio-row span {
                    font-weight: 500;
                }
            </style>
            <div class="col-lg-6 col-12 mt-5" data-aos="zoom-out" data-aos-delay="200">
                <div class="row text-center">
                    <div class="bio-row">
                        <p><span>Country </span>: <?= $country ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Phone </span>: <?= $phone ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>TRC20 id </span>: <?= $trc_id ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Email </span>: <?= $email ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Invitation code </span>: <?= $invitation_code ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span style="color: blue; cursor: pointer" onclick='copyLink()'> <u>Copy invitation link</u> </span></p>
                    </div>
                    <div id="alert-copy" class="alert alert-success position-fixed top-0 start-50 translate-middle-x" style="display: none;z-index:1" role="alert">
                        Link copied successfuly.
                    </div>
                    <script>
                        function copyLink() {
                            navigator.clipboard.writeText("<?= "$site_url/signup.php?frm=$invitation_code" ?>");
                            document.getElementById("alert-copy").style.display = "block";
                            setTimeout(() => {
                                document.getElementById("alert-copy").style.display = "none";
                            }, 2000)
                        }
                    </script>
                    <div class="col-12 d-flex justify-content-center">
                        <div>
                            <div class="pb-4" style="padding: 17px 40px;border: 1px solid #8d8d8d;border-radius: 8px;background: #b1b1b1;color: white;font-weight: bold;font-size: 18px;">
                                <span style="letter-spacing: 1px; ">Balance amount</span>
                                <hr>
                                <span style="font-family: 'Nunito'; letter-spacing: 1px;">$ <?= $amount ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="deposit.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Deposit</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="withdraw.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Withdraw</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- <div data-aos="fade-up" class="mt-5">
                <h3>Daily Report</h3>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Earning</th>
                                <th scope="col">Deposit</th>
                                <th scope="col">Withdraw</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $uid = $_SESSION['user_id'];
                            $d_date = date("Y-m-d");
                            $query = mysqli_query($conn, "SELECT `report_deposit`, `report_withdraw`, `earning_report` FROM `balance_report` WHERE `user_id` = '$uid' AND `date` >= '$d_date'");
                            if ($row = mysqli_fetch_assoc($query)) {
                                extract($row);
                            ?>

                                <tr>
                                    <td>$<?= $earning_report ?></td>
                                    <td>$<?= $report_deposit ?></td>
                                    <td>$<?= $report_withdraw ?></td>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <td>$0.0000</td>
                                    <td>$0.0000</td>
                                    <td>$0.0000</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div data-aos="fade-up" class="mt-5">
                <h3>weekly Report</h3>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Earning</th>
                                <th scope="col">Deposit</th>
                                <th scope="col">Withdraw</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $uid = $_SESSION['user_id'];
                            $d_date = date("Y-m-d");
                            $d_date = date("Y-m-d", strtotime('-1 week', strtotime($d_date)));
                            $query = mysqli_query($conn, "SELECT SUM(`report_deposit`) as dp, SUM(`report_withdraw`) as wt, SUM(`earning_report`) as er FROM `balance_report` WHERE `user_id` = '$uid' AND `date` >= '$d_date'");
                            if ($row = mysqli_fetch_assoc($query)) {
                                extract($row);
                            ?>

                                <tr>
                                    <td>$<?= ($er) ? $er : 0.0000 ?></td>
                                    <td>$<?= ($dp) ? $dp : 0.0000 ?></td>
                                    <td>$<?= ($wt) ? $wt : 0.0000 ?></td>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <td>$0.0000</td>
                                    <td>$0.0000</td>
                                    <td>$0.0000</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div data-aos="fade-up" class="mt-5">
                <h3>Monthly Report</h3>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Earning</th>
                                <th scope="col">Deposit</th>
                                <th scope="col">Withdraw</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $uid = $_SESSION['user_id'];
                            $d_date = date("Y-m-d");
                            $d_date = date("Y-m-d", strtotime('-1 month', strtotime($d_date)));
                            $query = mysqli_query($conn, "SELECT SUM(`report_deposit`) as dp, SUM(`report_withdraw`) as wt, SUM(`earning_report`) as er FROM `balance_report` WHERE `user_id` = '$uid' AND `date` >= '$d_date'");
                            if ($row = mysqli_fetch_assoc($query)) {
                                extract($row);
                            ?>

                                <tr>
                                    <td>$<?= ($er) ? $er : 0.0000 ?></td>
                                    <td>$<?= ($dp) ? $dp : 0.0000 ?></td>
                                    <td>$<?= ($wt) ? $wt : 0.0000 ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div data-aos="fade-up" class="mt-5">
                <h3>All Time Report</h3>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Earning</th>
                                <th scope="col">Deposit</th>
                                <th scope="col">Withdraw</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $uid = $_SESSION['user_id'];
                                $query = mysqli_query($conn, "SELECT SUM(`report_deposit`) as dp, SUM(`report_withdraw`) as wt, SUM(`earning_report`) as er FROM `balance_report` WHERE `user_id` = '$uid'");
                                if ($row = mysqli_fetch_assoc($query)) {
                                    extract($row);
                                ?>
                                    <td>$<?= ($er) ? $er : 0 ?></td>
                                    <td>$<?= ($dp) ? $dp : 0 ?></td>
                                    <td>$<?= ($wt) ? $wt : 0 ?></td>
                                <?php
                                } else {
                                ?>
                                    <td>$0.0000</td>
                                    <td>$0.0000</td>
                                    <td>$0.0000</td>
                                <?php
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div data-aos="fade-up" class="mt-5">
                <h3>All Time Team Report</h3>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">1st sub-ordinate</th>
                                <th scope="col">2nd sub-ordinate</th>
                                <th scope="col">3rd sub-ordinate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $uid = $_SESSION['user_id'];
                                $query1 = mysqli_query($conn, "SELECT SUM(`to_1st`) as or1 FROM `user` INNER JOIN `balance_report` ON `user`.`id` = `balance_report`.`user_id` WHERE `refferd_by` = '$invitation_code'");
                                if ($row1 = mysqli_fetch_assoc($query1)) :
                                ?>
                                    <td>$<?= ($row1['or1']) ? $row1['or1'] : 0 ?></td>
                                <?php else : ?>
                                    <td>$0.0000</td>
                                <?php endif; ?>
                                <?php
                                $m_query = mysqli_query($conn, "SELECT `invitation_code` as `code` FROM user WHERE `refferd_by` = '$invitation_code'");
                                $or2_ern = 0.0000;
                                $or3_ern = 0.0000;
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
                                ?>
                                <td>$<?= $or2_ern ?></td>
                                <td>$<?= $or3_ern ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div data-aos="fade-up" class="mt-5">
                <h3>My Team</h3>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Invitation Code</th>
                                <th scope="col">Country</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $uid = $_SESSION['user_id'];
                            $query = mysqli_query($conn, "SELECT * FROM user WHERE refferd_by = '$invitation_code'");
                            $sr = 1;
                            while ($row = mysqli_fetch_assoc($query)) {
                                extract($row);
                            ?>

                                <tr>
                                    <td><?= $sr ?></td>
                                    <td><?= $first_name . " " . $last_name ?></td>
                                    <td><?= $email ?></td>
                                    <td><?= $invitation_code ?></td>
                                    <td><?= $country ?></td>
                                    <td>$ <?= $amount ?></td>
                                </tr>
                            <?php
                                $sr++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div> -->
        </div>
    </div>

</section>

<!-- End Hero -->

<div class="footers">

    <?php include "footer.php"; ?>
</div>