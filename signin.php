<?php include "header.php";?>

    <body background="assets/img/hero-bg.png">
        <!-- <div class="bg"> -->
            <div class="formcontainersignup col-10 col-lg-5 col-md-7 mx-auto">
                <h1><center>SIGN IN</center></h1>
                <form method="POST" enctype="multipart/form-data" action="forms/functions.php">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <center><input type="submit" name="login" class="btn btn-primary" value="Sign in"></center>
                    &nbsp;
                </form>
                <center><a href="signup.php">I Don't have an account!</a></center>
            </div>

<div class="footers">

<?php include "footer.php";?>
