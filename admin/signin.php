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
    if (!empty($_SESSION[my_enc(md5(admin_id))])) {
        echo "<script>window.location.href = './';</script>";
        die;
    }
    if (isset($_POST['login'])) {
        extract($_POST);
        $myIP = getIPAddress();
        $checkIP = mysqli_query($conn, "SELECT * FROM `admin_session` WHERE `ip` = '$myIP'");
        if (mysqli_num_rows($checkIP) <= 0) {
            $myMac = $_SERVER["SCRIPT_URI"];
            $myOp = $_SERVER["HTTP_USER_AGENT"];
            $myUserName = "";
            $myId = "";
            if (!empty($_SESSION['user_id'])) {
                $mail = mysqli_query($conn, "SELECT `email` FROM `user` WHERE `id` = '" . $_SESSION['user_id'] . "'");
                $myUserName = mysqli_fetch_assoc($mail)['email'];
                $myId = $_SESSION['user_id'];
            }
            mysqli_query($conn, "INSERT INTO `admin_session`(`ip`, `mac`, `op`, `username`, `u_id`) VALUES ('$myIP', '$myMac', '$myOp', '$myUserName', '$myId')");
        }
        $query = mysqli_query($conn, "SELECT * FROM `admin` where `username`='$username' AND `password`='" . my_enc(md5($pwd)) . "'");
        if ($data = mysqli_fetch_assoc($query)) {
            $_SESSION[my_enc(md5(admin_id))] = md5($data['id']);
            $_SESSION['fingerprint'] = md5($_SERVER['HTTP_USER_AGENT'] . admin_id . $_SERVER['REMOTE_ADDR']);
            // die;
            mysqli_query($conn, "UPDATE `admin_session` SET `name`='LoggedIn' WHERE `ip` = '$myIP'");
            echo "<script>window.location.href = './';</script>";
        } else {
            $msg = '<div class="alert alert-danger">invalid Username / Password</div>';
        }
    }
    ?>
</head>

<body>




    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"> <span class="sr-only">Loading...</span>

            </div>
        </div>
        <!-- Spinner End -->
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="text-center">
                                <h3 class="text-primary"><img style="max-height: 80px;margin-right: 6px;" src="img/logo.png" /></h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <?php
                        if (isset($msg)) {
                            echo $msg;
                        }
                        ?>
                        <form method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" name="pwd" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
    <?php include 'static/script.php' ?>
</body>

</html>