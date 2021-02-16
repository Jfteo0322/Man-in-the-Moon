<?php
include("connect.php");

$id = intval($_GET['id']);

$result = mysqli_query($con, "DELETE FROM product where product_id=$id");

mysqli_close($con);
header('Location:staff.php');

 ?>
