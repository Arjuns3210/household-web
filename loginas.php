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

    <title>Login</title>
</head>
<body style="background-image: url(images/login5.jpg);">
    <nav>
        <div class="navbar navbar-expand-lg" style="background-color:#ADD8E6;">
            <div class="container-fluid " style="font-size:x-large;">
            <a class="btn btn-outline-danger offset-md-11" href="index.php">Back</a>
            </div>
        </div>
    </nav>
        <div class="container mt-5 text-center">
            <h2 class="text-center text-white">Login as a...</h2>
            <div class="row mt-5 mx-3">
                <div class="col-lg-4">
                    <div class="card bg-dark text-white card h-100" style="width:300px">
                        <img src="images/admin.jpg" class="card-img-top" style="width:100%;height:200px">
                        <div class="card-body">
                            <h5 class="text-center">Admin Login</h5>
                        </div>
                        <div class="card-footer">
                            <a href="adminlogin.php" class="btn btn-primary">Go to Admin Login Page</a>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card bg-dark text-white" style="width:300px">
                        <img src="images/user.png" class="card-img-top" style="width:100%;height:200px">
                        <div class="card-body">
                            <h5 class="text-center">User Login</h5>
                        </div>
                        <div class="card-footer">
                            <a href="userlogin.php" class="btn btn-primary">Go to User Login Page</a>
                        </div>
   
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-dark text-white" style="width:300px">
                        <img src="images/proivder.png" class="card-img-top" style="width:100%;height:200px">
                        <div class="card-body">
                            <h5 class="text-center">Service Provider Login</h5>
                        </div>
                        <div class="card-footer">
                            <a href="providerlogin.php" class="btn btn-primary">Go to Service Provider Login Page</a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
</body>
</html>