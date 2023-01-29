<?php
require "functions.php";

if (isset($_POST['withdraw'])) {
  $uid = $_POST['u_id'];
  $amount =  $_POST['amount'];
  $trc_pwd =  $_POST['trc_pwd'];
  $qq = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$uid'");
  // echo "SELECT * FROM `user` WHERE `id` = '$user_id'";
  $row = mysqli_fetch_assoc($qq);
  $trc_id = $row['trc_id'];
  $data = ["error" => true];
  if ($amount > $row['amount'])
    $data["msg"] = "You entered large amount";
  else if ($row['trc_pwd'] == $trc_pwd) {
    if ($amount > $row['amount'] - $row['credit']) {
      $invitation_code = $row['invitation_code'];
      $qq = mysqli_query($conn, "SELECT count(*) FROM `user` WHERE refferd_by = '$invitation_code'");
      if (mysqli_fetch_array($qq)[0] >= 2) {
        $query = mysqli_query($conn, "INSERT INTO `withdraw`(`uid`, `amount`, `date`, `trc_id`, `status`) VALUES ('$uid', '$amount', now(), '$trc_id', 'Pending')");
        if ($query) {
          $data["error"] = false;
          $data["msg"] = "Successfully Saved";
        } else
          $data["msg"] = "Server Error";
      } else $data["msg"] = "You Enter Large Amount `to withdraw your Credit Amount You have at least 2 referrals`";
    } else {
      $query = mysqli_query($conn, "INSERT INTO `withdraw`(`uid`, `amount`, `date`, `trc_id`, `status`) VALUES ('$uid', '$amount', now(), '$trc_id', 'Pending')");
      if ($query) {
        $data["error"] = false;
        $data["msg"] = "Successfully Saved";
      } else
        echo $data["msg"] = "Server Error";
    }
  } else $data["msg"] = "Wrong Transaction Password";
  echo json_encode($data);
}
