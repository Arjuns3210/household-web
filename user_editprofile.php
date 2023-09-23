<?php

session_start();
$conn = mysqli_connect("localhost","root","","homeservices");
if (!$conn) 
{
  echo"Connection Failed.";
}
// if(!isset($_SESSION['loggedinId'])){
//     header("Location: loginas.php");
// }

$id=$_SESSION['loggedinId'];
$query = "SELECT * FROM user WHERE id=$id";
$result = mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$name = $row['name'];
$phone = $row['phone'];
$gender = $row['gender'];
$address = $row['address'];
$pincode = $row['pincode'];
$email = $row['email'];
$password = $row['password'];
$confirmpassword = $row['confirmpassword'];




if(isset($_POST["submit"]))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($confirmpassword, PASSWORD_BCRYPT);
    
    if($password == $confirmpassword )
    {
        $query = "UPDATE `user` set id=$id, name='$name', phone='$phone', gender='$gender', address='$address', 
        pincode=$pincode, email='$email', password='$pass', confirmpassword='$cpass' WHERE id=$id";
        $result=mysqli_query($conn,$query);
        if($result)
        {
         header("Location: userlanding.php");
        }
    }
    else
    {
        echo"<script> alert('Password Does Not Match'); </script>";
    }
}

    // Close the MySQL connection
    mysqli_close($conn);
?>

<!--  -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration page</title>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            body{
                background-image: url(login1.jpg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                font-style:Arial;
            }
            #form{
                background-color:paleturquoise;
                min-height:auto;
                padding: 5px 40px 40px 40px;

            }
            .regis
            {
                font-size: 50px;
                font-family: Arial;
                font-weight: 300;
                border-bottom-style: ridge;
            }
            .text{
                height: 35px;
            }
            label{
                font-size: 18px;
            }
        </style>
    </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" id="form">
                <center class="regis"><h2>Edit Profile</h2></center>
                <form action="" method="POST">
                    <div class="form-group mt-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control text" placeholder="Enter name" value=<?php echo $row['name'];?> required autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control text" placeholder="Enter surname" value=<?php echo $row['surname'];?> required autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Contact Number</label>
                        <input type="text" class="form-control text" name="phone" placeholder="Enter Mobile Number" size="10" value=<?php echo $row['phone'];?> required autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                    <label>Select Gender</label><br>
                        <input type="radio" id="gender" name="gender" value="m" required 
                        <?php
                        if($row['gender'] == "m")
                        {
                            echo "checked";
                        }
                        ?>
                        >Male
                        <input type="radio" id="gender" name="gender" value="f" required
                        <?php
                        if($row['gender'] == "f")
                        {
                            echo "checked";
                        }
                        ?>
                        >Female
                        <input type="radio" id="gender" name="gender" value="o" required
                        <?php
                        if($row['gender'] == "o")
                        {
                            echo "checked";
                        }
                        ?>
                        >Others
                    </div>
                    <div class="form-group mt-2">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Address" name="address" required autocomplete="off"><?php echo $row['address'];?></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label>Pin Code</label>
                            <input type="text" class="form-control text" placeholder="Enter Pincode" name="pincode" value=<?php echo $row['pincode'];?> required autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Email ID</label>
                        <input type="text" class="form-control text" placeholder="Enter Email ID" name="email" value=<?php echo $row['email'];?> required autocomplete="off"> 
                    </div>
                    <div class="form-group mt-2">
                        <label>Password</label>
                        <input type="password" class="form-control text" placeholder="Enter Password" name="password" value=<?php echo $row['password'];?> required autocomplete="off">  
                    </div>
                    <div class="form-group mt-2">
                        <label>Confirm Password</label><br>
                        <input type="password" class="form-control text" placeholder="Confirm Password" name="confirmpassword" value=<?php echo $row['confirmpassword'];?> required autocomplete="off">
                    </div>
                    <div class="form-group offset-md-4 mt-4">
                      <button type="submit" class="btn btn-success" name="submit">Update</button>
                      <a  class="btn btn-danger mx-3" href="userlanding.php">Back</a>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>
</html>