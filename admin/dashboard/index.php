<?php session_start();

if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'administrator'){
        //koneksi terpusat
        include ('../config/koneksi.php');
        $username   = $_SESSION['username'];
        $level      = $_SESSION['level'];
        require_once('layout/header.php');

        ?>

        <div class="content-wrapper">

        	<div class="container">

        		<section class="content">

        			<div class="col-md-3">
        				<!-- Widget: user widget style 1 -->
        				<div class="box box-widget widget-user-2">
        					<!-- Add the bg color to the header using any of the bg-* classes -->
        					<div class="widget-user-header bg-custom">
        						<div class="widget-user-image">
                                    <?php
                                        $query = mysqli_query($koneksi,("SELECT * FROM tbl_user WHERE username = '$_SESSION[username]'"));
                                        $data  = mysqli_fetch_array($query);
                                    ?>
        							<a class="fancybox" href="pict/<?php echo $data['foto'] ?>">
        								<img class="profile-user-img img-responsive img-circle" style="height:100px;background-color: white;" src="pict/<?php echo $data['foto'] ?>" alt="User profile picture">
        							</a>
        						</div><!-- /.widget-user-image -->
        						<h3 class="profile-username text-center" style="color:white;"><b><?php echo $_SESSION['username'] ?></b></h3>
        						<h5 class="text-muted text-center" style="color:white;"><b><?php echo $_SESSION['level'] ?></b></h5>
        					</div>
        					<div class="box-footer no-padding">
        						<ul class="nav nav-stacked">
        							<li><a href="home"><b>Home</b><i class="pull-right"><span class="fa fa-home"></span></i></a></li>
                                    <li><a href="index.php?page=user"><b>Data User</b><i class="pull-right"><span class="fa fa-user"></span></i></a></li>
                                    <li><a href="index.php?page=kelurahan"><b>Data Kelurahan</b><i class="pull-right"><span class="fa fa-globe"></span></i></a></li>
                                    <li><a href="index.php?page=lokasi"><b>Data Lokasi</b><i class="pull-right"><span class="fa fa-globe"></span></i></a></li>
        							<li><a href="../logout.php"><i class="pull-right"><span class="fa fa-sign-out"></span></i><b> Logout</b></a></li>
        						</ul>
        					</div>
        				</div><!-- /.widget-user -->
        			</div>

        			<div class="col-md-9">

                        <!-- PAGING CONTENT-->
                        <?php
                        
                            if ($_GET["page"]=="home") {
                                include "home.php";
                            }
                            else if ($_GET['page']=="lokasi") {
                                include "form/data_lokasi.php";
                            }
                            else if ($_GET['page']=="edit_lokasi") {
                                include "form/edit_lokasi.php";
                            }
                            else if ($_GET['page']=="user") {
                                include "form/data_user.php";
                            }
                            else if ($_GET['page']=="edit_user") {
                                include "form/edit_user.php";
                            }
                            else if ($_GET['page']=="profil") {
                                include "form/profil.php";
                            }
                            else if ($_GET["page"]=="detail_lokasi") {
                                include "form/detail_lokasi.php";
                            }
                            else if ($_GET['page'] == "kelurahan") {
                                include "form/data_kelurahan.php";
                            }
                            else if ($_GET['page'] == "edit_kelurahan") {
                                include "form/edit_kelurahan.php";
                            }
                            else{
                                include "home.php";
                            }

                        ?>

        			</div>

        		</section>

        	</div>

        </div>

        <!-- footer -->
        <?php require_once('layout/footer.php'); ?>
        <!-- end footer -->

    <?php
        }
    }
    else {
    	session_destroy();
    	header ('location:../index.php');
    }
?>
