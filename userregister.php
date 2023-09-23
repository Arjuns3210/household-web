<?php
session_start();
$conn = mysqli_connect("localhost","root","","homeservices");


if(!empty($name)||!empty($phone)||!empty($gender)||!empty($address)||!empty($pincode)||
    !empty($email)||!empty($password)||!empty($confirmpassword) )
{

        $host="localhost";
        $dbUsername="root";
        $dbPassword="";
        $dbname="homeservices";
}

if(isset($_POST["submit"]))
{
    $name = $_POST['name'];
    $surname =$_POST['surname'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($confirmpassword, PASSWORD_BCRYPT);

    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    if(mysqli_num_rows($duplicate) > 0)
    {
        echo"<script> alert('Email Already Exists'); </script>";
    }
    else
    {
        if($password == $confirmpassword)
        {
            $query="INSERT INTO user (name, surname, phone, gender, address, pincode, 
            email, password, confirmpassword) VALUES('$name', '$surname', '$phone', '$gender','$address','$pincode', '$email', '$pass','$cpass')";
            mysqli_query($conn,$query);
            echo"<script> alert('Registered Successfully'); </script>";
        }
        else
        {
            echo"<script> alert('Password Does Not Match'); </script>"; 
        }
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
                background-image: url(images/register2.jpg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                font-style:Arial;
            }
            #form{
                /* background-color:paleturquoise; */
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
            <div class="col-md-6 offset-md-3" id="form" style="border: #E6BF83 4px solid">
                <center class="regis"><h1>User Register Here</h1></center>
                <form action="" method="POST">
                    <div class="form-group mt-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control text" placeholder="Enter name" required pattern="[A-Za-z]{2,20}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control text" placeholder="Enter surname" required pattern="[A-Za-z]{3,20}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Contact Number</label>
                        <input type="tel" class="form-control text" name="phone" placeholder="Enter Mobile Number" maxlength="10" required pattern="[0-9]{10}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                    <label>Select Gender</label><br>
                        <input type="radio" id="gender" name="gender" value="m" required>Male
                        <input type="radio" id="gender" name="gender" value="f" required>Female
                        <input type="radio" id="gender" name="gender" value="o" required>Others
                    </div>
                    <div class="form-group mt-2">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Address" name="address" required pattern="[A-Za-z0-9]{3,90}" autocomplete="off"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label>Pin Code</label>
                            <input type="text" class="form-control text" placeholder="Enter Pincode" name="pincode" maxlength="6" required pattern="[0-9]{6}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Email ID</label>
                        <input type="email" class="form-control text" placeholder="Enter Email ID" name="email" required autocomplete="off"> 
                    </div>
                    <div class="form-group mt-2">
                        <label>Password</label>
                        <input type="password" class="form-control text" placeholder="Enter Password" name="password" required pattern=".{6,}" autocomplete="off">  
                    </div>
                    <div class="form-group mt-2">
                        <label>Confirm Password</label><br>
                        <input type="password" class="form-control text" placeholder="Confirm Password" name="confirmpassword" required pattern=".{6,}" autocomplete="off">
                    </div>
                    <div class="form-group offset-md-4 mt-4">
                      <button type="submit" class="btn btn-danger" name="submit">Register</button>
                      <a class="btn btn-primary mx-3" href="index.php">Back</a>
                    </div>
                    <div class="form-group offset-md-2 mt-4">
                        <h4>Already have an account ? <a href="userlogin.php" style="text-decoration:none">Login Here</a></h4>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>
</html>