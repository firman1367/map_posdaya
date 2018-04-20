<div class="box box-custom box-solid no-border">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-gears"></i> Management Kelurahan</h3>
        <div class="box-tools">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="hide"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <a class="btn btn-default btn-flat" data-keyboard="false" data-backdrop="static" data-toggle="modal" data-target="#create_kelurahan" style="margin-bottom:12px;"><span class="fa fa-pencil"></span> Input Data</a>
        <div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="bg-custom">
						<th width="8%"><center>No.</center></th>
						<th width="20%"><center>Nama</center></th>
						<th><center>Aksi</center></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$nomer = 1;
						$query = mysqli_query($koneksi,("SELECT * FROM tbl_kelurahan"));
						foreach($query as $data){
					?>
					<tr>
						<td><center><?php echo $nomer; ?></center></td>
						<td><?php echo $data['nama_kelurahan']; ?></td>
						<td>
							<center>
								<a href="#modal_edit_kelurahan" data-toggle="modal" data-id="<?php echo $data['id_kelurahan']; ?>"  class="btn btn-success btn-xs"><span class="fa fa-pencil-square-o"></sapn> Edit</a>
								<a href="function/delete.php?aksi=del_kelurahan&id_kelurahan=<?php echo $data['id_kelurahan']; ?>" onClick="return confirm('anda yakin akan menghapus ini?')" class="btn btn-danger btn-xs"><span class="fa fa-times"> Delete</span></a>
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

        <div class="modal fade" id="modal_edit_kelurahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:rgb(55, 54, 54);color:white;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-pencil-square-o"></i> Edit Kelurahan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal kelurahan -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#modal_edit_kelurahan').on('show.bs.modal', function (e) {
                var id_kelurahan = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'get',
                    url : 'form/edit_kelurahan.php',
                    data :  'id_kelurahan='+ id_kelurahan,
                    success : function(data){
                        $('.fetched-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        </script>

        <!-- Modal -->
        <div class="modal fade" id="create_kelurahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#444444;color:white;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span style="color:white"> &times;</span> </button>
                        <h4 class="modal-title" id="myModalLabel"> Tambah Admin </h4>
                    </div>
                    <div class="modal-body">
                        <form action="function/create.php?aksi=tambah_kelurahan" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nama Kelurahan</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="kelurahan" placeholder="input kelurahan.." required>
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
