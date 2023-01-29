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
if (isset($_POST['update'])) {
    extract($_POST);
    $update = mysqli_query($conn, "UPDATE `admin` SET `email`='$email',`whatsapp`='$whatsNum',`telegram`='$TelNum',`trc_id`='$trc_id'");
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
                        <h6 class="mb-0">Setting Profile</h6>
                    </div>
                    <form method="POST">
                    <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="email" value="<?=$row['email']?>" id="floatingInput" placeholder="Email">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="whatsNum" value="<?=$row['whatsapp']?>" id="floatingInput" placeholder="Whatsapp">
                            <label for="floatingInput">Whatsapp Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="TelNum" value="<?=$row['telegram']?>" id="floatingInput" placeholder="Telegram">
                            <label for="floatingInput">Telegram Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="trc_id" value="<?=$row['trc_id']?>" id="floatingInput" placeholder="TRC">
                            <label for="floatingInput">TRC ID</label>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary py-3 w-100 mb-4">Update</button>

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