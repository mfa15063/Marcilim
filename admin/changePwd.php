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
$query = mysqli_query($conn, "SELECT * FROM `admin` ");
$row = mysqli_fetch_assoc($query);
if (isset($_POST['change'])) {
    extract($_POST);
    if (my_enc(md5($oldPwd)) == $row['password']) {
        if ($newPwd == $cNewPwd) {
            $update = mysqli_query($conn, "UPDATE `admin` SET `password`='".my_enc(md5($newPwd))."'");
            $msgg = '<div class="alert alert-success"> Change successfully</div>';
        }
        else{
        $msg = '<div class="alert alert-danger"> password not match</div>';
        }
    }else{
        $msg = '<div class="alert alert-danger">! Invalid Old Password</div>';
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
            <div class="container-fluid pt-4 px-4 d-flex justify-content-center">
                <div class="bg-light text-center rounded p-4 col-8">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Change Password</h6>
                    </div>
                    <?php 
if(isset($msgg)){
 echo $msgg;
}
if(isset($msg)){
    echo $msg;
   }

                    ?>
                    <form method="POST">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="oldPwd" id="floatingInput" placeholder="Old Password">
                            <label for="floatingInput">Old Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="newPwd" id="floatingInput" placeholder="New Password">
                            <label for="floatingInput">New Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="cNewPwd" id="floatingInput" placeholder="confirm Password">
                            <label for="floatingInput">Confirm Password</label>
                        </div>
                        <button type="submit" name="change" class="btn btn-primary py-3 w-100 mb-4">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Content End -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <?php include 'static/script.php' ?>
</body>

</html>