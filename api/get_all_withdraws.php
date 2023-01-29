<?php
require "functions.php";
$res = json_decode(file_get_contents("php://input"), true);
$data = ["error" => false];
$uid = $res['u_id'];
$temp_data = [];
$j=1;
$query = mysqli_query($conn, "SELECT * FROM `withdraw` WHERE `uid`='$uid'");
while($row = mysqli_fetch_assoc($query)){ 
	$row['sr'] = $j.".";
    	array_push($temp_data, $row);
	$j++;
}
$data["msg"] = "Successfuly Saved";
$data["data"] = $temp_data;
echo json_encode($data);
