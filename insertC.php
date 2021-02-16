<?php
if ($_POST["password"] != $_POST["confirm_password"] )
{
	echo '<script>
	alert("Your password is not match!");
	window.location.href="register.php";
	</script> ';

	}
else
{
include("connect.php");

$account_username = $_POST["username"];
$account_email = $_POST["email"];
$account_password = $_POST["password"];
$account_type = "Customer";
$customer_name = $_POST["customername"];
$customer_contact = $_POST["contact_number"];
$customer_address = $_POST["address"];
$customer_dob = $_POST["dob"];

$accsql = "INSERT INTO account(username,email,password,account_type)

VALUES

('$account_username','$account_email','$account_password','$account_type')";

$query = mysqli_query($con,$accsql) or die(mysqli_error($con));
$user_id = $con->insert_id;
if ($query==1)
{
	$cussql = "INSERT INTO customer(user_id,customer_name,contact_number,address,dob)

VALUES

('$user_id','$customer_name','$customer_contact','$customer_address','$customer_dob')";
$query2 = mysqli_query($con,$cussql) or die(mysqli_error($con));
if ($query2==1)
{
echo '<script>alert("Your account is registered and successed!"); window.location.href="Login.php";</script>';

}


}
mysqli_close($con);
}
?>
