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
if (isset($_POST['del'])) {
    if (!empty($_POST['u_id'])) {
        $u_id = $_POST['u_id'];
        mysqli_query($conn, "DELETE FROM `user` WHERE id = '$u_id'");
        mysqli_query($conn, "DELETE FROM `withdraw` WHERE `uid` = '$u_id'");
        mysqli_query($conn, "DELETE FROM `deposit` WHERE u_id = '$u_id'");
        mysqli_query($conn, "DELETE FROM `user_order` WHERE u_id = '$u_id'");
    }
}
if (isset($_POST['save_user'])) {
    extract($_POST);
    try {
        mysqli_query($conn, "UPDATE `user` SET `first_name`='$first_name',`last_name`='$last_name',`password`='$password',`country`='$country',`phone`='$phone',`amount`='$amount',`credit`='$credit',`trc_id`='$trc_id',`trc_pwd`='$trc_pwd' WHERE `id`='$u_id'");
    } catch (exception $ex) {
        echo "Error: " . mysqli_error($conn);
        die;
    }
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
        <?php
        include 'static/sidebar.php' ?>
        <!-- Content Start -->
        <div class="content">
            <?php include 'static/header.php' ?>
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">All Users</h6>
                    </div>
                    <?php
                    if (isset($msg)) {
                        echo `<div class="alert alert-success">$msg</div>`;
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Deposit</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Referred By</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM user");
                                $sr = 1;
                                while ($row = mysqli_fetch_assoc($query)) {
                                    extract($row);
                                ?>
                                    <tr>
                                        <td><?= $sr ?></td>
                                        <td><?= $first_name ?> <?= $last_name ?></td>
                                        <td><?= $amount ?></td>
                                        <td><?= $credit ?></td>
                                        <td><?= $email ?></td>
                                        <td><?= $country ?></td>
                                        <td>
                                            <a data-bs-toggle="modal" href data-bs-target="#refuser<?= $id ?>">
                                                View Reference Details
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="refuser<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">View User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php
                                                            $user = mysqli_query($conn, "SELECT * FROM user WHERE `invitation_code` ='$refferd_by'");
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
                                                                    <p>Password : <?= $UserRow['password'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>TRC ID : <?= $UserRow['trc_id'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>Transaction Password : <?= $UserRow['trc_pwd'] ?></p>
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
                                        <td>
                                            <a data-bs-toggle="modal" href data-bs-target="#modelIdUser<?= $id ?>">
                                                View Details
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
                                                            $user = mysqli_query($conn, "SELECT * FROM user WHERE `id` ='$id'");
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
                                                                    <p>Password : <?= $UserRow['password'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>TRC ID : <?= $UserRow['trc_id'] ?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>Transaction Password : <?= $UserRow['trc_pwd'] ?></p>
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
                                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#updateUser<?= $id ?>">Update User</button>
                                                            <form action="" method="POST">
                                                                <input type="hidden" value="<?= $UserRow['id'] ?>" name="u_id">
                                                                <button type="submit" name="del" class="btn btn-danger">Delete User</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="updateUser<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">View User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <?php
                                                        $user = mysqli_query($conn, "SELECT * FROM user WHERE `id` ='$id'");
                                                        $UserRow = mysqli_fetch_assoc($user);
                                                        ?>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="u_id" value="<?= $UserRow['id'] ?>">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p>First Name : <input required class="form-control" type="text" name="first_name" value="<?= $UserRow['first_name'] ?>"></p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>Last Name : <input required class="form-control" type="text" name="last_name" value="<?= $UserRow['last_name'] ?>"></p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>Amount : <input required class="form-control" type="text" name="amount" value="<?= $UserRow['amount'] ?>"> </p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>Deposit : <input required class="form-control" type="text" name="credit" value="<?= $UserRow['credit'] ?>"> </p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>Country : <input required class="form-control" type="text" name="country" value="<?= $UserRow['country'] ?>"> </p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>Phone no : <input required class="form-control" type="text" name="phone" value="<?= $UserRow['phone'] ?>"> </p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>Password : <input required minlength="8" class="form-control" type="text" name="password" value="<?= $UserRow['password'] ?>"></p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>TRC ID : <input required class="form-control" type="text" name="trc_id" value="<?= $UserRow['trc_id'] ?>"> </p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p>Transaction Password : <input required class="form-control" type="text" name="trc_pwd" minlength="6" maxlength="6" value="<?= $UserRow['trc_pwd'] ?>"> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="save_user" class="btn btn-success">Save</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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