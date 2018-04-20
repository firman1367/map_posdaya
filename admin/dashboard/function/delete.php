<?php
    session_start();
    include "../../config/koneksi.php";

    $aksi           = $_GET['aksi'];
    $id_user        = $_GET['id_user'];
    $id_tempat      = $_GET['id_lokasi'];
    $id_kelurahan   = $_GET['id_kelurahan'];

    if ($aksi == 'del_user') {
        mysqli_query($koneksi,("DELETE FROM tbl_user WHERE id_user = '$id_user'")) or die(mysql_errno());
        header('location:../index.php?page=user');
    }
    elseif ($aksi == 'del_lokasi') {
        mysqli_query($koneksi,("DELETE FROM tbl_wilayah WHERE id_tempat = '$id_tempat'")) or die(mysql_errno());
        header('location:../index.php?page=lokasi');
    }
    elseif ($aksi == 'del_kelurahan') {
        mysqli_query($koneksi,("DELETE FROM tbl_kelurahan WHERE id_kelurahan = '$id_kelurahan'")) or die (mysql_errno());
        header('location:../index.php?page=kelurahan');
    }
?>
