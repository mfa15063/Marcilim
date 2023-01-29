
<?php
// echo "o";
require "functions.php";
$res = $_POST;
$res = json_decode(file_get_contents("php://input"), true);

if (isset($res['email']) && isset($res['pwd'])) {
  echo json_encode(Login($res));
} else echo json_encode(["error" => true, "msg" => "Email and Password Required"]);
