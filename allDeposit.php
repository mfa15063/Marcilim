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
        if (move_uploaded_file($recepit['tmp_name'], $target_dir . $file_name)) {
            $query = mysqli_query($conn, "INSERT INTO `deposit`(`u_id`, `amount`, `date`, `recepit`, `status`, `unit`, `clint_trc`) VALUES ('$uid', '$amount', now(), '$file_name', 'Panding', 'USD', '$clint_trc')");
            if ($query) {
                $alert = "<alert class='alert alert-success'>Successfuly Saved</alert>";
            } else
                echo $alert = "<alert class='alert alert-danger'>Server Error</alert>";
        } else $alert = "<alert class='alert alert-danger'>Server File Error</alert>";
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
<section class="breadcrumbs">
    <div class="container">
        <center>
            <h1>All Deposit</h1>
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
                $query = mysqli_query($conn, "SELECT * FROM deposit WHERE u_id = '$uid'");
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
                                            if (!empty($recepit)) {
                                            ?>
                                                <img style="width: 100%;height: 100%;" src="assets/deposit_slips/<?= $recepit ?>" />
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