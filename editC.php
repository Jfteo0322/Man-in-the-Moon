<html>
<head>
    <link href="css/editC.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>
<body>

        <div class="customerwrap" style="color:black;">
<?php
include("connect.php");
$id = intval($_GET['id']);
$result = mysqli_query($con,"SELECT * FROM account, customer WHERE account.user_id = customer.user_id and account.user_id=$id");
while($row = mysqli_fetch_array($result))
{
?>
 <form action="updateC.php" method="POST">
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
            <option value="Staff">Staff</option>
            <option value="Customer" selected>Customer</option>
          </select>

          </div>


          <div class="rightinfo">
          Customer ID:
          <input type="text" name="customerid" id="customerid" value="<?php echo $row['customer_id']?>" readonly>
          Customer Name:
          <input type="text" name="customer_name" id="input" placeholder="<?php echo $row['customer_name']?>" value="<?php echo $row['customer_name']?>" required>
          Contact Number:
          <input type="number" name="contact_number" id="input" placeholder="<?php echo $row['contact_number']?>" value="<?php echo $row['contact_number']?>" required>
          Address:
          <textarea name="address" id="input" rows="4" cols="50" placeholder="<?php echo $row['address']?>" required><?php echo $row['address']?></textarea>
          Date of birth:
          <input type="date" name="dob" id="input" value="<?php echo $row['dob']?>" required>

          </div>
          <div class="bottominfo">
            <div style="float:left;">
        <input type="submit" name="edit" id="btn" value="Finish Edit" style="background-color:#64bd37;">
      </div>
      <div class="deletebtn">
            <?php echo '<a href="DeleteC.php?id='.$row['user_id'].'" style="text-decoration:none;color:white;" onClick="return confirm(\'Are you sure you want to delete?\');">Delete</a>';?>
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
