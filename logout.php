<?php
session_start();
extract($_GET);
unset($_SESSION[$logout]);
if($logout=='user_id')
    echo '<script> window.location.href = "signin.php" </script>';
else if($logout=='admin_id') echo '<script> window.location.href = "https://admin.marcilim.com/" </script>';
?>