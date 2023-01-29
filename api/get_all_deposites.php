<?php
require "functions.php";

$data = ["error" => false];
$uid = $_POST['u_id'];
$temp_data = [];
$j=1;
$query = mysqli_query($GLOBALS["conn"], "SELECT * FROM `deposit` where `u_id`='$uid'");
while($row = mysqli_fetch_assoc($query)){
    $row['sr'] = $j.".";
    array_push($temp_data, $row);
    $j++;
}

$data["msg"] = "Successfuly Saved";
$data["data"] = $temp_data;
echo json_encode($data);
