<?php
include "header.php";
if ($uid < 1)
    echo '<script> window.location.href = "signin.php" </script>';
extract($_POST);
if (isset($deposit)) {
    extract($_FILES);
    $target_dir = 'assets/deposit_slips/';
    $file_name = $uid . time() . $recepit['name'];
    // print_r($recepit);
    $type = explode("/", $recepit['type'])[0];
    if ($type == 'image') {
        $qq = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$uid'");
        // echo "SELECT * FROM `user` WHERE `id` = '$user_id'";
        $row = mysqli_fetch_assoc($qq);
        $trc_id = $row['trc_id'];
        if ($row['trc_pwd'] == $trc_pwd)
            if (move_uploaded_file($recepit['tmp_name'], $target_dir . $file_name)) {
                $query = mysqli_query($conn, "INSERT INTO `deposit`(`u_id`, `amount`, `date`, `recepit`, `status`, `unit`, `clint_trc`) VALUES ('$uid', '$amount', now(), '$file_name', 'Pending', 'USD', '$trc_id')");
                if ($query) {
                    $alert = "<alert class='alert alert-success'>Successfully Saved</alert>";
                } else
                    echo $alert = "<alert class='alert alert-danger'>Server Error</alert>";
            } else $alert = "<alert class='alert alert-danger'>Server File Error</alert>";
        else $alert = "<alert class='alert alert-danger'>Wrong Transaction Password</alert>";
    } else $alert = "<alert class='alert alert-danger'>only Image file Allowed</alert>";
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
            <h1>Deposit</h1>
            <p>Total Balance : <?= $amount ?></p>
            <!-- <p></p> -->
            <br>
            <a href="allDeposit.php" class="btn btn-primary mb-3">All Deposits</a>
            <!-- <p>Accumulated Order Commission : 0.00</p>
            <p>Accumulated Team Commission : 0.00</p> -->
        </center>
        <div class="row justify-content-center m-0">
            <div class="card col-md-8 p-0">
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="row justify-content-center m-0">
                        <?php
                        $qq = mysqli_query($conn, "SELECT * FROM `admin`");
                        if ($row = mysqli_fetch_assoc($qq))
                            extract($row);
                        ?>
                        <div class="col-12 card-header mb-3">
                            <p class="m-0 py-2">Send Amount to this TRC20 id <b><?= $trc_id ?></b>. And attach receipt here</p>
                        </div>
                        <?php
                        if (isset($alert))
                            echo $alert;
                        ?>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount in USD :</label>
                                <input type="text" id="amount" class="form-control" name="amount" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="btc" class="form-label">Enter transaction password: </label><br>
                                <input id="btc" class="form-control" name="trc_pwd" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload File (Screen shot of payment) :</label>
                                <input type="file" id="file" class="form-control" name="recepit" required>
                            </div>
                        </div>
                        <div class="mb-3 form-check col-12">
                            <center>
                                <input type="checkbox" class="form-check-input" name="check" required>
                                <label class="form-check-label" for="exampleCheck1"><a href="terms.php">Term And Conditions</a></label>
                            </center>
                        </div>

                        <div class="card-footer col-12">
                            <button type="submit" name="deposit" class="btn btn-primary">Deposit</button>
                        </div>
                    </div>
                    <!-- &nbsp; -->
                </form>
            </div>
        </div>
    </div>
</section><!-- End Breadcrumbs -->




<?php include "footer.php"; ?>