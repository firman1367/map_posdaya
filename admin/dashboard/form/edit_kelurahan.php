<?php
    include('../../config/koneksi.php');
    if (isset($_GET['id_kelurahan'])) {
        $id_kelurahan  = $_GET['id_kelurahan'];
        $query         = mysqli_query($koneksi,("SELECT * FROM tbl_kelurahan WHERE id_kelurahan = '$id_kelurahan'"));
        $data          = mysqli_fetch_array($query);
    }
?>
<div class="box-body">
    <form action="function/edit.php?aksi=edit_kelurahan" class="form-horizontal" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="id_kelurahan" value="<?php echo $data[0] ?>">
        <div class="form-group">
            <label class="col-sm-3 control-label">Nama kelurahan</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="kelurahan" value="<?php echo $data[1] ?>" id='nama_lokasi'>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button name="simpan" type="submit" class="btn btn-default" style="margin-right:5px;"><i class="fa fa-check-circle"></i> simpan</button>
            </div>
        </div>
    </form>
</div>
