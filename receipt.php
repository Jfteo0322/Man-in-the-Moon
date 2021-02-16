<?php
include("connect.php");
$order_id = $_POST["orderid"];
$customer_name = $_POST["name"];
$email = $_POST["email"];
$address = $_POST["address"];
$total_price = $_POST["totalprice"];
$card_number = $_POST["cardnumber"];
$fullname_card = $_POST["cardname"];


$sql = "INSERT INTO receipt(order_id,customer_name,email,address,total_price,card_number,fullname_card)

VALUES

('$order_id','$customer_name','$email','$address','$total_price','$card_number','$fullname_card')";

$query = mysqli_query($con,$sql) or die(mysqli_error($con));
if ($query==1)
{
	$pay = "UPDATE orders SET
paid='YES'
WHERE order_id=$order_id;";
;
$query2 = mysqli_query($con,$pay) or die(mysqli_error($con));
if ($query2==1){
echo '<script>alert("Your payment is successful!"); window.location.href="Mainpage.html";</script>';
}
}
mysqli_close($con);
?>
