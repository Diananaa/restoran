<?php
 session_start();

if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $makanan    = $_POST['makanan'];
    $harga      = $_POST['harga'];
    $deskripsi  = $_POST['deskripsi'];
    $aid        = $_POST['id'];

    include_once 'koneksi.php';
    
    $proses = mysqli_query($mysqli,"UPDATE t_makanan SET a_id='$aid', m_namamakanan='$makanan', m_harga='$harga', m_descmakanan='$deskripsi'
    where m_id='$id'");
    
    if ($proses) {
        echo "<script> alert('Data berhasil di Update');";
         header('location:basic_table.php');
    }
    else{
        echo "<script> alert('Data gagal di Update');";
    }
}
?>