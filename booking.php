<?php
session_start();
$conn = mysqli_connect("localhost","root","","homeservices");

if(!isset($_SESSION['loggedinId']))
{
        header("Location: loginas.php");
}
$sid = $_GET['bookid'];
// echo"$sid";

$uid = $_SESSION['loggedinId'];

$query = "SELECT * FROM `sprovider`";
$result = mysqli_query($conn,$query);
if($result){
    while($row = mysqli_fetch_assoc($result))
    {
        $id = $row['id'];
        $image = $row['image'];
        $name = $row['name'];
        $surname = $row['surname'];
        $phone = $row['phone'];
        $gender = $row['gender'];
        $address = $row['address'];
        $pincode = $row['pincode'];
        $email = $row['email'];
        $password = $row['password'];
        $confirmpassword = $row['confirmpassword'];
        $profession = $row['profession'];
        $experience = $row['experience'];
        $salary = $row['salary'];
        $date = $row['date'];
    }
}

    //comparing user name, surname and phone number in booking form
    $sql="SELECT * from user where id = '$uid'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

if(isset($_POST["submit"]))
{
    $book_id = $sid;
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $b_date = $_POST['b_date'];
    $days = $_POST['days'];
    $hours = $_POST['hours'];

    //comparing user name, surname and phone number in booking form
    $sql="SELECT * from user where id = '$uid'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $uname = $row['name'];
    $usurname = $row['surname'];
    $uphone = $row['phone'];
    
    if($name == $uname && $surname == $usurname && $uphone == $phone)
    {
        $query="INSERT INTO booking(name, surname, phone, address, pincode, b_date, days, hours,book_id) VALUES('$name','$surname' ,'$phone',
        '$address','$pincode','$b_date', '$days', '$hours',$sid)"; 
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $booking=true ;
            echo"<script> alert('Your Response have been submitted successfully. He/She will contact you soon.'); </script>";
        }
        else
        {
            echo"Error While sending response.Try after some time.";
        }
    }
    else
    {
        echo"<script>alert('Please enter correct name, surname and contact number.')</script>";
    }
       
}
    // Close the MySQL connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Page</title>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            body{
                background-image: url(timepass.jpg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                font-style:arial;
            }
            #form{
                background-color:aqua;
                min-height:auto;
                padding: 5px 40px 40px 40px;

            }
            .regis
            {
                font-size: 40px;
                font-family: Agency FB;
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
    <nav>
        <div class="navbar navbar-expand-lg" style="background-color:#ADD8E6;">
            <div class="container " style="font-size:x-large;">
                <ul class="navbar-nav offset-md-11">
                    <b><li class="nav-item"><a class="btn btn-outline-danger" href="userlanding.php">Back</a></li></b>
                    <b><li class="nav-item mx-2"><a class="btn btn-outline-danger" href="logout.php">Logout</a></li></b>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" id="form">
                <center class="regis"><b>Booking Form</b></center>
                <form  method="POST">
                    <div class="form-group mt-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control text" placeholder="Enter name" autocomplete="off" required pattern="[A-Za-z]{2,20}" value=<?php echo $row['name'];?>>
                    </div>
                    <div class="form-group mt-2">
                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control text" placeholder="Enter surname" required pattern="[A-Za-z]{3,20}" autocomplete="off" value=<?php echo $row['surname'];?>>
                    </div>
                    <div class="form-group mt-2">
                        <label>Contact Number</label>
                        <input type="tel" class="form-control text" placeholder="Enter Mobile Number" name="phone" maxlength="10" required pattern="[0-9]{10}" autocomplete="off" value=<?php echo $row['phone'];?>>
                    </div>
                    <div class="form-group mt-2">
                        <label>Address</label>
                        <textarea class="form-control" rows="4" placeholder="Enter Address"  name="address" required pattern="[A-Za-z0-9]{3,90}" autocomplete="off"><?php echo $row['address'];?></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label>Pin Code</label>
                            <input type="text" class="form-control text" placeholder="Enter Pincode" name="pincode" maxlength="6" required pattern="[0-9]{6}" autocomplete="off" value=<?php echo $row['pincode'];?>>
                    </div>
                    <div class="form-group mt-2">
                        <label>Starting Date</label>
                        <input type="date" id="date" class="form-control text" name="b_date" min="<?php echo date('Y-m-d'); ?>" required autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Days</label>
                        <input type="text" class="form-control text" placeholder="Enter number of days" name="days" maxlength="3" required autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Working Hours</label><br>
                        <select class="form-control" name="hours">
                            <option disabled selected> --Select Hours--</option>
                            <option  value="1" required>1</option>
                            <option  value="2" required>2</option>
                            <option  value="3" required>3</option>
                            <option  value="4" required>4</option>
                            <option  value="5" required>5</option>
                            <option  value="6" required>6</option>
                            <option  value="7" required>7</option>
                            <option  value="8" required>8</option>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-success btn-lg offset-md-5" name="submit">Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


