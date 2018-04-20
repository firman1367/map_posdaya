<?php
    require_once('layout/header.php');
    include('admin/config/koneksi.php');
?>

        <div class="content-wrapper">

        	<div class="container">

        		<section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- /.box-body -->
                            <div class="box box-primary box-solid no-border">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Profil</h3>
                                    <div class='box-tools'>
                                        <button class='btn btn-box-tool' data-toggle='tooltip' title='hide' data-widget='collapse'><i class='fa fa-minus'></i></button>
                                        <button class='btn btn-box-tool' data-toggle='tooltip' title='remove' data-widget='remove'><i class='fa fa-times'></i></button>
                                    </div><!-- /.box-tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                  	<dl>
                                        <p style="text-align: justify;padding:0px 5px 0px 5px;font-size:22px;">
                                            Kecamatan Cigombong adalah salah satu Kecamatan Pemekaran dari Kecamatan Cijeruk, pada tanggal 17 Juni 2005,
                                            Berdasarkan Peraturan Daerah (PERDA) Nomor 26 Tahun 2005. Menurut Sejarah Nama Cigombong memiliki arti ialah
                                            salah satu nama yang diberi oleh Leluhur dan Sesepuh.Cigombong diambil dari adanya air yang mengalir melintasi
                                            gombong (AWI) makanya secara singkat oleh Leluhur dan Sesepuh serta tokoh-tokoh Agama dan Masyarakat serta Pemuda
                                            memberi namanya itu ialah Cigombong (CI-GOMBONG).
                                    </dl>
                                    <img src="gambar/sto.png" style="text-align:center;display:block;margin-left:auto;margin-right:auto;" height="600" width="900">
                            	</div><!-- /.box-body -->

                            </div><!-- /.box -->
                            <div class="box no-border">
                                <div class="box-body">
                                    <div id="peta" style="width:100%;height:500px;"></div>
                                    <script type="text/javascript">

                                    (function() {
                                        window.onload = function() {
                                            var map;
                                            var locations = [
                                                <?php

                    								$query  = mysqli_query($koneksi,("SELECT * FROM tbl_wilayah"));
                    								// ambil nama,lat dan lon dari table lokasi
                    								while($data=mysqli_fetch_array($query)){
                    									?>
                    									['<img src="admin/dashboard/pict/<?php echo $data['foto'] ?>" width="190"><br>PosDaya : <?php echo $data['nama_tempat'];?></br>Latitude: <?php echo $data['latitude'];?><br>Longitude: <?php echo $data['longitude'];?><br><a target="_blank" href="detail_lokasi.php?id_tempat=<?php echo $data['id_tempat']; ?>">Selengkapnya</a>', <?php echo $data['latitude'];?>, <?php echo $data['longitude'];?>],
                    									<?php } ?>

                                                ];

                                                //Parameter Google maps
                                                var options = {
                                                    zoom: 12, //level zoom
                                                    //posisi tengah peta
                                                    center: new google.maps.LatLng(-6.708255, 106.8190983),
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                                };



                                                // Buat peta di
                                                var map = new google.maps.Map(document.getElementById('peta'), options);

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

                    							// Tambahkan Marker
                                                var infowindow = new google.maps.InfoWindow();

                                                var marker, i;
                                                /* kode untuk menampilkan banyak marker */
                                                for (i = 0; i < locations.length; i++) {
                                                    marker = new google.maps.Marker({
                                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                        map: map,
                                                        icon: 'admin/dashboard/pict/mark2.png'
                                                    });
                                                    /* menambahkan event clik untuk menampikan
                                                    infowindows dengan isi sesuai denga
                                                    marker yang di klik */

                                                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                                        return function() {
                                                            infowindow.setContent(locations[i][0]);
                                                            infowindow.open(map, marker);
                                                        }
                                                    })(marker, i));
                                                }


                                            };
                                        })();

                                    </script>
                    			</div>
                            </div>
                        </div><!-- ./col -->
                    </div>

        		</section>

        	</div>

        </div>

<!-- footer -->
<?php require_once('layout/footer.php'); ?>
<!-- end footer -->
