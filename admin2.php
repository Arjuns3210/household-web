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

   <div class="table-responsive-md">
        <a href="admin_addprovider.php" class="btn btn-danger mt-3 mx-2">Add Service Provider</a>
    <table class="table table-bordered  mt-4" style="width="100%"">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Contact Number</th>
                <th>Gender</th>
                <th class="col-2">Address</th>
                <!-- <th>Pincode</th> -->
                <th>Email ID</th>
                <!-- <th>Password</th>
                <th>Confirm Password</th> -->
                <th>Profession</th>
                <!-- <th>Experience in years</th>
                <th>Salary</th> -->
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                // getting all data from sprovider table
                $query = "SELECT * FROM `sprovider`";
                $result = mysqli_query($conn,$query);
                if($result){
                    while($row = mysqli_fetch_array($result))
                    {
                        $id = $row['id'];
                        $image = $row['image'];
                        $name = $row['name'];
                        $surname = $row['surname'];
                        $phone = $row['phone'];
                        $gender = $row['gender'];
                        $address = $row['address'];
                        // $pincode = $row['pincode'];
                        $email = $row['email'];
                        // $password = $row['password'];
                        // $confirmpassword = $row['confirmpassword'];
                        $profession = $row['profession'];
                        $experience = $row['experience'];
                        $salary = $row['salary'];
                        $date = $row['date'];
            
                        // retrieving values using concatination below  
                        echo '<tr>
                            <td>'.$id.'</td> 
                            <td><img src="images/'.$image.'" height="100" width="100"></td> 
                            <td>'.$name.'</td>  
                            <td>'.$surname.'</td> 
                            <td>'.$phone.'</td>
                            <td>'.$gender.'</td>
                            <td>'.$address.'</td>
                            <td>'.$email.'</td>
                            <td>'.$profession.'</td>
                            <td>'.$date.'</td>
                            
                            <td> 
                                <a href="admin_providerview.php?viewid='.$id.'" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="admin_providerupdate.php?updateid='.$id.'" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="admin_providerdelete.php?deleteid='.$id.'" class="btn btn-danger"><i class="fa fa-trash" onclick = "return checkdelete();" aria-hidden="true"></i></a>
                            </td>
                        </tr>';

                    }
                }

                ?>
            </tbody>
        </table>
    </div>


    <!-- code for onclick checkdelete() function-->
    <script>
        function checkdelete()
        {
            return confirm('Are you sure you want to delete this record ?');
        }
    
    </script>
</body>
</html>
</body>
</html>