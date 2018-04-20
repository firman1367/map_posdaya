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
        <form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
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
                    <a class="fancybox" rel="group" href="pict/<?php echo $data['foto']; ?>"><img id="pic" src="pict/<?php echo $data['foto']; ?>" width="374" class="user-image" alt="User Image" style="border:2px solid #d2d6de"></a>
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
                icon: 'pict/mark2.png'
            });

            updateMarkerPosition(latLng);
            google.maps.event.addListener(marker, 'drag', function() {
                updateMarkerPosition(marker.getPosition());
            });
        </script>
    </div>
</div>
