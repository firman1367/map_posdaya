<?php

    if ($_GET["page"]=="home") {
        echo "Panel Admin";
    }
    else if ($_GET['page']=="lokasi") {
        echo "Management Lokasi";
    }
    else if ($_GET['page']=="edit_lokasi") {
        echo "Edit Lokasi";
    }
    else if ($_GET['page']=="user") {
        echo "Management User";
    }
    else if ($_GET['page']=="edit_user") {
        echo "Edit User";
    }
    else if ($_GET['page']=="profil") {
        echo "form/profil.php";
    }
    else if ($_GET["page"]=="detail_lokasi") {
        if (isset($_GET['id_tempat'])) {
            $id_tempat = $_GET['id_tempat'];
            $query  = mysqli_query($koneksi,("SELECT * FROM tbl_wilayah WHERE id_tempat = '$id_tempat'"));
            $data   = mysqli_fetch_array($query);

            echo $data['nama_tempat'];
        }else{
            echo "error";
        }
    }
    else if ($_GET['page'] == "kelurahan") {
        echo "Management Kelurahan";
    }
    else if ($_GET['page'] == "edit_kelurahan") {
        echo "Edit Kelurahan";
    }
    else{
        echo "Panel Admin";
    }

?>
