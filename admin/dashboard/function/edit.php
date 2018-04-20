<?php
    session_start();
    include "../../config/koneksi.php";

    $aksi = $_GET['aksi'];

    if ($aksi == 'edit_user') {
        $id_user    = $_POST['id_user'];
        $data		= mysqli_query($koneksi,("SELECT * FROM tbl_user WHERE id_user = '$id_user'"));
        $row		= mysqli_fetch_array($data);
        $folder		= '../pict';
        $tmp_name 	= $_FILES["foto"]["tmp_name"];
		$edit 		= $folder."/".$_FILES["foto"]["name"];
        $level      = $_POST['level'];

        if (!empty($tmp_name)) {
	 		move_uploaded_file($tmp_name, $edit);

			$query = mysqli_query($koneksi,("UPDATE tbl_user SET foto = '$edit', level = '$level' WHERE id_user='$id_user'")) or die(mysql_error());

            if ($query) {
                echo "<script language='javascript'>alert('update berhasil')</script>";
                echo "<script language='javascript'>window.location = '../index.php?page=user'</script>";
            }else{
                echo "<script language='javascript'>alert('update gagal')</script>";
                echo "<script language='javascript'>window.location = '../index.php?page=user'</script>";
            }

		}else{
			$query_2 = mysqli_query($koneksi,("UPDATE tbl_user SET foto = '$row[foto]', level = '$level' WHERE id_user='$id_user'")) or die(mysql_error());

            if ($query_2) {
                echo "<script language='javascript'>alert('update berhasil')</script>";
                echo "<script language='javascript'>window.location = '../index.php?page=user'</script>";
            }else{
                echo "<script language='javascript'>alert('update gagal')</script>";
                echo "<script language='javascript'>window.location = '../index.php?page=user'</script>";
            }
		}
    }
    else if ($aksi == 'edit_pass') {
        $id_user        = $_POST['id_user'];
        $username       = $_POST['username'];
        $pass_old       = $_POST['pass_lama'];
        $pass_old_2     = md5($pass_old);
        $pass_new       = $_POST['pass_baru1'];
        $pass_conf      = $_POST['pass_baru2'];
        $pass_conf_2    = md5($pass_conf);

        $query          = mysqli_query($koneksi,("SELECT * FROM tbl_user WHERE id_user = '$id_user'"));
        $row            = mysqli_fetch_array($query);

        if ($pass_old_2 == $row['password']) {
            if ($pass_conf == $pass_new) {
                mysqli_query($koneksi,("UPDATE tbl_user SET password = '$pass_conf_2' WHERE id_user = '$id_user'")) or die(mysql_errno());
                echo "<script language='javascript'>alert('update berhasil')</script>";
                echo "<script language='javascript'>window.location = '../index.php?page=user'</script>";
            }else {
                echo "<script language='javascript'>alert('update gagal')</script>";
                echo "<script language='javascript'>window.location = '../index.php?page=edit_user&id_user=$id_user'</script>";
            }
        }else{
            echo "<script language='javascript'>alert('update gagal')</script>";
            echo "<script language='javascript'>window.location = '../index.php?page=edit_user&id_user=$id_user'</script>";
        }
    }
    elseif ($aksi == 'edit_lokasi') {
        $id_lokasi  = $_POST['id_lokasi'];
        $lokasi     = $_POST['nama_lokasi'];
        $lat        = $_POST['latitude'];
        $long       = $_POST['longitude'];
        $alamat     = $_POST['alamat'];
        $kelurahan  = $_POST['kelurahan'];
        $rt         = $_POST['rt'];
        $rw         = $_POST['rw'];
        $kegiatan   = $_POST['kegiatan'];
        $pengurus   = $_POST['pengurus'];
        $data		= mysqli_query($koneksi,("SELECT * FROM tbl_wilayah WHERE id_tempat = '$id_lokasi'"));
        $row		= mysqli_fetch_array($data);
        $folder		= '../pict';
        $tmp_name 	= $_FILES["foto"]["tmp_name"];
		$edit 		= $folder."/".$_FILES["foto"]["name"];

        if (!empty($tmp_name)) {
	 		move_uploaded_file($tmp_name, $edit);

			$query = mysqli_query($koneksi,("UPDATE tbl_wilayah SET nama_tempat = '$lokasi', latitude = '$lat', longitude ='$long', foto = '$edit', alamat = '$alamat', id_kelurahan = '$kelurahan', rt = '$rt', rw = '$rw', kegiatan = '$kegiatan', pengurus = '$pengurus' WHERE id_tempat = '$id_lokasi'")) or die(mysql_error());

            if($query){
                echo "<script language='javascript'>alert('update berhasil')</script>";
                echo "<script language='javascript'>window.location = '../index.php?page=lokasi'</script>";
            }else{
                echo "<script language='javascript'>alert('update gagal')</script>";
                echo "<script language='javascript'>window.location = '../index.php?page=lokasi'</script>";
            }

		}else{
			$query_2 = mysqli_query($koneksi,("UPDATE tbl_wilayah SET nama_tempat = '$lokasi', latitude = '$lat', longitude ='$long', foto = '$row[foto]', alamat = '$alamat', id_kelurahan = '$kelurahan', rt = '$rt', rw = '$rw', kegiatan = '$kegiatan', pengurus = '$pengurus' WHERE id_tempat = '$id_lokasi'")) or die(mysql_error());

            if($query_2){
                echo "<script language='javascript'>alert('update berhasil')</script>";
                echo "<script language='javascript'>window.location = '../index.php?page=lokasi'</script>";
            }else{
                echo "<script language='javascript'>alert('update gagal')</script>";
                echo "<script language='javascript'>window.location = '../index.php?page=lokasi'</script>";
            }
		}
    }
    elseif ($aksi == 'edit_kelurahan') {
        $id_kelurahan   = $_POST['id_kelurahan'];
        $kelurahan      = $_POST['kelurahan'];
        $query          = mysqli_query($koneksi,("UPDATE tbl_kelurahan SET nama_kelurahan = '$kelurahan' WHERE id_kelurahan = '$id_kelurahan'")) or die (mysql_errno());

        if ($query) {
            echo "<script language='javascript'>alert('update berhasil')</script>";
            echo "<script language='javascript'>window.location = '../index.php?page=kelurahan'</script>";
        }else{
            echo "<script language='javascript'>alert('update gagal')</script>";
            echo "<script language='javascript'>window.location = '../index.php?page=kelurahan'</script>";
        }
    }
?>
