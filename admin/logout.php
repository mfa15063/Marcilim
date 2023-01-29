<?php
session_start();
include 'config.php';
unset($_SESSION[admin_id]);
$_SESSION = [];
echo '<script> window.location.href = "signin.php" </script>';
?>