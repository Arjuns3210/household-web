<?php
error_reporting(0);
session_start();
$conn = mysqli_connect("localhost","root","","homeservices");
if (!$conn) 
{
  echo"Connection Failed.";
}
if(!isset($_SESSION['adminlogin']))
{
        header("Location: adminlogin.php");
}

//getting id  of the user which will be viewed
$id = $_GET['viewid'];
// to display previous value in the update form 
$query = "SELECT * FROM `user` WHERE id=$id";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

$name = $row['name'];
$surname = $row['surname'];
$phone = $row['phone'];
$gender = $row['gender'];
$address = $row['address'];
$pincode = $row['pincode'];
$email = $row['email'];
$date = $row['date'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View User Details</title>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            body{
                /* background-image: url(login1.jpg); */
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                font-style:Arial;
            }
            #form{
                background-color:;
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
<body style="background-color:#ADD8E6">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" id="form" style="border: #2ecc71 4px solid">
                <center class="regis mt-2"><h2>View User Details</h2></center>
                <form action="" method="POST">
                    <div class="form-group mt-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control text" placeholder="Enter name" value=<?php echo $row['name'];?> required autocomplete="off" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control text" placeholder="Enter surname" value=<?php echo $row['surname'];?> required autocomplete="off" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label>Contact Number</label>
                        <input type="text" class="form-control text" name="phone" placeholder="Enter Mobile Number" size="10" value=<?php echo $row['phone'];?> required autocomplete="off" readonly>
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
                        <input type="radio" id="gender" name="gender" value="f" readonly required
                        <?php
                        if($row['gender'] == "f")
                        {
                            echo "checked";
                        }
                        ?>
                        >Female
                        <input type="radio" id="gender" name="gender" value="o" readonly required
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
                        <textarea class="form-control" rows="6" placeholder="Enter Address" name="address" required autocomplete="off" readonly><?php echo $row['address'];?></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label>Pin Code</label>
                            <input type="text" class="form-control text" placeholder="Enter Pincode" name="pincode" value=<?php echo $row['pincode'];?> required autocomplete="off" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label>Email ID</label>
                        <input type="text" class="form-control text" placeholder="Enter Email ID" name="email" value=<?php echo $row['email'];?> required autocomplete="off" readonly> 
                    </div>

                    <!-- <div class="form-group mt-2">
                        <label>Password</label>
                        <input type="password" class="form-control text" placeholder="Enter Password" name="password" value=<?php echo $row['password'];?> required autocomplete="off">  
                    </div>
                    <div class="form-group mt-2">
                        <label>Confirm Password</label><br>
                        <input type="password" class="form-control text" placeholder="Confirm Password" name="confirmpassword" value=<?php echo $row['confirmpassword'];?> required autocomplete="off">
                    </div> -->

                    <div class="form-group offset-md-5 mt-4">
                      <a  class="btn btn-danger mx-3" href="admin.php">Back</a>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>
</html>
