<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once 'koneksi.php';

if (isset($_POST['update'])) {
    $nama       = $_POST['nama'];
    $username   = $_POST['username'];
    $alamat     = $_POST['alamat'];
    $tgl        = $_POST['tgl'];
    $id         = $_GET['id'];
    $password   = $_POST['password'];
    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($filename!="" && $password!=""){
        if(!in_array($ext,$ekstensi) ) {
            echo "<script> alert('Ekstensi salah');window.location.href='profile.php'</script>";
        }else{
            if($ukuran < 1044070){		
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
                $proses = mysqli_query($mysqli,"UPDATE t_admin SET a_Username='$username', a_pwadmin='$password', 
                a_NamaAdmin='$nama', a_TglLahir='$tgl', a_Alamat='$alamat',a_Foto='$xx' where a_id='$id'");
            }else{
                echo "<script> alert('Ukuran terlalu besar, maksimal 1 MB!');window.location.href='profile.php'</script>";
            }
        }
    }elseif ($filename!="" && $password=="") {
        if(!in_array($ext,$ekstensi) ) {
            echo "<script> alert('Ekstensi salah');window.location.href='profile.php'</script>";
        }else{
            if($ukuran < 1044070){		
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$rand.'_'.$filename);
                $proses = mysqli_query($mysqli,"UPDATE t_admin SET a_Username='$username', 
                a_NamaAdmin='$nama', a_TglLahir='$tgl', a_Alamat='$alamat',a_Foto='$xx' where a_id='$id'");
            }else{
                echo "<script> alert('Ukuran terlalu besar, maksimal 1 MB!');window.location.href='profile.php'</script>";
                header('location:profile.php');
            }
        }
    }elseif ($filename=="" && $password!="") {
        $proses = mysqli_query($mysqli,"UPDATE t_admin SET a_Username='$username', a_pwadmin='$password', 
                a_NamaAdmin='$nama', a_TglLahir='$tgl', a_Alamat='$alamat' where a_id='$id'");
    }else {
        $proses = mysqli_query($mysqli,"UPDATE t_admin SET a_Username='$username', 
                a_NamaAdmin='$nama', a_TglLahir='$tgl', a_Alamat='$alamat' where a_id='$id'");
    }

    if ($proses) {
        echo "<script> alert('Data berhasil di Update');window.location.href='index.php'</script>";
    }
    else{
        echo "<script> alert('Data gagal di Update');window.location.href='profile.php'</script>";

    }
}
?>