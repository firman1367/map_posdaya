<?php
    session_start();
    include "../../config/koneksi.php";

    $aksi = $_GET['aksi'];

    if ($aksi == 'tambah_user') {
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $password2  = md5($password);
        $folder		= '../pict';
        $tmp_name	= $_FILES["foto"]["tmp_name"];
		$link 		= $folder."/".$_FILES["foto"]["name"];
        $level      = $_POST['level'];
        $query      = mysqli_query($koneksi,("SELECT username FROM tbl_user WHERE username = '$username'"));
        $cek        = mysqli_num_rows($query);

        if ($cek > 0) {
            echo "<script language='javascript'>alert('data telah tersedia')</script>";
      		echo "<script language='javascript'>window.location = '../index.php?page=user'</script>";
        }else {
            //Upload Foto ke Folder Foto
            move_uploaded_file($tmp_name, $link);

            mysqli_query($koneksi,("INSERT INTO tbl_user VALUES (NULL,'$username','$password2','$link','$level')")) or die(mysql_errno());
            header('location:../index.php?page=user');
        }
    }
    elseif ($aksi == 'tambah_lokasi') {
        $lokasi     = $_POST['nama_lokasi'];
        $lat        = $_POST['latitude'];
        $long       = $_POST['longitude'];
        $alamat     = $_POST['alamat'];
        $kelurahan  = $_POST['kelurahan'];
        $rt         = $_POST['rt'];
        $rw         = $_POST['rw'];
        $kegiatan   = $_POST['kegiatan'];
        $pengurus   = $_POST['pengurus'];
        $folder		= '../pict';
        $tmp_name	= $_FILES["foto"]["tmp_name"];
		$link 		= $folder."/".$_FILES["foto"]["name"];

		//Upload Foto ke Folder Foto
        move_uploaded_file($tmp_name, $link);

        $query      = mysqli_query($koneksi,("SELECT nama_tempat FROM tbl_wilayah WHERE nama_tempat = '$lokasi'"));
        $cek        = mysqli_num_rows($query);
        if ($cek > 0) {
            echo "<script language='javascript'>alert('data telah tersedia')</script>";
            echo "<script language='javascript'>window.location = '../index.php?page=lokasi'</script>";
        }else {
            mysqli_query($koneksi,("INSERT INTO tbl_wilayah VALUES(NULL,'$lokasi','$lat','$long','$link','$alamat','$kelurahan','$rt','$rw','$kegiatan','$pengurus')"));
            header('location:../index.php?page=lokasi');
        }
    }
    elseif ($aksi == 'tambah_kelurahan'){
        $kelurahan  = $_POST['kelurahan'];
        $query      = mysqli_query($koneksi,("SELECT * FROM tbl_kelurahan WHERE nama_kelurahan = '$kelurahan'"));
        $cek        = mysqli_num_rows($query);

        if ($cek > 0) {
            echo "<script language='javascript'>alert('data telah tersedia')</script>";
      		echo "<script language='javascript'>window.location = '../index.php?page=kelurahan'</script>";
        }else {
            mysqli_query($koneksi,("INSERT INTO tbl_kelurahan VALUES(NULL,'$kelurahan')")) or die (mysql_errno());
            header ("location:../index.php?page=kelurahan");
        }
    }
?>
