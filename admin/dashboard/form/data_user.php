<div class="box box-custom box-solid no-border">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-gears"></i> Management Admin</h3>
        <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="hide"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="close"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <a class="btn btn-default btn-flat" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#create_kategori" style="margin-bottom:12px;"><span class="fa fa-pencil"></span> Input Data</a>
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="bg-custom">
						<th width="8%"><center>No.</center></th>
                        <th class="text-center" width="20%">Foto</th>
						<th width="20%"><center>Nama</center></th>
                        <th width="15%"><center>Level</center></th>
						<th><center>Aksi</center></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$nomer = 1;
						$query = mysqli_query($koneksi,("SELECT * FROM tbl_user"));
						foreach($query as $data){
					?>
					<tr>
						<td><center><?php echo $nomer; ?></center></td>
                        <td class="text-center"><img src="pict/<?php echo $data['foto']; ?>" width="30"></td>
						<td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['level']; ?></td>
						<td>
							<center>
								<a href="#modal_edit_user" data-toggle="modal" data-id="<?php echo $data['id_user']; ?>" class="btn btn-success btn-xs"><span class="fa fa-pencil-square-o"></sapn> Edit</a>
								<a href="function/delete.php?aksi=del_user&id_user=<?php echo $data['id_user']; ?>" onClick="return confirm('anda yakin akan menghapus ini?')" class="btn btn-danger btn-xs"><span class="fa fa-times"> Delete</span></a>
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

        <div class="modal fade" id="modal_edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:rgb(55, 54, 54);color:white;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> Form Edit</h4>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal edit user -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#modal_edit_user').on('show.bs.modal', function (e) {
                var id_user = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'get',
                    url : 'form/edit_user2.php',
                    data :  'id_user='+ id_user,
                    success : function(data){
                        $('.fetched-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        </script>

		<!-- Modal -->
		<div class="modal fade" id="create_kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color:#444444;color:white;">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span style="color:white"> &times;</span> </button>
						<h4 class="modal-title" id="myModalLabel"> Tambah Admin </h4>
					</div>
					<div class="modal-body">
						<form role="form" action="function/create.php?aksi=tambah_user" class="form-horizontal" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label class="col-sm-3 control-label">Username</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="username" placeholder="Input Nama Kategori" required>
								</div>
							</div>
                            <div class="form-group">
								<label class="col-sm-3 control-label">Password</label>
								<div class="col-md-8">
									<input type="password" class="form-control" name="password" placeholder="Input Nama Kategori" required>
								</div>
							</div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Foto</label>
                                <div class="col-md-8">
                                    <input type="file" name="foto" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
								<label class="col-sm-3 control-label">Level</label>
								<div class="col-md-8">
									<select class="form-control" name="level">
                                        <option>administrator</option>
                                        <option>....</option>
									</select>
								</div>
							</div>
							<div class="modal-footer" style="text-align:left">
								<button type="submit" class="btn btn-default" name="create-kategori" style="margin-right:5px;">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal -->
	</div>
</div>
