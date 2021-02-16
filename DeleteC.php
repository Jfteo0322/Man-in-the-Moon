<?php
include("connect.php");

$id = intval($_GET['id']);

$result = mysqli_query($con, "DELETE FROM account where user_id=$id");
$result2 = mysqli_query($con, "DELETE FROM customer where user_id=$id");

mysqli_close($con);

 ?>
