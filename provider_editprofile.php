<?php
session_start();
$conn = mysqli_connect("localhost","root","","homeservices");

//getting id  of the provider which will be updated
// to display previous value in the update form 
$id=$_SESSION['loggedinId'];
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
$password = $row['password'];
$confirmpassword = $row['confirmpassword'];
$profession = $row['profession'];
$experience = $row['experience'];
$salary = $row['salary'];
$image = $row['image'];
$date = $row['date'];

if(isset($_POST["submit"]))
{
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $profession = $_POST['profession'];
    $experience = $_POST['experience'];
    $salary = $_POST['salary'];
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($confirmpassword, PASSWORD_BCRYPT);

    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $path='images/';
    $folder = 'images/'.$filename;
    if($tempname !='')
    {
        $sql=mysqli_query($conn,"SELECT * FROM sprovider where id = $id");
        if($row=mysqli_fetch_array($sql))
        {
            $delimage=$row['image'];
        }
        unlink($path.$delimage);
        move_uploaded_file($tempname,$folder); //(from $tempname, to $folder which is the destination)
        if($password == $confirmpassword )
        {
            $query = "UPDATE `sprovider` set id=$id, image='$filename', name='$name', surname='$surname' , phone='$phone', gender='$gender', address='$address', 
            pincode=$pincode, email='$email', password='$pass', confirmpassword='$cpass', profession='$profession', experience='$experience', salary='$salary' WHERE id=$id";
            $result=mysqli_query($conn,$query);
            if($result)
            {
                header("Location: providerlanding.php");
            }
        }
        else
        {
            echo"<script> alert('Password Does Not Match'); </script>";
        }
    }
    else
    {
        if($password == $confirmpassword )
        {
            $result=mysqli_query($conn,"UPDATE `sprovider` set id=$id, name='$name', surname='$surname' , phone='$phone', gender='$gender', address='$address', 
            pincode=$pincode, email='$email', password='$pass', confirmpassword='$cpass', profession='$profession', experience='$experience', salary='$salary' WHERE id=$id");
            if($result)
            {
             header("Location: providerlanding.php");
            }
        }
        else
        {
            echo"<script> alert('Password Does Not Match'); </script>";
        }
    } 
   
}


?>


<!--  -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Provider Update</title>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            body{
                background-image: url(login1.jpg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                font-style:Arial;
            }
            #form{
                background-color:paleturquoise;
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
            <div class="col-md-6 offset-md-3" id="form">
                <center class="regis"><h1>Edit Profile</h1></center>
                <form action="" method="POST" onsubmit="return validateForm();" enctype="multipart/form-data">
                    <div class="form-group mt-2">
                        <center><img src="images/<?php echo $image;?>" class="img-fluid rounded-circle" height="100" width="150" alt="No Image"><br></center>
                    </div>
                    <div class="form-group mt-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control text" placeholder="Enter full name" value=<?php echo $row['name'];?> required pattern="[A-Za-z]{3,20}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control text" placeholder="Enter surname" value=<?php echo $row['surname'];?> required pattern="[A-Za-z]{3,20}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Contact Number</label>
                        <input type="text" class="form-control text" name="phone" placeholder="Enter Mobile Number" size="10" value=<?php echo $row['phone'];?> maxlength="10" required pattern="[0-9]{10}" autocomplete="off">
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
                        <textarea class="form-control" rows="3" placeholder="Enter Address" name="address" required pattern="[A-Za-z0-9]{3,60}" autocomplete="off"><?php echo $row['address'];?></textarea>
                    </div>
                    <div class="form-group mt-2">
                    <label>Date of Birth</label>
                        <input type="date" class="form-control text" placeholder="Enter DOB" id="dob" name="dob" max="<?php echo date('Y-m-d'); ?>" required pattern="\d{2}\/\d{2}\/\d{4}" value=<?php echo $row['dob'];?> autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Pin Code</label>
                            <input type="text" class="form-control text" placeholder="Enter Pincode" name="pincode" value=<?php echo $row['pincode'];?> maxlength="6" required pattern="[0-9]{6}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Email ID</label>
                        <input type="text" class="form-control text" placeholder="Enter Email ID" name="email" value=<?php echo $row['email'];?> required autocomplete="off"> 
                    </div>
                    <div class="form-group mt-2">
                        <label>Password</label>
                        <input type="password" class="form-control text" placeholder="Enter Password" name="password" value=<?php echo $row['password'];?> required pattern=".{6,}" autocomplete="off">  
                    </div>
                    <div class="form-group mt-2">
                        <label>Confirm Password</label><br>
                        <input type="password" class="form-control text" placeholder="Retype Password" name="confirmpassword" value=<?php echo $row['confirmpassword'];?> required pattern=".{6,}" autocomplete="off">
                    </div>
                   
                    <div class="form-group mt-2">
                        <label>Experience</label>
                        <input type="text" name="experience" id="experience" class="form-control text" placeholder="Experience in years" value=<?php echo $row['experience'];?> min="0" maxlength="4" required pattern="\d{1,2}(\.\d{1,2})?" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Salary</label>
                        <input type="text" name="salary" class="form-control text" placeholder="Required Salary" value=<?php echo $row['salary'];?> maxlength="8" required pattern="[0-9]{3,8}" autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <label>Profession</label>
                        <select class="form-control" name="profession">
                            <option disabled selected> --Select Profession-- </option>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM `service`");
                                $row = mysqli_num_rows($result);
                                for($i=1;$i<=$row;$i++)
                                {
                                    $data=mysqli_fetch_array($result);
                            ?>
                                <option value="<?php echo $data['sname']?>"
                                <?php
                                    if($profession == $data["sname"])
                                    {
                                        echo "selected";
                                    }
                                ?>
                                
                                ><?php echo $data['sname']?></option>
                            
                                <?php 
                                }
                                ?>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                         <label>New Image</label><br>
                        <input class="file-upload-input" type="file" name="image" accept="image/*">
                    </div>
                    <div class="form-group offset-md-4 mt-4">
                      <button type="submit" class="btn btn-success" name="submit">Update</button>
                      <a  class="btn btn-danger mx-3" href="providerlanding.php">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
		function validateForm() 
        {
			var dob = document.getElementById("dob").value;
			var experience = document.getElementById("experience").value;
			var today = new Date();
			var birthDate = new Date(dob);
			var age = today.getFullYear() - birthDate.getFullYear();
			var monthDiff = today.getMonth() - birthDate.getMonth();
			if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
				age--;
			}
			if (age < 18) {
				alert("You must be 18 years or older to register.");
                return false;
			} else {
				if (experience < 0 || experience > age-18) {
					alert("Please enter a valid number of years of experience.");
                    return false;
				} else {
                    return true;
				}
			}
		}
	</script>
</body>
</html>