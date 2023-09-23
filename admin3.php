<?php
session_start();
$conn = mysqli_connect("localhost","root","","homeservices");

if(!isset($_SESSION['adminlogin']))
{
        header("Location: adminlogin.php");
}

if(isset($_POST["submit"]))
{
    $sname = $_POST['sname'];
    $sdesc =$_POST['sdesc'];

    $query = "INSERT INTO service (sname, sdesc) VALUES('$sname', '$sdesc')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        echo"<script> alert('Service Added Successfully'); </script>";
    }
    else
    {
        echo"<script> alert('Please Insert Details Properly'); </script>";
    }
}

?>

<?php
    $conn = mysqli_connect("localhost","root","","homeservices");
        if(isset($_POST["update"]))
        {
            $id = $_POST['update_id'];
            $sname = $_POST['sname'];
            $sdesc = $_POST['sdesc'];

            $query = "UPDATE `service` SET sname='$sname', sdesc='$sdesc' WHERE id='$id' ";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:admin3.php");
            }
            else
            {
                echo"<script> alert('Please Insert Details Properly'); </script>";
            }
        }
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

    <title>Admin</title>
</head>
<body>
    <nav>
        <div class="navbar navbar-expand-lg" style="background-color: skyblue;">
            <div class="container " style="font-size:x-large;">
            <h3>Admin Dashboard</h3>
                <ul class="navbar-nav">
                    <b> <li class="nav-item"><a class="nav-link active" href="admin.php">User</a></li></b>
                    <b><li class="nav-item "><a class="nav-link active" href="admin2.php">ServiceProvider</a></li></b>
                    <b> <li class="nav-item "><a class="nav-link active" href="admin3.php">Services</a></li></b>
                    <b> <li class="nav-item"><a class="nav-link active" href="admin4.php">Feedback</a></li></b>
                    <b><li class="nav-item"><a class="nav-link active" href="admin_dashboard.php">Dashboard</a></li></b>
                    <b><li class="nav-item"><a class="nav-link active" href="logout.php">Logout</a></li></b>
                </ul>
            </div>
        </div>
    </nav>

 <!-- edit service modal and code -->
    <form method="POST">
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="update_id" id="update_id">
                    <div class="form-group mt-2">
                        <label>Service Name</label>
                        <input type="text" name="sname" id="sname" class="form-control text" placeholder="Enter service name"  autocomplete="off" required pattern="[A-Za-z ]{2,20}">
                    </div>
                    <div class="form-group mt-2">
                        <label>Service Description</label>
                        <input type="text" name="sdesc" id="sdesc" class="form-control text" placeholder="Enter service description" autocomplete="off" required pattern="[A-Za-z]{,100}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="update">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    </form>
 <!--  -->


 <!-- add service modal and code -->
    <div class="container">   
        <button class="btn btn-danger mt-3" data-toggle="modal" data-target="#addservice">Add Service</button>
        <h1 class="container text-center">Services Offered</h1>
    </div>
    <div class="container table-responsive-md " style="width:100%">
        <table class="table table-bordered mt-4" style="font-size:16px">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Service Name</th>
                    <th class="col-6">Service Description</th>
                    <th class="col-2">Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM service";
            $result = mysqli_query($conn,$sql);
            $check_service = mysqli_num_rows($result) > 0;
            if($check_service)
            {
                while($row=mysqli_fetch_array($result))
                {
                    $id = $row['id'];
                    $sname = $row['sname'];
                    $sdesc = $row['sdesc'];
                    $date = $row['date'];
                    
                    echo '<tr>
                    <td class="text-center">'.$id.'</td> 
                    <td>'.$sname.'</td>  
                    <td>'.$sdesc.'</td> 
                    <td class="text-center">'.$date.'</td>
                    <td class="text-center"> 
                        <button type="button" class="btn btn-success editbtn"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        <a href="delete_service.php?deleteid='.$id.'" class="btn btn-danger"><i class="fa fa-trash" onclick = "return checkdelete();" aria-hidden="true"></i></a>
                    </td>
                </tr>';
                }
            }
            else
            {
                echo"<center><h3>No Record Found</h3></center>";
            }

            ?>
         </tbody>
    </table>
    </div>
    <form method="POST">
        <div class="modal fade" id="addservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-2">
                        <label>Service Name</label>
                        <input type="text" name="sname" class="form-control text" placeholder="Enter service name" required pattern="[A-Za-z ]{2,20}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Service Description</label>
                        <input type="text" name="sdesc" class="form-control text" placeholder="Enter service description" required pattern="[A-Za-z]{,100}" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    </form>
  <!--  -->
    <script>
        function checkdelete()
        {
            return confirm('Are you sure you want to delete this service ?');
        }
    
    </script>

    <script>
        $(document).ready(function(){
            $('.editbtn').on('click',function(){
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#update_id').val(data[0]);
                $('#sname').val(data[1]);
                $('#sdesc').val(data[2]);
            });
        });
    </script>

</body>
</html>