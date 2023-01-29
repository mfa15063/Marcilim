<?php
include "header.php";
if ($uid < 1)
    echo '<script> window.location.href = "signin.php" </script>';
extract($_POST);
if (isset($withdraw)) {
    $qq = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$uid'");
    // echo "SELECT * FROM `user` WHERE `id` = '$user_id'";
    $row = mysqli_fetch_assoc($qq);
    $trc_id = $row['trc_id'];
    if ($amount > $row['amount'])
        $alert = "<alert class='alert alert-danger'>You entered large amount</alert>";
    else if ($row['trc_pwd'] == $trc_pwd) {
        if ($amount > $row['amount'] - $row['credit']) {
            // $invitation_code = $row['invitation_code'];
            // $qq = mysqli_query($conn, "SELECT count(*) FROM `user` WHERE refferd_by = '$invitation_code'");
            // if (mysqli_fetch_array($qq)[0] >= 2) {
            //     $query = mysqli_query($conn, "INSERT INTO `withdraw`(`uid`, `amount`, `date`, `trc_id`, `status`) VALUES ('$uid', '$amount', now(), '$trc_id', 'Pending')");
            //     if ($query) {
            //         $alert = "<alert class='alert alert-success'>Successfully Saved</alert>";
            //     } else
            //         $alert = "<alert class='alert alert-danger'>Server Error</alert>";
            // } else
            $alert = "<alert class='alert alert-danger'>You Enter Large Amount <a href='terms.php'><u>see details</u></a></alert>";
        } else {
            $query = mysqli_query($conn, "INSERT INTO `withdraw`(`uid`, `amount`, `date`, `trc_id`, `status`) VALUES ('$uid', '$amount', now(), '$trc_id', 'Pending')");
            if ($query) {
                $alert = "<alert class='alert alert-success'>Successfully Saved</alert>";
            } else
                echo $alert = "<alert class='alert alert-danger'>Server Error</alert>";
        }
    } else $alert = "<alert class='alert alert-danger'>Wrong Transaction Password</alert>";
}
?>
<style>
    .alert {
        width: 70%;
        margin: auto;
        margin-bottom: 15px;
    }
</style>
<?php
include "api/functions.php";
if ($uid < 1) $amount = 0;
else $amount = GetAmount($uid)["amount"];
?>
<!-- ======= Breadcrumbs ======= -->
<section id="hero" class="hero align-items-center">
    <div class="container mt-5">
        <center>
            <h1>Withdrawal</h1>
            <p>Total Balance : <?= $amount ?></p>
            <!-- <p></p> -->
            <br>
            <a href="allwithdraw.php" class="btn btn-primary mb-3">All Withdrawals</a>
            <!-- <p>Accumulated Order Commission : 0.00</p>
            <p>Accumulated Team Commission : 0.00</p> -->
        </center>
        <div class="row justify-content-center m-0">
            <div class="card col-md-8 p-0">
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="row justify-content-center m-0">
                        <div class="col-12 card-header mb-3">
                            Submit your Withdrawal request
                        </div>
                        <?php
                        if (isset($alert)) {
                            echo $alert;
                        }
                        ?>
                        <div class="col-12 col-lg-9">
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount in USD :</label>
                                <input id="amount" type="text" class="form-control" name="amount" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <div class="mb-3">
                                <label for="btc" class="form-label">Enter transaction password: </label><br>
                                <input id="btc" class="form-control" name="trc_pwd" required>
                            </div>
                        </div>
                        <div class="mb-3 form-check col-12">
                            <center>
                                <input type="checkbox" class="form-check-input mx-auto" name="check" required>
                                <label class="ms-4 form-check-label" for="exampleCheck1"><a href="terms.php">Term And Conditions</a></label>
                            </center>
                        </div>
                        <div class="card-footer col-12">
                            <button type="submit" name="withdraw" class="btn btn-primary">Deposit</button>
                        </div>
                    </div>
                    <!-- &nbsp; -->
                </form>
            </div>
        </div>
    </div>
</section><!-- End Breadcrumbs -->

<?php include "footer.php"; ?>