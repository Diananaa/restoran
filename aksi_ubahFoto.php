<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once 'admin/koneksi.php';

    $id     = $_GET['id'];
    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($filename!=""){
        if(!in_array($ext,$ekstensi) ) {
            echo "<script> alert('Ekstensi salah');window.location.href='profil.php'</script>";
        }else{
            if($ukuran < 1044070){		
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], 'image/user/'.$rand.'_'.$filename);
                $proses = mysqli_query($mysqli,"UPDATE t_user SET u_Foto='$xx' where u_id='$id'");
            }else{
                echo "<script> alert('Ukuran terlalu besar, maksimal 1 MB!');window.location.href='profil.php'</script>";
            }
        }
    }  
    if ($proses) {
        echo "<script> alert('Data berhasil di Update');window.location.href='profil.php'</script>";
    }
    else{
        echo "<script> alert('Data gagal di Update');window.location.href='profil.php'</script>";

    }

?>