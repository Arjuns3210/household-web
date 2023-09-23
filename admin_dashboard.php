<?php
error_reporting(0);
session_start();
$conn = mysqli_connect("localhost","root","","homeservices");
if (!$conn) 
{
  echo"Connection Failed.";
}
if(!isset($_SESSION['adminlogin']))
{
        header("Location: adminlogin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <style>
        * {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			font-family: arial, sans-serif;
		}
		.header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 15px 30px;
			background: light;
			color: #fff;
		}
		.u-name {
			font-size: 20px;
			padding-left: 0px;
		}
		.u-name b {
			color: green;
		}
		.header i {
			font-size: 30px;
			cursor: pointer;
			color: #fff;
		}
		.header i:hover {
			color: #127b8e;
		}
		.user-p {
			text-align: center;
			padding-left: 10px;
			padding-top: 25px;
		}
		.user-p img {
			width: 100px;
			border-radius: 50%;
		}
		.user-p h4 {
			color: #ccc;
			padding: 5px 0;

		}
		.side-bar {
			width: 350px;
			background: #262931;
			min-height: 85vh;
			transition: 500ms width;
            
		}
		.body {
			display: flex;
		}
		.section-1 {
			width: 100%;
			background-size: cover;
			background-position: center;
			display: flex;
			align-items: center;
			flex-direction: column;
			background-color:#C9A9A6;
		}
		.section-1 h1 {
			color: #fff;
			font-size: 60px;
		}
		.section-1 p {
			color: #127b8e;
			font-size: 20px;
			background: #fff;
			padding: 7px;
			border-radius: 5px;
		}
		.side-bar ul {
			margin-top: 20px;
			list-style: none;
		}
		.side-bar ul li {
			font-size: 16px;
			padding: 15px 0px;
			padding-left: 20px;
			transition: 500ms;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		.side-bar ul li:hover {
			background: #127b8e;
		}
		.side-bar ul li a {
			text-decoration: none;
			color: #eee;
			cursor: pointer;
			letter-spacing: 1px;
		}
		.side-bar ul li a i {
			display: inline-block;
			padding-right: 10px;
			font-size: 23px;
		}
		#checkbox {
			display: none;
		}
		#checkbox:checked ~ .body .side-bar {
			width: 60px;
		}
		#checkbox:checked ~ .body .side-bar .user-p{
			visibility: hidden;
		}
		#checkbox:checked ~ .body .side-bar a span{
			display: none;
		}
    </style>
</head>
<body>
	<input type="checkbox" id="checkbox">
	<h2 class="col-md-3 offset-md-5">Welcome <?php echo $_SESSION['adminlogin']?></h2>
	<header class="header" style="background-color:#ADD8E6">
		<h2 class="u-name"><b>ADMIN DASHBOARD</b></h2>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
            <img src="images/admin1.jpg" style="width:70%">;
				<h4>Admin</h4>
			</div>
			<ul>
				<li>
					<a href="admin.php">
						<i class="fa fa-user" aria-hidden="true"></i>
						<span>Manage User</span>
					</a>
				</li>
				<li>
					<a href="admin2.php">
						<i class="fa fa-user" aria-hidden="true"></i>
						<span>Manage Service Provider</span>
					</a>
				</li>
				<li>
					<a href="admin3.php">
						<i class="fa fa-user" aria-hidden="true"></i>
						<span>Manage Services</span>
					</a>
				</li>
				<li>
					<a href="admin4.php">
                        <i class="fa fa-commenting" aria-hidden="true"></i>
						<span>View Feedback</span>
					</a>
				</li>
				<!-- <li>
					<a href="#">
						<i class="fa fa-user" aria-hidden="true"></i>
						<span>Manage Accountings</span>
					</a>
				</li> -->
				<li>
					<a href="logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">
			<!-- Main Content -->
			<div class="container mt-5">
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h5 class="card-title"><i class="fa fa-users" aria-hidden="true"> Total Users</i></h5>
								<?php
									
									$query="SELECT id FROM user ORDER BY id";
									$res=mysqli_query($conn,$query);
									$row=mysqli_num_rows($res);
									echo '<h4> '.$row.' </h4>';
								?>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h5 class="card-title"><i class="fa fa-users" aria-hidden="true"> Total Service Provider</i></h5>
								<?php
									
									$query="SELECT id FROM sprovider ORDER BY id";
									$res=mysqli_query($conn,$query);
									$row=mysqli_num_rows($res);
									echo '<h4> '.$row.' </h4>';
								?>
							</div>
						</div>
                    </div>
					<div class="col-md-3 text-center">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title"><i class="fa fa-book" aria-hidden="true"> Total Services</i></h5>
								<?php
									$query="SELECT id FROM service ORDER BY id";
									$res=mysqli_query($conn,$query);
									$row=mysqli_num_rows($res);
									echo '<h4> '.$row.' </h4>';
								?>
							</div>
						</div>
					</div>
                    <div class="col-md-3 text-center">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title"><i class="fa fa-commenting" aria-hidden="true">Total Feedback</i></h5>
								<?php
									$query="SELECT id FROM feedback ORDER BY id";
									$res=mysqli_query($conn,$query);
									$row=mysqli_num_rows($res);
									echo '<h4> '.$row.' </h4>';
								?>
							</div>
						</div>
                    </div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>