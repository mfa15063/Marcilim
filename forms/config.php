<?php
session_start();
 //this database for uses login & admin controling.
//  $login_db = mysqli_connect("localhost", "db_user", "db_pass", "db_name");
$conn = mysqli_connect("localhost", "db_user", "db_pass", "db_name");
    // mysql_select_db('pakpurza') or die("Oops! Error in database 2 name LOGIN DATABASE");
    // if (mysqli_connect_errno()) {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //     exit();
    //   }

$site_url = "https://marcilim.com";
