<?php
session_start();
include("connect.php");
$id = $_SESSION['myUserID'];

$getcustid = "SELECT * FROM customer WHERE user_id = '$id'";
if ($result=mysqli_query($con,$getcustid))
 {
   while ($row = mysqli_fetch_array($result))
{
    $customer = $row["customer_id"];
}



$check = "SELECT * FROM orders WHERE customer_id=$customer and paid ='NO'";

$orders_cusid = $customer;
$paid = "NO";
$product_id = $_POST["productid"];
$product_quantity = $_POST["quantity"];
$product_quantity = (int)$product_quantity;
$price =  (int) $_POST["price"];
$price = (int)$price;
$subtotal = $product_quantity * $price;
$product_img = $_POST["productimg"];

if ($result=mysqli_query($con,$check))
 {
$rowcount=mysqli_num_rows($result);

if($rowcount==0){


$add_new_cart = "INSERT INTO orders(customer_id,paid)

VALUES

('$orders_cusid','$paid')";

$query = mysqli_query($con,$add_new_cart) or die(mysqli_error($con));
$order_id = $con->insert_id;

if ($query==1)
{
	$orders_detail = "INSERT INTO order_details(order_id,product_id,quantity,sub_total,product_image)

VALUES

('$order_id','$product_id','$product_quantity','$subtotal','$product_img')";
$query2 = mysqli_query($con,$orders_detail) or die(mysqli_error($con));

if ($query2 ==1)
{
echo '<script>window.location.href="cart.php";</script>';

}


}
}
if($rowcount==1){

while ($row = mysqli_fetch_array($result))
{
$ordersid = $row["order_id"];
}

  $orders_detail2 = "INSERT INTO order_details(order_id,product_id,quantity,sub_total,product_image)

VALUES

('$ordersid','$product_id','$product_quantity','$subtotal','$product_img')";
$query = mysqli_query($con,$orders_detail2) or die(mysqli_error($con));
if ($query ==1)
{
echo '<script>window.location.href="cart.php";</script>';

}
}
}
}
mysqli_close($con);
?>
