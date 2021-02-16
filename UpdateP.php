<?php
include("connect.php");

if($_FILES["upload"]["error"] == 4) {

$sql = "UPDATE product SET
product_name='$_POST[productname]',
price='$_POST[productprice]',
categories='$_POST[categories]',
description='$_POST[desc]'
WHERE product_id=$_POST[productid];"
;

}
else{

  $target_dir = "images/";
$target_file = $target_dir.basename($_FILES["upload"]["name"]);

move_uploaded_file($_FILES["upload"]["tmp_name"],$target_file);
$file_name = basename($_FILES["upload"]["name"]);

$sql = "UPDATE product SET
product_name='$_POST[productname]',
price='$_POST[productprice]',
categories='$_POST[categories]',
description='$_POST[desc]',
image= '$file_name'
WHERE product_id=$_POST[productid];"
;
}

$query = mysqli_query($con,$sql) or die(mysqli_error($con));
if ($query==1)
{
echo '<script>alert("The product is updated");
window.location.href = "staff.php";
</script>';
}
mysqli_close($con);



?>
