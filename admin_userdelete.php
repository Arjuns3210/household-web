<?php
$conn = mysqli_connect("localhost","root","","homeservices");
if (!$conn) 
{
  echo"Connection Failed.";
}

if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];

    $query = "DELETE FROM `user` WHERE id=$id";
    $result=mysqli_query($conn,$query);
    if($result)
    {
       header("Location: admin.php");
    }
    else
    {
        echo"Error in Connection";
    }
}
?>