<?php
session_start();
$conn = mysqli_connect("localhost","root","","homeservices");

if(!isset($_SESSION['loggedinId']))
{
        header("Location: loginas.php");
}

$sid = $_SESSION['loggedinId'];
$result = mysqli_query($conn, "SELECT * FROM sprovider WHERE id =$sid");
$row = mysqli_fetch_assoc($result);

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
    <title>Service Provider Home Page</title>
</head>
<body>
    <nav>
         <h3 class="col-md-3 offset-md-5">Welcome <?php echo $row["name"]," ",$row[ "surname"]; ?></h3>
        <div class="navbar navbar-expand-lg" style="background-color: skyblue;">
            <div class="container" style="font-size: x-large;">
            <h3>24/7 Household Services</h3>
                <ul class="navbar-nav">
                    <b><li class="nav-item"><a class="nav-link active" href="provider_editprofile.php">EditProfile</a></li></b>
                    <b><li class="nav-item"><a class="nav-link active" href="logout.php">Logout</a></li></b>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
    <center><h3 class="mt-3">Service Requested by Users.</h3></center>
    <table class="table table-bordered  mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Pincode</th>
                <th>Starting Date</th>
                <th>Days</th>
                <th>Hours</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
         //$query="SELECT * FROM `sprovider`,`booking` where sprovider.id=booking.book_id";
         $query="SELECT * FROM `booking` where book_id=$sid";
            $result=mysqli_query($conn,$query);
            if($row = mysqli_fetch_assoc($result))
            {
                    $id = $row['id'];
                    $name = $row['name'];
                    $surname = $row['surname'];
                    $phone = $row['phone'];
                    $address = $row['address'];
                    $pincode = $row['pincode'];
                    $b_date = $row['b_date'];
                    $days = $row['days'];
                    $hours = $row['hours'];

                    echo '<tr> 
                        <td>'.$name.'</td>  
                        <td>'.$surname.'</td> 
                        <td>'.$phone.'</td>
                        <td>'.$address.'</td>
                        <td>'.$pincode.'</td>
                        <td>'.$b_date.'</td>
                        <td>'.$days.'</td>
                        <td>'.$hours.'</td>
                        <td> 
                        <a href="deleterequest.php?deleteid='.$id.'" class="btn btn-danger"><i class="fa fa-trash" onclick = " return checkdelete()" aria-hidden="true"></i></a>
                    </td>
                </tr>';

            }
            else
            {
                echo"<h3 style=text-align:center;>Currently No Booking done</h3>";
            }
        ?>
        </tbody>
    </table>
</div>
    <!-- code for onclick checkdelete() function-->
    <script type="text/javascript">
        function checkdelete()
        {
            return confirm("Are you sure you want to delete this record ?");
        }
    
    </script>
</body>
</html>