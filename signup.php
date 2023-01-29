<?php include "header.php";
if (isset($_GET['frm'])) {
    $frm = "value='" . $_GET['frm'] . "'";
} else {
    $frm = "";
}
?>

<body background="assets/img/hero-bg.png">
    <!-- <div class="bg"> -->
    <div class="formcontainersignup col-10 col-md-8 col-lg-6 mx-auto">
        <h1>
            <center>SIGN UP</center>
        </h1>
        <form method="POST" enctype="multipart/form-data" action="forms/functions.php">
            <div class="row">
                <?php if (isset($_GET['msg'])) : ?>
                    <div class="alert alert-danger col-8 mx-auto mb-5"><?= $_GET['msg'] ?></div>
                <?php endif ?>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" required name="first_name" aria-describedby="name">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" required name="last_name" aria-describedby="name">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" class="form-control" name="phone" aria-describedby="name">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" id="email" class="form-control" name="email" required aria-describedby="emailHelp">
                        <div name="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="refferd_by" class="form-label">Referred By</label>
                        <input type="text" <?= $frm ?> class="form-control" id="refferd_by" name="refferd_by" required aria-describedby="name">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" aria-describedby="name">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" minlength="8" required class="form-control" name="password">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="con_password" class="form-label">Confirm Password</label>
                        <input type="password" id="con_password" minlength="8" name="con_password" required class="form-control">
                    </div>
                </div>
                <div class="col-12"><label for="">Transaction Details: </label></div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="trc_id" class="form-label">TRC20 id:</label>
                        <input type="text" class="form-control" required id="trc_id" name="trc_id" aria-describedby="name">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="trc_pwd" class="form-label">Transaction Password</label>
                        <input type="password" id="trc_pwd" minlength="6" maxlength="6" required class="form-control" name="trc_pwd">
                    </div>
                </div>
                <center><button type="submit" name="signup" class="btn btn-primary">SIGN UP</button></center>
                &nbsp;

            </div>
        </form>
        <center><a href="signin.php">I already have an account!</a></center>
    </div>

    <?php include "footer.php"; ?>