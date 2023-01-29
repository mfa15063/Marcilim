<?php
include "header.php";
if ($uid < 1)
    echo '<script> window.location.href = "signin.php" </script>';
extract($_POST);
if (isset($withdraw)) {
    $qq = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$uid'");
    // echo "SELECT * FROM `user` WHERE `id` = '$user_id'";
    $row = mysqli_fetch_assoc($qq);
    if ($row['trc_id'] == $clint_trc || empty($row['trc_id'])){
        if ($amount > $row['amount'] - $row['credit']) {
            $invitation_code = $row['invitation_code'];
            $qq = mysqli_query($conn, "SELECT count(*) FROM `user` WHERE refferd_by = '$invitation_code'");
            if (mysqli_fetch_array($qq)[0] >= 2) {
                $query = mysqli_query($conn, "INSERT INTO `withdraw`(`uid`, `amount`, `date`, `trc_id`, `status`) VALUES ('$uid', '$amount', now(), '$clint_trc', 'Pending')");
                if ($query) {
                    $alert = "<alert class='alert alert-success'>Successfully Saved</alert>";
                } else
                    $alert = "<alert class='alert alert-danger'>Server Error</alert>";
            } else $alert = "<alert class='alert alert-danger'>You Enter Large Amount <a href='terms.php'><u>see details</u></a></alert>";
        } else {
            $query = mysqli_query($conn, "INSERT INTO `withdraw`(`uid`, `amount`, `date`, `trc_id`, `status`) VALUES ('$uid', '$amount', now(), '$clint_trc', 'Pending')");
            if ($query) {
                $alert = "<alert class='alert alert-success'>Successfully Saved</alert>";
            } else
                echo mysqli_error($conn);//$alert = "<alert class='alert alert-danger'>Server Error</alert>";
        }
    } else $alert = "<alert class='alert alert-danger'>You can not able to change your TRC20 id. <a href='terms.php'><u>see details</u></a></alert>";
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
<section class="breadcrumbs">
    <div class="container">
        <center>
            <h1>Withdrawal</h1>
            <p>Total Balance : <?= $amount ?></p>
            <!-- <p></p> -->
            <br>
            <!-- <p>Accumulated Order Commission : 0.00</p>
            <p>Accumulated Team Commission : 0.00</p> -->
        </center>

    </div>
</section><!-- End Breadcrumbs -->

<div class="addbalance">
    <h1>
        <!-- <center>ADD BALANCE</center> -->
    </h1>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-dark">
                    <th scope="col">#</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Receipt</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $uid = $_SESSION['user_id'];
                $query = mysqli_query($conn, "SELECT * FROM withdraw WHERE `uid` = '$uid'");
                $sr = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                    extract($row);
                ?>
                
                    <tr>
                        <td><?= $sr ?></td>
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
                                            if (!empty($recipt)) {
                                            ?>
                                                <img style="width: 100%;height: 100%;" src="admin/img/withdraw_slips/<?=$recipt ?>" />
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
                        
                    </tr>
                <?php
                    $sr++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "footer.php"; ?>