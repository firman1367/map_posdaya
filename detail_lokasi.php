<?php
    include('admin/config/koneksi.php');
?>
<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- judul -->
		<title>SIG CIGOMBONG</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
	    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
	    <!-- Ionicons -->
	    <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
	    <!-- iCheck for checkboxes and radio inputs -->
	    <link rel="stylesheet" href="plugins/iCheck/all.css">
	    <!-- Theme style -->
	    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	    <!-- icon -->
	    <link rel="icon" href="admin/dashboard/pict/mark2.png">
	    <!-- DataTables -->
	    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	    <!-- skin -->
	    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	    <!-- fancy box -->
	    <link rel="stylesheet" href="dist/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	    <!-- summernote -->
		<link rel="stylesheet" href="dist/css/summernote.css">
		<style media="screen">
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
		</style>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByH0TBkJowSa9grS3mLEzWiokCyvRTG8I" type="text/javascript"></script>

	</head>

	<body class="hold-transition skin-blue layout-top-nav">
		<div class="wrapper">
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					<div class="navbar-header">
						<a href="index.php" class="navbar-brand"><b>SIG SEBARAN POSDAYA DI KECAMATAN CIGOMBONG</b></a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					</div>
				</nav>
			</header>
			<!-- end header -->
            <div class="content-wrapper">

            	<div class="container">

            		<section class="content">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-custom box-solid no-border">
                                    <div class="box-header">
                                        <h3 class="box-title"><i class="fa fa-map-marker"></i> Detail Lokasi</h3>
                                        <div class="box-tools">
                                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="hide"><i class="fa fa-minus"></i></button>
                                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div id="map"></div>
                                        <?php
                                            if (isset($_GET['id_tempat'])) {
                                                $id_tempat = $_GET['id_tempat'];
                                                $query  = mysqli_query($koneksi,("SELECT a.id_tempat, a.nama_tempat,a.latitude, a.longitude, a.foto, a.alamat, a.rt, a.rw, a.kegiatan, a.pengurus, b.id_kelurahan, b.nama_kelurahan
                                                                                  FROM tbl_wilayah AS a
                                                                                  INNER JOIN tbl_kelurahan AS b USING(id_kelurahan)
                                                                                  WHERE id_tempat = '$id_tempat'"));
                                                $data   = mysqli_fetch_array($query);
                                            }
                                        ?>
                                        <form action="function/edit.php?aksi=edit_lokasi" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" class="form-control" name="id_lokasi" value="<?php echo $data[0] ?>">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Nama</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="nama_lokasi" value="<?php echo $data['nama_tempat'] ?>" id='nama_lokasi' readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                				<label class="col-sm-3 control-label">Foto</label>
                                				<div class="col-md-5">
                                                    <a class="fancybox" rel="group" href="admin/dashboard/pict/<?php echo $data['foto']; ?>"><img id="pic" src="admin/dashboard/pict/<?php echo $data['foto']; ?>" width="374" class="user-image" alt="User Image" style="border:2px solid #d2d6de"></a>
                                				</div>
                                			</div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Latitude</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="latitude" id='latitude' placeholder="drag marker" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Longitude</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="longitude" id='longitude' placeholder="drag marker" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Alamat</label>
                                                <div class="col-md-5">
                                                    <textarea class="form-control" name="alamat" rows="4" cols="40" readonly="readonly"><?php echo $data['alamat']; ?></textarea>
                                                </div>
                                            </div>
                                			<div class="form-group">
                                                <label class="col-sm-3 control-label">Kelurahan</label>
                                               <div class="col-md-5">
                                                    <input type="text" class="form-control" value="<?php echo $data['nama_kelurahan'] ?>" readonly="readonly">
                                                </div>
                                            </div>
                                			<div class="form-group">
                                                <label class="col-sm-3 control-label">RT</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" value="<?php echo $data['rt'] ?>" readonly="readonly">
                                                </div>
                                            </div>
                                			<div class="form-group">
                                                <label class="col-sm-3 control-label">RW</label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" value="<?php echo $data['rw'] ?>" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Kegiatan</label>
                                                <div class="col-md-5">
                                                    <textarea name="kegiatan" class="form-control" rows="4" cols="40" readonly="readonly"><?php echo $data['kegiatan']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Pengurus</label>
                                                <div class="col-md-5">
                                                    <textarea name="pengurus" class="form-control" rows="4" cols="40" readonly="readonly"><?php echo $data['pengurus']; ?></textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <script type="text/javascript">
                                            //* Fungsi untuk mendapatkan nilai latitude longitude
                                            function updateMarkerPosition(latLng) {
                                                document.getElementById('latitude').value = [latLng.lat()]
                                                document.getElementById('longitude').value = [latLng.lng()]
                                            }

                                            var map = new google.maps.Map(document.getElementById('map'), {
                                                zoom: 14,
                                                center: new google.maps.LatLng(<?php echo $data[2] ?>,<?php echo $data[3] ?>),
                                                mapTypeId: google.maps.MapTypeId.ROADMAP
                                            });

                                            var latLng = new google.maps.LatLng(<?php echo $data[2] ?>,<?php echo $data[3] ?>);

                                			//controler tabel fusion
                                			map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend-open'));
                                			map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend'));

                                			layer = new google.maps.FusionTablesLayer({
                                			  map: map,
                                			  heatmap: { enabled: false },
                                			  query: {
                                				select: "col19\x3e\x3e0",
                                				from: "1dKNUscNBQYxc5FBX84E3-TFJKjblP7gUFoFkGFoV",
                                				where: ""
                                			  },
                                			  options: {
                                				styleId: 2,
                                				templateId: 2
                                			  }
                                			});

                                            /* buat marker yang bisa di drag lalu
                                            panggil fungsi updateMarkerPosition(latLng)
                                            dan letakan posisi terakhir di id=latitude dan id=longitude
                                            */
                                            var marker = new google.maps.Marker({
                                                position : latLng,
                                                title : 'lokasi',
                                                map : map,
                                                icon: 'admin/dashboard/pict/mark2.png'
                                            });

                                            updateMarkerPosition(latLng);
                                            google.maps.event.addListener(marker, 'drag', function() {
                                                updateMarkerPosition(marker.getPosition());
                                            });
                                        </script>
                                    </div>
                                </div>

                            </div><!-- ./col -->
                        </div>

            		</section>

            	</div>

            </div>

            <footer class="main-footer">
                <div class="container">
                    <strong><center>Copyright &copy; 2016</center></strong>
                </div></div>
            </footer>
            </div><!-- wrapper -->

            <!-- jQuery 2.1.4 -->
            <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
            <!-- Bootstrap 3.3.5 -->
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/app.min.js"></script>
            <!-- SlimScroll -->
            <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="plugins/fastclick/fastclick.min.js"></script>
            <script src="dist/js/docs.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="dist/js/demo1.js"></script>
            <!-- Fancy Box -->
            <script type="text/javascript" src="dist/fancybox/jquery.fancybox.pack.js"></script>
            <script type="text/javascript">
            $(document).ready(function(){
                $(".fancybox").fancybox()
            });
            </script>

    </body>

</html>
