<?php
if (isset($_POST['update'])) {
    $nama       = $_POST['nama'];
    $username   = $_POST['username'];
    $alamat     = $_POST['alamat'];
    $tgl        = $_POST['tgl'];
    $id         = $_GET['id'];
    include_once 'koneksi.php';

    if($_POST['password']!=""){
        $password   = $_POST['password'];
        $proses = mysqli_query($mysqli,"UPDATE t_admin SET a_Userame='$username', a_pwadmin='$password', 
        a_NamaAdmin='$nama', a_TglLahir='$tgl', a_Alamat='$alamat' where a_id='$id'");
    }else{
        $proses = mysqli_query($mysqli,"UPDATE t_admin SET a_Username='$username',a_NamaAdmin='$nama', a_TglLahir='$tgl', a_Alamat='$alamat' where a_id='$id'");
    }

    if ($proses) {
        echo "<script> alert('Data berhasil di Update');";
         header('location:index.php');
    }
    else{
        echo "<script> alert('Data gagal di Update');";
    }
}
?>