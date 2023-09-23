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

$id = $_GET['viewid'];
$query = "SELECT * FROM `sprovider` WHERE id=$id";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

$name = $row['name'];
$surname = $row['surname'];
$phone = $row['phone'];
$gender = $row['gender'];
$address = $row['address'];
$pincode = $row['pincode'];
$email = $row['email'];
// $password = $row['password'];
// $confirmpassword = $row['confirmpassword'];
$profession = $row['profession'];
$experience = $row['experience'];
$salary = $row['salary'];
$image = $row['image'];
// $date = $row['date'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Profile</title>
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
                <center class="regis"><h1>View Service Provider Details</h1></center>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-2">
                        <center><img src="images/<?php echo $image;?>" class="img-fluid rounded-circle" height="100" width="150" alt="No Image"><br></center>
                    </div>
                    <div class="form-group mt-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control text" placeholder="Enter full name" value=<?php echo $row['name'];?> required pattern="[A-Za-z]{3,20}" autocomplete="off" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control text" placeholder="Enter surname" value=<?php echo $row['surname'];?> required pattern="[A-Za-z]{3,20}" autocomplete="off" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label>Contact Number</label>
                        <input type="text" class="form-control text" name="phone" placeholder="Enter Mobile Number" size="10" value=<?php echo $row['phone'];?> maxlength="10" required pattern="[0-9]{10}" autocomplete="off" readonly>
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
                        <textarea class="form-control" rows="3" placeholder="Enter Address" name="address" required pattern="[A-Za-z0-9]{3,60}" autocomplete="off" readonly><?php echo $row['address'];?></textarea>
                    </div>
                    <div class="form-group mt-2">
                    <label>Date of Birth</label>
                        <input type="date" class="form-control text" placeholder="Enter DOB" id="dob" name="dob" max="<?php echo date('Y-m-d'); ?>" required pattern="\d{2}\/\d{2}\/\d{4}" autocomplete="off" value=<?php echo $row['dob'];?> readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label>Pin Code</label>
                            <input type="text" class="form-control text" placeholder="Enter Pincode" name="pincode" value=<?php echo $row['pincode'];?> maxlength="6" required pattern="[0-9]{6}" autocomplete="off" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label>Email ID</label>
                        <input type="text" class="form-control text" placeholder="Enter Email ID" name="email" value=<?php echo $row['email'];?> required autocomplete="off" readonly> 
                    </div>
                    
                    <!-- <div class="form-group mt-2">
                        <label>Password</label>
                        <input type="password" class="form-control text" placeholder="Enter Password" name="password" value=<?php echo $row['password'];?> required pattern=".{6,}" autocomplete="off">  
                    </div>
                    <div class="form-group mt-2">
                        <label>Confirm Password</label><br>
                        <input type="password" class="form-control text" placeholder="Retype Password" name="confirmpassword" value=<?php echo $row['confirmpassword'];?> required pattern=".{6,}" autocomplete="off">
                    </div> -->
                   
                    <div class="form-group mt-2">
                        <label>Experience</label>
                        <input type="text" name="experience" class="form-control text" placeholder="Experience in years" value=<?php echo $row['experience'];?> min="0" maxlength="4" required pattern="\d{1,2}(\.\d{1,2})?" autocomplete="off" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label>Salary</label>
                        <input type="text" name="salary" class="form-control text" placeholder="Required Salary" value=<?php echo $row['salary'];?> maxlength="8" required pattern="[0-9]{3,8}" autocomplete="off" readonly>
                    </div>
                    <div class="form-group mt-3">
                        <label>Profession</label>
                        <input type="text" name="profession" class="form-control text" placeholder="Profession" value=<?php echo $row['profession'];?> required autocomplete="off" readonly>
                    <!-- <div class="form-group mt-2">
                         <label>New Image</label><br>
                        <input class="file-upload-input" type="file" name="image" accept="image/*">
                    </div> -->
                    <div class="form-group offset-md-5 mt-4">
                      <a  class="btn btn-danger mx-3" href="admin2.php">Back</a>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>
</html>