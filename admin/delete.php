<?php
include_once 'koneksi.php';
$id=$_GET['id'];
$proses = mysqli_query($mysqli,"delete from t_makanan where m_id='$id'");
if ($proses) {
    echo "<script> alert ('Data Berhasil Dihapus');";
    header('location:basic_table.php');
 
}
else{
    echo "<script> alert ('Data Gagal Dihapus');";
}


?>