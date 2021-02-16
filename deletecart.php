 <?php
include("connect.php");

$id = intval($_GET['id']);

$result = mysqli_query($con, "DELETE FROM order_details where detail_id=$id");


mysqli_close($con);
header('Location:cart.php');
 ?>
