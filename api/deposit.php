<?php
require "functions.php";

if (isset($_POST['deposit'])) {
  $u_id = $_POST['u_id'];
  $amount =  $_POST['amount'];
  $trc_pwd =  $_POST['trc_pwd'];
  $data = ["error" => true];
  extract($_FILES);
  $target_dir = '../assets/deposit_slips/';
  $file_name = $uid . time() . $recepit['name'];
  // print_r($recepit);
  $type = explode("/", $recepit['type'])[0];
  if ($type == 'image') {
      $qq = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$u_id'");
      // echo "SELECT * FROM `user` WHERE `id` = '$user_id'";
      $row = mysqli_fetch_assoc($qq);
      $trc_id = $row['trc_id'];
      if ($row['trc_pwd'] == $trc_pwd)
          if (move_uploaded_file($recepit['tmp_name'], $target_dir . $file_name)) {
              $query = mysqli_query($conn, "INSERT INTO `deposit`(`u_id`, `amount`, `date`, `recepit`, `status`, `unit`, `clint_trc`) VALUES ('$u_id', '$amount', now(), '$file_name', 'Pending', 'USD', '$trc_id')");
              if ($query) {
                $data["error"] = false;
                $data["msg"] = "Successfully Deposit";
              } else
              $data["msg"] = "Server Error";
          } else $data["msg"] = "Server File Error";
      else $data["msg"] = "Wrong Transaction Password";
  } else $data["msg"] = "only Image file Allowed".json_encode($recepit);
  echo json_encode($data);
}