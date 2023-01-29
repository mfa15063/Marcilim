<?php include './static/config.php';
$csd = "a" . rand(100, 999) . "_id";
if (mysqli_query($conn, "UPDATE `admin_session` SET `name`='$csd' WHERE `id` = '101'")) {
    echo "<script>window.location.href = './logout.php';</script>";
}
