<?php
    include('../../config/koneksi.php');
?>
<div class="box-body">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-wpforms"></i> Edit Profil</a></li>
            <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-user"></i> Edit Password</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <?php
                    if (isset($_GET['id_user'])) {
                        $id_user = $_GET['id_user'];
                        $query  = mysqli_query($koneksi,("SELECT * FROM tbl_user WHERE id_user='$id_user'"));
                        $data   = mysqli_fetch_array($query);
                    }
                ?>
                <form class="form-horizontal" action="function/edit.php?aksi=edit_user" method="post" enctype="multipart/form-data">
                    <input class="form-control" type="hidden" name="id_user" value="<?php echo $data[0]; ?>">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Foto</label>
                        <div class="col-md-9">
                            <a class="fancybox" rel="group" href="pict/<?php echo $data['foto']; ?>"><img id="pic" src="pict/<?php echo $data['foto']; ?>" width="100" class="user-image" alt="User Image" style="margin-bottom:10px;border:2px solid #d2d6de"></a>
        					<input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">level</label>
                        <div class="col-md-9">
                            <select class="form-control" name="level">
                                <?php error_reporting(0);
                                    if ($data['level']=="administrator") {
                                        $a = "selected=selected";
                                    }
                                    else if ($data['level']==".....") {
                                        $b = "selected=selected";
                                    }
                                ?>
                                <option value="administrator" <?php echo $a ?>>administrator</option>
                                <option value="....." <?php echo $b ?>>.....</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-default"><i class="fa fa-check-circle"></i> simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="tab_2">
                <?php
                    if (isset($_GET['id_user'])) {
                        $id_user = $_GET['id_user'];
                        $query  = mysqli_query($koneksi,("SELECT * FROM tbl_user WHERE id_user='$id_user'"));
                        $data   = mysqli_fetch_array($query);
                    }
                ?>
                <form class="form-horizontal" action="function/edit.php?aksi=edit_pass" method="post" enctype="multipart/form-data">
                    <input class="form-control" type="hidden" name="id_user" value="<?php echo $data[0]; ?>">
                    <div class="form-group">
                        <label class="col-md-3 control-label">username</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="username" value="<?php echo $data[1]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">password lama <font color="red"><sup>*) harus diisi</sup></font></label>
                        <div class="col-md-9">
                            <input class="form-control" type="password" name="pass_lama" placeholder="input password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">password baru <font color="red"><sup>*) harus diisi</sup></font></label>
                        <div class="col-md-9">
                            <input class="form-control" type="password" name="pass_baru1" placeholder="input password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">konfirmasi password <font color="red"><sup>*) harus diisi</sup></font></label>
                        <div class="col-md-9">
                            <input class="form-control" type="password" name="pass_baru2" placeholder="input password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-default"><i class="fa fa-check-circle"></i> simpan</button>
                            <button type="reset" class="btn btn-default"><i class="fa fa-times-circle"></i> reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
