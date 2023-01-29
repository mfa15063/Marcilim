<?php
require "functions.php";
$res = json_decode(file_get_contents("php://input"), true);
$data = ["error" => true];
if (isset($res['new_pwd'])){
    extract($res);
    $qq = mysqli_query($conn, "SELECT * FROM `user` WHERE `id` = '$u_id'");
    $row = mysqli_fetch_assoc($qq);
    if ($row['trc_pwd'] == $old_pwd) {
        $qq = mysqli_query($conn, "UPDATE `user` SET `trc_pwd`='$new_pwd' WHERE `id` = '$u_id'");
        if($qq){
            $data["error"] = false;
            $data["msg"] = "Successfuly Saved";
        } else $data["msg"] = "server error";
    } else {
        $data["msg"] = "Old password wrong";
    }
    echo json_encode($data);
} else echo "aisy to nh hota";