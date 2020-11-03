<?php
include_once 'admin/koneksi.php';
session_start();

$p_id=$_GET['p_id'];
$dp_id=$_GET['dp_id'];
$id = $_SESSION['id'];

$proses = mysqli_query($mysqli,"delete from t_pesan where p_id='$p_id'");
//total harga pesanan
$sum=$mysqli->query("SELECT sum(p_TotalHarga) as 'sum' from t_pesan where dp_id='$dp_id' and u_Username='$id'");
$sum=mysqli_fetch_array($sum);
$sum=$sum['sum'];
if($sum==0){
    $proses = mysqli_query($mysqli,"delete from t_detailpesan where dp_id='$dp_id'");

}else{
    //update total pesanan di transaksi
    $proses = mysqli_query($mysqli,"UPDATE t_detailpesan SET dp_totalbayar='$sum'
    where dp_id='$dp_id'");   
}

if ($proses) {
    echo "<script> alert ('Data Berhasil Dihapus');window.location.href='cart.php'</script>";
}
else{
    echo "<script> alert ('Data Gagal Dihapus');window.location.href='cart.php'</script>";
}


?>