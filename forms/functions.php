<?php
//session start
// session_start();
include "config.php";
extract($_POST);
if (isset($signup)) {
    $fetch = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email'");
    $count = mysqli_num_rows($fetch);
    if ($count > 0) {
        $message = "Your email " . $email . " is already  exist";
        header("Location: ../signup.php?msg=" . $message);
    } else {
        $fetch3 = mysqli_query($conn, "SELECT * FROM user WHERE trc_id ='$trc_id'");
        $count3 = mysqli_num_rows($fetch3);
        if ($count3 > 0) {
            $message = "Your trc20 id " . $trc_id . " is already  exist";
            header("Location: ../signup.php?msg=" . $message);
        } else {
            if ($con_password != $password) {
                $message = "Your password and confirm password not match";
                header("Location: ../signup.php?msg=" . $message);
            } else {
                $queryChec = mysqli_query($conn, "SELECT * FROM `user` WHERE `invitation_code` = '$refferd_by'");
                $count2 = mysqli_num_rows($queryChec);
                if ($count2 > 0) {
                    $query = mysqli_query($conn, "INSERT INTO `user` 
                    ( `first_name`, `last_name`, `password`, `refferd_by`, `email`, `phone`, `country`, `trc_id`, `trc_pwd`) VALUES 
                    ( '$first_name','$last_name','$password','$refferd_by','$email','$phone','$country','$trc_id','$trc_pwd')");
                    if ($query) {
                        $idd = mysqli_insert_id($conn);
                        mysqli_query($conn, "UPDATE `user` SET `invitation_code`='marcilim-$idd' WHERE `id`='$idd'");
                        session_start();
                        $_SESSION['user_id'] = $idd;
                        header("Location: ../profile.php");
                    } else {
                        $message = "Server Error";
                        header("Location: ../signup.php?msg=" . $message);
                    }
                } else {
                    $message = "Invalid referral code";
                    header("Location: ../signup.php?msg=" . $message);
                }
            }
        }
    }
}

// if ($recovery_mail != $Email) :
// else :
// $Error = "<div class='alert alert-danger'>Your Email and  Recovery Email should not be same!</div>";
// endif;
// require "config.php";
//login check function
// function loggedin()
// {
// if (isset($_SESSION['username'])||isset($_COOKIE['username']))
// {
// $loggedin = TRUE;
// return $loggedin;
// }
// }


if (isset($login)) {
    $query = mysqli_query($conn, "SELECT * FROM  user WHERE `email`='$email' AND `password`='$password'") or die("Error with querry");
    $row = mysqli_fetch_array($query);
    // extract($row);
    if ($row) {
        session_start();
        $_SESSION['user_id'] = $row['id'];
        header("Location: ../dashboard.php");
        // print_r($_SESSION['user_id']);
    } else {
        header("Location: ../signin.php");
    }
}
