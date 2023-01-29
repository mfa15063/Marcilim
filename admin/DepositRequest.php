<?php
session_start();
// print_r($_SESSION);
//         die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'static/style.php';
    if (empty($_SESSION[my_enc(md5(admin_id))])) {
        echo "<script>window.location.href = 'signin.php';</script>";
        die;
    }
    if ($_SESSION['fingerprint'] != md5($_SERVER['HTTP_USER_AGENT'] . admin_id . $_SERVER['REMOTE_ADDR'])) {
        session_destroy();
        die;
    }
    ?>
</head>

<body>
    <?php
    if (isset($_POST['approve'])) {
        extract($_POST);
        $rrrr = mysqli_query($conn, "SELECT `status` FROM `deposit` WHERE `id`='$id'");
        $rrr = mysqli_fetch_assoc($rrrr);
        if ($rrr['status'] != "Approved") {
            $qry = mysqli_query($conn, "SELECT * FROM `user` WHERE `id`='$u_id'");
            $dd = mysqli_fetch_assoc($qry);
            $ref = $dd['refferd_by'];
            $r_earn = 0;
            $r_date = date("Y-m-d");
            $r_i_earn = 0;
            $r_deposit = $amount;
            // print_r($dd);
            if ($dd['credit'] < 1) {
                $p10 = $amount * 10 / 100;
                $p12 = $amount * 12 / 100;
                $r_earn = $p10;
                $r_i_earn = $p12;
                // echo $p10.$p12;
                mysqli_query($conn, "UPDATE `user` SET `amount`=amount+$amount+$p10, `credit`=credit+$amount WHERE `id`='$u_id'");
                mysqli_query($conn, "UPDATE `user` SET `amount`=amount+$p12 WHERE `invitation_code`='$ref'");
                if ($amount >= 100) {
                    $today = date("Y-m-d");
                    $newQuery = mysqli_query($conn, "SELECT count(*) as total FROM `deposit` WHERE `date` LIKE '$today%' AND
                '$ref' = (SELECT `refferd_by` FROM `user` WHERE user.id = deposit.u_id) AND 
                deposit.amount = (SELECT `credit` FROM `user` WHERE user.id = deposit.u_id)
                AND `status` = 'Approved' AND deposit.amount >= '100'");
                    $rowData = mysqli_fetch_assoc($newQuery);
                    if ($rowData['total'] == 2) {
                        $update = mysqli_query($conn, "UPDATE `user` SET `amount`=amount+45 WHERE `invitation_code`='$ref'");
                        $r_i_earn = $r_i_earn + 45;
                    } else if ($rowData['total'] == 9) {
                        $update = mysqli_query($conn, "UPDATE `user` SET `amount`=amount+115 WHERE `invitation_code`='$ref'");
                        $r_i_earn = $r_i_earn + 115;
                    }
                    // echo "toky";
                }
                // echo "foky";
            } else {
                $update = mysqli_query($conn, "UPDATE `user` SET `amount`=amount+$amount, `credit`=credit+$amount WHERE `id`='$u_id'");
                // echo "ok";
            }
            // die;
            $update = mysqli_query($conn, "UPDATE `deposit` SET `status`='Approved' WHERE `id`='$id'");

            $r_query = mysqli_query($GLOBALS['conn'], "SELECT * FROM `balance_report` WHERE `user_id` = '$u_id' AND `date` = '$r_date'");
            if (mysqli_num_rows($r_query) > 0) {
                mysqli_query($GLOBALS['conn'], "UPDATE `balance_report` SET `earning_report` = `earning_report` + '$r_earn', `report_deposit` = `report_deposit` + '$r_deposit', `to_1st` = `to_1st` + '$r_i_earn' WHERE `user_id` = '$u_id' AND `date` = '$r_date'");
            } else {
                mysqli_query($GLOBALS['conn'], "INSERT INTO `balance_report`(`user_id`,`earning_report` , `report_deposit`, `to_1st`, `date`) VALUES ('$u_id', '$r_earn', '$r_deposit', '$r_i_earn', '$r_date')");
            }
        }
    }
    if (isset($_POST['disapprove'])) {
        extract($_POST);
        $update = mysqli_query($conn, "UPDATE `deposit` SET `status`='Disapproved' WHERE `id`='$id'");
    }
    ?>

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <?php
        include 'static/sidebar.php' ?>
        <!-- Content Start -->
        <div class="content">
            <?php include 'static/header.php' ?>
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Deposit Request</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">User Details</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Receipt</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM deposit");
                                $sr = 1;
                                while ($row = mysqli_fetch_assoc($query)) {
                                    extract($row);
                                ?>
                                    <tr>
                                        <td><?= $sr ?></td>
                                        <td>
                                            <a data-bs-toggle="modal" href data-bs-target="#modelIdUser<?= $id ?>">
                                                View User
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modelIdUser<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">View User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php
                                                            $user = mysqli_query($conn, "SELECT * FROM user WHERE `id` ='$u_id'");
                                                            $UserRow = mysqli_fetch_assoc($user)
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p>Name : <?= $UserRow['first_name'] ?> <?= $UserRow['last_name'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>Email : <?= $UserRow['email'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>Amount : <?= $UserRow['amount'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>Deposit : <?= $UserRow['credit'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>Country : <?= $UserRow['country'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>Phone no : <?= $UserRow['phone'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>TRC ID : <?= $UserRow['trc_id'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>Referred By : <?= $UserRow['refferd_by'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>Invitation Code : <?= $UserRow['invitation_code'] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $amount ?><b><?= $unit ?></b></td>
                                        <td><?= $date ?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a data-bs-toggle="modal" href data-bs-target="#modelId<?= $id ?>">
                                                View Receipt
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modelId<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">View Receipt</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php
                                                            if (!empty($recepit)) {
                                                            ?>
                                                                <img style="width: 100%;height: 100%;" src="<?= $site ?>/assets/deposit_slips/<?= $recepit ?>" />
                                                            <?php } else {
                                                                echo "<p>Receipt no available</p>";
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $status ?></td>
                                        <td>
                                            <form method="POST">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <?php
                                                if ($status == 'Disapproved' || $status == 'Pending') {
                                                ?>
                                                    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" href data-bs-target="#modelIdAp<?= $id ?>">
                                                        Approve
                                                    </button>
                                                    <div class="modal fade" id="modelIdAp<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Are you sure to approve ?</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="amount" value="<?= $amount ?>">
                                                                    <input type="hidden" name="u_id" value="<?= $u_id ?>">
                                                                    <button type="submit" name="approve" class="btn btn-primary">Approve</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                                if ($status == 'Pending') {
                                                ?>
                                                    <button type="submit" name="disapprove" class="btn btn-sm btn-primary">Disapprove</button>
                                                <?php } ?>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    $sr++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content End -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <?php include 'static/script.php' ?>
</body>

</html>