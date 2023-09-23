<?php
session_start();
$conn = mysqli_connect("localhost","root","","homeservices");

if(!isset($_SESSION['loggedinId']))
{
        header("Location: loginas.php");
}

$id = $_SESSION['loggedinId'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id =$id");
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home Page</title>
    <link rel="stylesheet" href="bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 

</head>
<body>
    <nav>
        <h3 class="col-md-3 offset-md-5">Welcome <?php echo $row["name"]," ",$row[ "surname"]; ?></h3>
        <div class="navbar navbar-expand-lg" style="background-color: skyblue;">
            <div class="container" style="font-size: x-large;">
      
            <h3>24/7 Household Services</h3>
                <ul class="navbar-nav">
                    <b><li class="nav-item"><a class="nav-link active" href="user_editprofile.php">EditProfile</a></li></b>
                    <b><li class="nav-item"><a class="nav-link active" href="logout.php">Logout</a></li></b>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mt-2">
                <form method="POST">
                    <div class="mt-3" style="display:inline-block;">
                        <label>Select Category:</label>
                        <select name="profession">
                            <option disabled selected> --Select Service-- </option>
                            <?php
                                $result = mysqli_query($conn,"SELECT `sname` FROM `service`");
                                $row = mysqli_num_rows($result);
                                for($i=1;$i<=$row;$i++)
                                {
                                    $data=mysqli_fetch_assoc($result);
                            ?>
                                <option value="<?php echo $data['sname']?>"><?php echo $data['sname']?></option>
                            
                                <?php }?>
                        </select>
                        <button type="submit" class="btn btn-success mx-2" name="submit">Search</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
    <h4 class="text-center mt-2">Services Details</h4>
    <div class="container text-center">
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
                    if(isset($_POST["submit"]))
                    {
                        $profession=$_POST['profession'];
                        $query = "SELECT * FROM sprovider WHERE profession ='$profession'";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
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
                            echo"<h4> No Record Found.</h4>";
                        }
                    }
    
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>