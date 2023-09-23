<?php
session_start();
$conn = mysqli_connect("localhost","root","","homeservices");
if(!$conn)
{
    echo"Connection Failure";
}
if(!isset($_SESSION['loggedinId']))
{
        header("Location: loginas.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <title>Babysitter Page</title>
</head>
<body>
    <nav>
        <div class="navbar navbar-expand-lg" style="background-color: skyblue;">
            <div class="container " style="font-size:x-large;">
            <h2 class="offset-md-5">Elderly Care Details</h2>
                <ul class="navbar-nav">
                    <b><li class="nav-item"><a class="btn btn-primary" href="userlanding.php">Back</a></li></b>
                    <b><li class="nav-item mx-2"><a class="btn btn-primary" href="logout.php">Logout</a></li></b>
                </ul>
            </div>
        </div>
    </nav>
        <h6 class="text-center mt-2">An Elderly Care Attendant To Take Special Care And Support Your Elders As Good As You Would Do.</h6>
    <div class="container py-2 text-center">
        <div class="table-responsive-md ">
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Profession</th>
                        <th width="15%">Experience in years</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // getting all data from sprovider table
                    $query = "SELECT * FROM `sprovider` WHERE profession='Elderly Care'";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $id = $row['id'];
                            $image = $row['image'];
                            $name = $row['name'];
                            $address = $row['address'];
                            $profession = $row['profession'];
                            $experience = $row['experience'];
                            $salary = $row['salary'];
                        
                            // retrieving values using concatination below  
                            echo '<tr>
                                <td><img src="images/'.$image.'" height="100" width="100"></td>
                                <td>'.$name.'</td>  
                                <td>'.$address.'</td>
                                <td>'.$profession.'</td>
                                <td>'.$experience.'</td>
                                <td>'.$salary.'</td>
                                <td>
                                <a href="booking.php?bookid='.$id.'" class="btn btn-success">Book Now</a>
                                </td>
                            </tr>';

                        }
                    }
                    else
                    {
                        echo"<h3>Elderly Care are not available.</h3>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
     </div>
</body>
</html>
