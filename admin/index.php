<?php
    session_start();
    include "config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login System</title>

	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="../bootstrap/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
	<!-- icon -->
	<link rel="icon" href="dashboard/pict/mark1.png">

	<style>

		body {
			background-color:#08a242;
            font-family: "roboto";
		}
		.box-header {
			text-align:center;
		}
		.box-header b{
			font-size:25px;
		}
		@media (max-width: 768px){
			.login-box{
				margin-top:20%;
			}
		}
		.login-box-body {
			background-color:rgba(255, 255, 255, 0.15);
			padding:20px;
			border-radius: 5px;
		}

	</style>

</head>
<body class="hold-transition login-page">

	<div class="login-box">
		<div class="login-box-body">
			<div class="box box-primary box-solid no-border">
				<div class="box-header">
					<span class=""><b>Form Login</b></span>
				</div>
			</div>
			<form role="form" action="proses_login.php" method="post">
				<div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Username" required x-moz-errormessage='Form harus diisi 4-20 Karakter !'  pattern=".{4,20}">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password" required x-moz-errormessage='Form harus diisi 4-20 Karakter !'  pattern=".{4,20}">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="form-group">
					<input type="submit" name="login" class="btn btn-default btn-block" value="Login" />
					<a href="../index.php" class="btn btn-default btn-block"><span class="fa fa-arrow-circle-left"></span> Kembali Ke Web</a>
				</div>
			</form>
		</div>
	</div>

	<!-- jQuery 2.1.4 -->
	<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Bootstrap 3.3.5 -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
