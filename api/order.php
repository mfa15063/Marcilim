<?php
require "functions.php";
$res = json_decode(file_get_contents("php://input"), true);
echo json_encode(TaskCompletion($res));
