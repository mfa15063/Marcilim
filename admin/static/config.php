<?php 
$conn = mysqli_connect("localhost", "db_user", "db_pass", "db_name");
$site ='https://marcilim.com';
$query = mysqli_query($conn, "SELECT `name` FROM `admin_session` WHERE `id` = '101'");
define("admin_id", mysqli_fetch_assoc($query)['name']);

function my_enc($val){
    $or = "1234567890!@#$%^&*()qwertyuiopasdfghjklzxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM<>.,?/";
    $xp = "!@#$%^&*()BNM<>.,?/a1290qwertyuiopCVsdfghjcvbnmGFDSAZX3456QWERTYUIOPklzxLKJH78";
    $new = "";
    for ($i=0; $i < strlen($val); $i++) { 
        if (strpos($or, $val[$i])) {
            $new .= $xp[strpos($or, $val[$i])];
        } else {
            $new .= $val[$i];
        }
    }
    return $new;
}

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}
