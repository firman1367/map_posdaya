<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- judul -->
		<title><?php include "title.php" ?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
	    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="../../bootstrap/css/font-awesome.min.css">
	    <!-- Ionicons -->
	    <link rel="stylesheet" href="../../bootstrap/css/ionicons.min.css">
	    <!-- iCheck for checkboxes and radio inputs -->
	    <link rel="stylesheet" href="../../plugins/iCheck/all.css">
	    <!-- Theme style -->
	    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
	    <!-- icon -->
	    <link rel="icon" href="pict/mark2.png">
	    <!-- DataTables -->
	    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
	    <!-- skin -->
	    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
	    <!-- fancy box -->
	    <link rel="stylesheet" href="../../dist/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	    <!-- summernote -->
		<link rel="stylesheet" href="../../dist/css/summernote.css">
		<style media="screen">
		/*.widget-user-header {
			background: url('../../dist/img/left-bg.png') ;
		}*/
		body{
			font-family: "roboto";
		}
		.navbar-nav>li{
			font-size: 17px;
		}
		#map {
				margin: 10px 0px;
				width: 100%;
				height: 400px;
		}
		.container {
		    padding-right: 0px;
		    padding-left: 0px;
		}
		.bg-custom{
			color: white;
			background-color: #444444;
		}
		.btn-box-tool i{
			color: white;
		}
		.skin-custom .main-header .navbar {
		    background-color: #444444;
		}
		.box.box-solid.box-custom>.box-header {
		    color: #fff;
		    background: #444444;
		    background-color: #444444;
		}
		.nav-tabs-custom>.nav-tabs>li.active {
			border-top-color: rgb(55, 54, 54);
		}
		.nav-tabs-custom>.nav-tabs>li>a:hover {
			color: black;
		}
		.nav-tabs-custom {
			margin-bottom: 0px;
			box-shadow: 0 1px 10px #ddd;
		}
		</style>


		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByH0TBkJowSa9grS3mLEzWiokCyvRTG8I" type="text/javascript"></script>

	</head>

	<body class="hold-transition skin-blue layout-top-nav">
		<div class="wrapper">
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					<div class="navbar-header">
						<a href="home" class="navbar-brand"><b>SISTEM INFORMASI SEBARAN POSDAYA DI KECAMATAN CIGOMBONG</b></a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					</div>
					<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li><a href="home"><span class="fa fa-home"></span> Beranda</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span> Management <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="index.php?page=lokasi"><span class="fa fa-cogs"></span> Management Lokasi</a></li>
									<li><a href="index.php?page=user"><span class="fa fa-cogs"></span> Management Admin</a></li>
									<li><a href="index.php?page=kelurahan"><span class="fa fa-cogs"></span> Management kelurahan</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- end header -->
