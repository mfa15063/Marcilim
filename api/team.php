<?php
require "functions.php";
$res = $_POST;
if(!empty($res['invitation_code']))
    echo json_encode(GetTeam($res['invitation_code']));
