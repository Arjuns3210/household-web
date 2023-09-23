<?php
    error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
                    <label>Image</label><br>
                        <input class="file-upload-input" type="file" name="image" required> <br><br>
                        <input class="file-upload-input" type="submit" value="Upload Image" name="submit" required>
</form>
</body>
</html>


<?php

$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder = "images/".$filename ;
// echo $folder;
move_uploaded_file($tempname,$folder);  //(from $tempname, to $folder which is the destination)

echo "<img src='$folder' height='100px' width='100px'>";

?>
<!-- <img src="images/ganpati bappa.jpeg" height="100px" width="100px"> -->