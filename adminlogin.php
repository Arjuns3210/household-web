<?php
$conn = mysqli_connect("localhost","root","","homeservices");
if (!$conn) 
{
  echo"Connection Failed.";
}

if(isset($_POST['submit']))
{
  $query = "SELECT * FROM `admin` WHERE `username`='$_POST[username]' AND `password`='$_POST[password]' ";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==1)
  {
    session_start();
    $_SESSION['adminlogin']=$_POST['username'];
    header("Location: admin_dashboard.php");
  }
  else
  {
    echo"<script> alert('Incorrect Password');</script>";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Form </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body style="background-image: url('images/login2.jpg');">
    <nav>
        <div class="navbar navbar-expand-lg" style="background-color:#ADD8E6;">
            <div class="container" style="font-size:x-large;">
            <a class="btn btn-outline-danger offset-md-11" href="loginas.php">Back</a>
            <a class="btn btn-outline-danger mx-3" href="index.php">Home</a>
            </div>
        </div>
    </nav>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class=" col-sm-4">
          <form method="POST">
            <div class="card bg-white text-black mt-5">
              <div class="card-body p-5 text-center">
                <div class="mb-4">
                    <h2 class="mb-2">Admin Login</h2>
                    <div class="mb-4 mt-4">
                      <input type="password" name="username" placeholder="Enter Username" class="form-control form-control" required>
                    </div>

                    <div class="mb-4">
                      <input type="password" name="password" placeholder="Enter Password" class="form-control form-control" required>
                    </div>
                    <button class="btn btn-success w-100" type="submit" name="submit">Login</button>
                </div>
              </div>
            </div>
          </form>     
        </div>
      </div>
    </div> 
          
</body>
</html>
