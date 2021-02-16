<html>
<head>
    <link href="css/editS.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>
<body>

      <div class="staffwrap">

  <?php
include("connect.php");
$id = intval($_GET['id']);
$result = mysqli_query($con,"SELECT * FROM account, staff WHERE account.user_id = staff.user_id and account.user_id=$id");
while($row = mysqli_fetch_array($result))
{
?>

<form action="updateS.php" method="POST">
          <div class="leftinfo">
          User ID:
          <input type="text" name="userid" id="userid" value="<?php echo $row['user_id']?>" readonly style="color:white;">
          Username:
          <input type="text" name="username" id="input" placeholder="<?php echo $row['username']?>" value="<?php echo $row['username']?>" required>
          Email:
          <input type="text" name="email" id="input" placeholder="<?php echo $row['email']?>" value="<?php echo $row['email']?>" required>
          Password:
          <input type="text" name="password" id="input" placeholder="<?php echo $row['password']?>" value="<?php echo $row['password']?>" required>
          Account Type:
          <select name="type" id="input" required>
            <option value="Admin">Admin</option>
            <option value="Staff"selected>Staff</option>
            <option value="Customer">Customer</option>
          </select>

          </div>


          <div class="rightinfo">
          Staff ID:
          <input type="text" name="staffid" id="customerid" value="<?php echo $row['staff_id']?>" readonly>
          Staff Name:
          <input type="text" name="staff_name" id="input" value="<?php echo $row['staff_name']?>"required>
          Contact Number:
          <input type="number" name="contact_number" id="input" value="<?php echo $row['contact_number']?>" required>
          Gender
          <select name="gender" id="input" required>
            <option value="">Please Select</option>
            <option value="Male"<?php if ($row['gender'] == "Male") { ?>selected="selected"<?php } ?>>Male</option>
            <option value="Female"<?php if ($row['gender'] == "Female") { ?>selected="selected"<?php } ?>>Female</option>
          </select>
          </div>
          <div class="bottominfo">
            <div style="float:left;">
        <input type="submit" name="edit" id="btn" value="Finish Edit" style="background-color:#64bd37;">
      </div>
      <div class="deletebtn">
            <?php echo '<a href="DeleteS.php?id='.$row['user_id'].'" style="text-decoration:none;color:white;" onClick="return confirm(\'Are you sure you want to delete?\');">Delete</a>';?>
        </div>
      </div>
</form>
<?php
}
mysqli_close($con);
?>
</div>

</body>
</html>
