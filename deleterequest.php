<?php
$conn = mysqli_connect("localhost","root","","homeservices");
if (!$conn) 
{
  echo"Connection Failed.";
}

if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];

    $query = "DELETE FROM `booking` WHERE id=$id";
    $result=mysqli_query($conn,$query);
    if($result)
    {
       header("Location: providerlanding.php");
    }
    else
    {
        echo"Error in Connection";
    }
}
?>