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
<?php
if (isset($_POST['approve'])) {
    // print_r($_FILES);
    extract($_POST);
    $qq = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$u_id'");
    $row = mysqli_fetch_assoc($qq);
    if ($amount > $row['amount']) {
        echo 'This User not have enough Amount to withdraw';
        die;
    } else {
        $rrrr = mysqli_query($conn, "SELECT `status` FROM `withdraw` WHERE `id`='$id'");
        $rrr = mysqli_fetch_assoc($rrrr);
        if ($rrr['status'] != "Approved") {
            $r_date = date("Y-m-d");
            $r_withdraw = $amount;
            mysqli_query($conn, "UPDATE `user` SET `amount`=amount-$amount WHERE `id`='$u_id'");
            mysqli_query($conn, "UPDATE `withdraw` SET `status`='Approved' WHERE id ='$id'");
            
            $r_query = mysqli_query($GLOBALS['conn'], "SELECT * FROM `balance_report` WHERE `user_id` = '$u_id' AND `date` = '$r_date'");
            if (mysqli_num_rows($r_query)>0){
                mysqli_query($GLOBALS['conn'], "UPDATE `balance_report` SET `report_withdraw` = `report_withdraw` + '$r_withdraw' WHERE `user_id` = '$u_id' AND `date` = '$r_date'");
            } else {
                mysqli_query($GLOBALS['conn'], "INSERT INTO `balance_report`(`user_id`, `report_withdraw`, `date`) VALUES ('$u_id', '$r_withdraw', '$r_date')");
            }
        }
    }
}
if (isset($_POST['disapprove'])) {
    extract($_POST);
    $update = mysqli_query($conn, "UPDATE `withdraw` SET `status`='Disapproved' WHERE id ='$id'");
}
?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <?php include 'static/sidebar.php' ?>

        <!-- Content Start -->
        <div class="content">
            <?php include 'static/header.php' ?>
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Withdraw Request</h6>
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
                                $query = mysqli_query($conn, "SELECT * FROM withdraw");
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
                                                            $user = mysqli_query($conn, "SELECT * FROM user WHERE `id` ='$uid'");
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
                                        <td><?= $amount ?></td>
                                        <td><?= $date ?></td>

                                        <td>
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
                                                            if (!empty($recipt)) {
                                                            ?>
                                                                <img style="width: 100%;height: 100%;" src="img/withdraw_slips/<?= $recipt ?>" />
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
                                            <form method="POST" enctype="multipart/form-data">
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
                                                                    <input type="hidden" name="u_id" value="<?= $uid ?>">
                                                                    <button type="submit" name="approve" class="btn btn-primary">Approve</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </form>

                                            <form method="POST">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <?php
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