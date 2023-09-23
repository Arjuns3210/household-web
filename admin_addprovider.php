<?php
$conn = mysqli_connect("localhost","root","","homeservices");
if(!$conn)
{
    echo"Connection Failure";
}

if(isset($_POST["submit"]))
{
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "images/".$filename ;
    move_uploaded_file($tempname,$folder);  //(from $tempname, to $folder which is the destination)

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $pincode = $_POST['pincode'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $profession = $_POST['profession'];
    $experience = $_POST['experience'];
    $salary = $_POST['salary'];
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($confirmpassword, PASSWORD_BCRYPT);

    $duplicate = mysqli_query($conn, "SELECT * FROM sprovider WHERE email = '$email'");
    if(mysqli_num_rows($duplicate) > 0)
    {
        echo"<script> alert('Email Already Exists'); </script>";
    }
    else
    {
        if($password == $confirmpassword)
        {
            $query="INSERT INTO sprovider (image, name,surname ,phone, gender, address, dob, pincode, email, password, confirmpassword, profession,
            experience, salary) VALUES('$filename','$name','$surname' ,'$phone', '$gender','$address','$dob','$pincode', '$email', '$pass','$cpass', '$profession', '$experience', '$salary')";
            mysqli_query($conn,$query);
            echo"<script> alert('Registered Successfully'); </script>";
            header("Location: admin2.php");
        }
        else
        {
            echo"<script> alert('Password Does Not Match'); </script>"; 
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            body{
                background-image: url(timepass.jpg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                font-style:Arial;
            }
            #form{
                background-color:aqua;
                min-height:auto;
                padding: 5px 40px 40px 40px;

            }
            .regis
            {
                font-size: 35px;
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
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" id="form">
                <center class="regis"><b>Add Service Provider </b></center>
                <form  method="POST" onsubmit="return validateForm();" enctype="multipart/form-data">
                    <div class="form-group mt-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control text" placeholder="Enter name" required pattern="[A-Za-z]{3,20}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control text" placeholder="Enter surname" required pattern="[A-Za-z]{3,20}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Contact Number</label>
                        <input type="text" class="form-control text" name="phone" placeholder="Enter Mobile Number" size="10" maxlength="10" required pattern="[0-9]{10}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                    <label>Select Gender</label><br>
                        <input type="radio" id="gender" name="gender" value="m" required>Male
                        <input type="radio" id="gender" name="gender" value="f" required>Female
                        <input type="radio" id="gender" name="gender" value="o" required>Others
                    </div>
                    <div class="form-group mt-2">
                        <label>Address</label>
                        <textarea class="form-control" rows="6"placeholder="Enter Address" name="address" required pattern="[A-Za-z0-9]{3,60}" autocomplete="off"></textarea>
                    </div>
                    <div class="form-group mt-2">
                    <label>Date of Birth</label>
                        <input type="date" class="form-control text" placeholder="Enter DOB" id="dob" name="dob" max="<?php echo date('Y-m-d'); ?>" required pattern="\d{2}\/\d{2}\/\d{4}" autocomplete="off">
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
                    <div class="form-group mt-3">
                        <label>Profession</label>
                        <select class="form-control" name="profession">
                            <option disabled selected> --Select Profession-- </option>
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
                    </div>
                    <div class="form-group mt-2">
                        <label>Experience</label>
                        <input type="text" name="experience" id="experience" class="form-control text" placeholder="Experience in years" min="0" maxlength="4" required pattern="\d{1,2}(\.\d{1,2})?" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Salary</label>
                        <input type="text" name="salary" class="form-control text" placeholder="Required Salary" maxlength="8" required pattern="[0-9]{3,8}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                         <label>Image</label><br>
                        <input class="file-upload-input" type="file" name="image" accept="image/*" required>
                    </div>
                    <div class="form-group offset-md-4 mt-4">
                      <button type="submit" class="btn btn-success" name="submit">Register</button>
                      <a class="btn btn-danger mx-3" href="admin2.php">Back</a>
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

