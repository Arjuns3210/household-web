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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin</title>
</head>
<body>
    <nav>
        <div class="navbar navbar-expand-lg" style="background-color: skyblue;">
            <div class="container " style="font-size:x-large;">
            <h3>Admin Dashboard</h3>
                <ul class="navbar-nav">
                    <b> <li class="nav-item"><a class="nav-link active" href="admin.php">User</a></li></b>
                    <b><li class="nav-item "><a class="nav-link active" href="admin2.php">ServiceProvider</a></li></b>
                    <b> <li class="nav-item "><a class="nav-link active" href="admin3.php">Services</a></li></b>
                    <b> <li class="nav-item"><a class="nav-link active" href="admin4.php">Feedback</a></li></b>
                    <b><li class="nav-item"><a class="nav-link active" href="admin_dashboard.php">Dashboard</a></li></b>
                    <b><li class="nav-item"><a class="nav-link active" href="logout.php">Logout</a></li></b>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="table-responsive-md">
        <center><h2 class="mt-3">Displaying Feedback Records</h2></center>
            <table class="table table-bordered  mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email ID</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // getting all data from feedback table
                    $query = "SELECT * FROM `feedback`";
                    $result = mysqli_query($conn,$query);
                    if($result){
                        while($row = mysqli_fetch_assoc($result))
                       {
                            $id = $row['id'];
                            $name = $row['name'];
                            $surname = $row['surname'];
                            $email = $row['email'];
                            $message = $row['message'];
                            $date = $row['date'];
                
                            // retrieving values using concatination below  
                            echo '<tr>
                                <td>'.$id.'</td> 
                                <td>'.$name.'</td>  
                                <td>'.$surname.'</td> 
                                <td>'.$email.'</td>
                                <td>'.$message.'</td>
                                <td>'.$date.'</td>   
                                </tr>';
                            }
                        }
                ?>
                    </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<script>
            
</script>
</body>
</html>