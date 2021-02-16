<?php

if ($_POST["password"] != $_POST["confirm_password"] )
{
	echo '<script>
	alert("Your password is not match!");
	window.location.href="registerstaff.php";
	</script> ';

	}
else
{
include("connect.php");

$account_username = $_POST["username"];
$account_email = $_POST["email"];
$account_password = $_POST["password"];
$account_type = "Staff";
$staff_name = $_POST["staffname"];
$staff_contact = $_POST["contactnumber"];
$staff_gender = $_POST["gender"];

$accsql = "INSERT INTO account(username,email,password,account_type)

VALUES

('$account_username','$account_email','$account_password','$account_type')";

$query = mysqli_query($con,$accsql) or die(mysqli_error($con));
$user_id = $con->insert_id;
if ($query==1)
{
	$stfsql = "INSERT INTO staff(user_id,staff_name,contact_number,gender)

VALUES

('$user_id','$staff_name','$staff_contact','$staff_gender')";
$query2 = mysqli_query($con,$stfsql) or die(mysqli_error($con));

if ($query2 ==1)
{
echo '<script>alert("A staff account has been generated!"); window.location.href="registerstaff.php";</script>';

}
}
mysqli_close($con);
}
?>
