<div class="box box-custom box-solid no-border">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-gears"></i> Management Lokasi Posdaya</h3>
        <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="hide"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div id="map"></div>
        <form action="function/create.php?aksi=tambah_lokasi" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="nama_lokasi" placeholder="Input Nama Posdaya" required>
                </div>
            </div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Foto</label>
				<div class="col-md-5">
					<input type="file" name="foto" class="form-control">
				</div>
			</div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Latitude</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="latitude" id='latitude' placeholder="drag marker" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Longtitude</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="longitude" id='longitude' placeholder="drag marker" required>
                </div>
            </div>
			<div class="form-group">
                <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-md-5">
                    <textarea class="form-control" name="alamat" rows="4" cols="40" required="required"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Kelurahan</label>
                <div class="col-md-5">
                    <select class="form-control" name="kelurahan">
                        <option>--- Select ---</option>
                        <?php
                            $query  = mysqli_query($koneksi,("SELECT * FROM tbl_kelurahan"));
                            foreach ($query as $data){
                        ?>
                        <option value="<?php echo $data['id_kelurahan'] ?>"><?php echo $data['nama_kelurahan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">RT</label>
                <div class="col-md-5">
                    <select class="form-control" name="rt">
                        <?php
                            echo "<option>--- Select ---</option>";
                            for ($i=1; $i <= 10 ; $i++) {
                                echo "<option>$i</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">RW</label>
                <div class="col-md-5">
                    <select class="form-control" name="rw">
                        <?php
                            echo "<option>--- Select ---</option>";
                            for ($i=1; $i <= 15 ; $i++) {
                                echo "<option>$i</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Kegiatan</label>
                <div class="col-md-5">
                    <textarea name="kegiatan" class="form-control" rows="4" cols="40" required="required"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Pengurus</label>
                <div class="col-md-5">
                    <textarea name="pengurus" class="form-control" rows="4" cols="40" required="required"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button name="simpan" type="submit" class="btn btn-default" style="margin-right:5px;"><i class="fa fa-check-circle"></i> simpan</button>
                    <button type="reset" class="btn btn-default"><i class="fa fa-times-circle"></i> reset</button>
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
                center: new google.maps.LatLng(-6.752276268776849,106.78961920712891),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var latLng = new google.maps.LatLng(-6.752276268776849,106.78961920712891);

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
                icon: 'pict/mark2.png',
                draggable : true
            });

            updateMarkerPosition(latLng);
            google.maps.event.addListener(marker, 'drag', function() {
                updateMarkerPosition(marker.getPosition());
            });
        </script>
        <div class="table-responsive" style="margin-top:10px;">
            <label class="bg-custom" style="padding:7px;"><i class="fa fa-globe"></i> Data Lokasi</label>
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="bg-custom">
                        <th width="8%"><center>No.</center></th>
                        <th width="32%"><center>Nama Lokasi</center></th>
                        <th width="15%"><center>latitude</center></th>
                        <th width="15%"><center>longitude</center></th>
                        <th><center>Aksi</center></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomer = 1;
                        $query = mysqli_query($koneksi,("SELECT * FROM tbl_wilayah"));
                        foreach($query as $data){
                    ?>
                    <tr>
                        <td><center><?php echo $nomer; ?></center></td>
                        <td><?php echo $data['nama_tempat']; ?></td>
                        <td><?php echo $data['latitude']; ?></td>
                        <td><?php echo $data['longitude']; ?></td>
                        <td>
                            <center>
                                <a href="?page=edit_lokasi&id_lokasi=<?php echo $data['id_tempat']; ?>" class="btn btn-success btn-xs"><span class="fa fa-pencil-square-o"></sapn> Edit</a>
                                <a href="function/delete.php?aksi=del_lokasi&id_lokasi=<?php echo $data['id_tempat']; ?>" onClick="return confirm('anda yakin akan menghapus ini?')" class="btn btn-danger btn-xs"><span class="fa fa-times"> Delete</span></a>
                            </span>
                        </td>
                    </tr>
                    <?php
                        $nomer ++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
