<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once 'admin/koneksi.php';
session_start();

    $diskon       = $_POST['diskon'];
    $dp_id       = $_POST['dp_id'];
    $uid = $_SESSION['id'];

    $i=0;
    foreach ($_POST['p_id'] as $id) {
        $catatan = $_POST['catatan'][$i];
        $jmlh = $_POST['jmlh'][$i];
        $harga=$jmlh*$_POST['harga'][$i++];
        mysqli_query($mysqli,"UPDATE t_pesan SET p_banyak='$jmlh', p_DescPesanan='$catatan', p_TotalHarga='$harga'
             where p_id='$id'");
    }
    //total harga pesanan
    $sum=$mysqli->query("SELECT sum(p_TotalHarga) as 'sum' from t_pesan where dp_id='$dp_id' and u_Username='$uid'");
    $sum=mysqli_fetch_array($sum);
    $sum=$sum['sum'];
    if($diskon!=""){
        $temp=($sum*$diskon)/100;
        $sum=$sum-$temp;
    }
    //update total pesanan di transaksi
    $proses = mysqli_query($mysqli,"UPDATE t_detailpesan SET dp_totalbayar='$sum', dp_diskon='$diskon'
    where dp_id='$dp_id'");     

    if ($proses) {
        echo "<script> alert('Pesanan telah dibuat terima kasih.');window.location.href='index.php'</script>";
    }
    else{
        echo "<script> alert('Pesanan gagal di buat.');window.location.href='cart.php'</script>";

    }

?>