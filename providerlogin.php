<?php
session_start();
$conn = mysqli_connect("localhost","root","","homeservices");
if (!$conn) 
{
  echo"Connection Failed.";
}
 
if(isset($_POST["submit"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM sprovider WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    
    if(mysqli_num_rows($result) > 0)
    {
        if(password_verify($password,$row['password']))
        {
          $id=$row['id'];
          $_SESSION['loggedinId']=$id;
          header("Location: providerlanding.php");
        }
        else
        {
          echo"<script> alert('Wrong Password.'); </script>"; 
        }
    }
    else
    {
      echo"<script> alert('User Not Registered,'); </script>"; 
    }
}
    // Close the MySQL connection
    mysqli_close($conn);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Provider Login Form </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
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
              <div class="card-body m-4 text-center">
                <div class="mb-5">
                    <h2 class="mb-2">Service Provider Login</h2>
                    <div class="mb-4 mt-4">
                      <input type="email" name="email" placeholder="Enter Email ID" class="form-control form-control" autocomplete="off" required>
                    </div>

                    <div class="mb-4">
                      <input type="password" name="password" placeholder="Enter Password" class="form-control form-control" required>
                    </div>
                    <button class="btn btn-success w-100 " type="submit" name="submit">Login</button>
                </div>
                <div>
                  <h5>Don't have an account? <a href="providerregister.php" style="text-decoration:none">Sign Up</a></h5>
                </div>
              </div>
            </div>
          </form>     
        </div>
      </div>
    </div> 

        
</body>
</html>
