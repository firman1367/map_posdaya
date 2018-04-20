<?php
    session_start();
    include "config/koneksi.php";

    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $password2  = md5($password);

    $query  = mysqli_query($koneksi,("SELECT * FROM tbl_user WHERE username = '$username' AND password='$password2'"));
    $cek    = mysqli_num_rows($query);
    $data   = mysqli_fetch_array($query);

    //field
	$id 		= $data['id_user'];
	$username	= $data['username'];
	$password	= $data['password'];
    $level      = $data['level'];

	if ($cek) {

		$_SESSION['username'] 	= $username;
		$_SESSION['password'] 	= $password;
		$_SESSION['id_user'] 	= $id;
		$_SESSION['level']    	= $level;

		header('location:dashboard/home');
	}else{
		echo "<script language='javascript'>alert('Silahkan isi data dengan benar')</script>";
  		echo "<script language='javascript'>window.location = 'index.php'</script>";
	}
?>
