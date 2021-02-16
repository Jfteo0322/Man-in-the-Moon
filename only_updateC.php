<?php
include("connect.php");
$accUP = "UPDATE account SET
username='$_POST[username]',
email='$_POST[email]',
password='$_POST[password]'
WHERE user_id=$_POST[userid]"
;

$query = mysqli_query($con,$accUP) or die(mysqli_error($con));
if ($query==1)
{
  $cusUP = "UPDATE customer SET
customer_name='$_POST[customer_name]',
contact_number='$_POST[contact_number]',
address='$_POST[address]',
dob='$_POST[dob]'
WHERE user_id=$_POST[userid]";

$query2 = mysqli_query($con,$cusUP) or die(mysqli_error($con));
if ($query2==1){

echo '<script>alert("Your profile is now updated!"); window.location.href="customerprofile.php";</script>';

}
}

mysqli_close($con);
?>
