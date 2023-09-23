<!-- <?php
    session_start();
    $conn = mysqli_connect("localhost","root","","homeservices");
        if(isset($_POST["update"]))
        {
            $id = $_POST['update_id'];
            $sname = $_POST['sname'];
            $sdesc = $_POST['sdesc'];

            $query = "UPDATE `serv` SET sname='$sname', sdesc='$sdesc' WHERE id='$id' ";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                echo"<script> alert('Updated Successfully'); </script>";
            }
            else
            {
                echo"<script> alert('Please Insert Details Properly'); </script>";
            }
        }
?> -->