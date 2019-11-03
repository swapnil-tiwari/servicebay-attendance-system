<!DOCTYPE html>
<?php
    session_start();
    
?>
<html>
<script>
    if (window.location.href.split("auth=")[1] == 'false') {
        alert("Wrong Credentials!");
    }
</script>
<head>
<meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Attendance System</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
		integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

</head>

<body>
	<div class="main-cont">
		<div class="nav-header">
			<div class="logo">
				<img src="./img/mainicon.png">
			</div>
			<div class="caption">
				<h2>ServiceBay | Attendance Portal</h2>
			</div>
		</div>
		<?php
			if(!isset($_SESSION['login_state']))
			{
				echo '<div class="login-window animated fadeIn">
				<h3>Enter Credentials</h3>
				<br><i class="fa fa-user" style="justify-self:center; font-size:50px;"></i>
				<form action="backend_modules/api.php" method="post">
					<br>
					<input type="text" name="username" placeholder="Enter Username" class="txt-sml-2">
					<br>
					<input type="password" name="pass" placeholder="Enter Password" class="txt-sml-2">
					<br><br>
					<button class="btn btn-success" name="user_login">Login</button>
				</form>
			</div>';
			}
			else if (isset($_SESSION['login_state']))
			{
				echo '<div class="attendance-window animated fadeIn">
			
				<div class="usertab">
						<div class="dropdown">
								<button class="profile-btn dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user" style="margin-right:5px;"></i>'. $_SESSION['username'].'</button>
	
								<ul class="dropdown-menu">
								<li><a href="#"><i class="fa fa-book" style="margin-right:5px;"></i>View Attendace</a></li>
									
									<li><a href="backend_modules/logout.php"><i class="fas fa-sign-out-alt" style="margin-right:5px;"></i>Logout</a></li>
									
								</ul>
							</div>
				</div>
				<div class="card">
					<i class="fa fa-user" style="font-size:100px;"></i>
					<!-- <img src="./img.jpg" alt="John" style="width:100%"> -->
					<h1>Cook Shivam</h1>
					<p class="title">Alpha 2</p>
					<code>Cook Id:f24932</code>
					<!-- <a href="#"><i class="fa fa-dribbble"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-facebook"></i></a> -->
					<br><br>
					<p><button class="btn btn-success">Mark Attendance</button></p>
				</div>
			</div>';
			}
		?>
		
		



	</div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
</html>