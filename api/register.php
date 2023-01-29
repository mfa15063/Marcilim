<?php
require "functions.php";
$res = json_decode(file_get_contents("php://input"), true);
$refferd_by = $res['refferd_by'];
$queryChec = mysqli_query($conn, "SELECT * FROM `user` WHERE `invitation_code` = '$refferd_by'");
$count2 = mysqli_num_rows($queryChec);
$email = $res['email'];
if ($count2 > 0) {
  $fetch = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email'");
  $count = mysqli_num_rows($fetch);
  if ($count > 0) {
    $message = "Your email " . $email . " is already  exist";
    echo json_encode(["error" => true, "msg" => $message]);
  } else {
    $trc_id = $res['trc_id'];
    $fetch3 = mysqli_query($conn, "SELECT * FROM user WHERE trc_id ='$trc_id'");
    $count3 = mysqli_num_rows($fetch3);
    if ($count3 > 0) {
      $message = "Your trc20 id " . $trc_id . " is already  exist";
      echo json_encode(["error" => true, "msg" => $message]);
    } else {
      if ($res) {
        echo SaveDataS("user", $res);
      }
    }
  }
} else echo json_encode(["error" => true, "msg" => "Invalid Invitation code"]);
