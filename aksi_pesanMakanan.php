<?php 
 include 'admin/koneksi.php';
 date_default_timezone_set('Asia/Jakarta');

 session_start();

 $jmlh = $_POST['jmlh'];
 $dm_id = $_POST['submit'];
 $harga = $_POST['harga']*$jmlh;
 $id = $_GET['id'];
 $date = date('Y-m-d');
echo "SELECT * from t_pesan LEFT JOIN t_detailpesan ON t_pesan.dp_id=t_detailpesan.dp_id where dm_id='$dm_id' and dp_tanggal='$date'";
 $proses=$mysqli->query("SELECT * from t_pesan LEFT JOIN t_detailpesan ON t_pesan.dp_id=t_detailpesan.dp_id where dm_id='$dm_id' and dp_tanggal='$date'");
 if($proses->num_rows>0){
   $ambil=mysqli_fetch_array($proses);
 }

 if ($proses->num_rows>0){

    //update pesanan
     $jmlh=$jmlh+$ambil['p_banyak'];
     $harga=$_POST['harga']*$jmlh;
      mysqli_query($mysqli,"UPDATE t_pesan SET p_banyak='$jmlh', p_TotalHarga='$harga'
      where dp_id='".$ambil['dp_id']."'");
    //total harga pesanan
      $sum=$mysqli->query("SELECT sum(p_TotalHarga) as 'sum' from t_pesan where dp_id='".$ambil['dp_id']."'");
      $sum=mysqli_fetch_array($sum);
      $sum=$sum['sum'];
      //update total pesanan di transaksi
      $proses = mysqli_query($mysqli,"UPDATE t_detailpesan SET dp_totalbayar='$sum'
      where dp_id='".$ambil['dp_id']."'");
 }else{
    // cari id transaksi terakhir yang berawalan tanggal hari ini
   $query = "SELECT max(dp_id) AS last FROM t_detailpesan WHERE dp_id LIKE '$date'";
   $hasil = $mysqli->query($query);
   $data  = mysqli_fetch_array($hasil);
   $lastNoTransaksi = $data['last'];
   
   // baca nomor urut transaksi dari id transaksi terakhir 
   $lastNoUrut = substr($lastNoTransaksi, 8, 4); 
   
   // nomor urut ditambah 1
   $nextNoUrut = $lastNoUrut + 1;
   
   // membuat format nomor transaksi berikutnya
   $nextNoTransaksi = 'KK'.$date.sprintf('%04s', $nextNoUrut);
   //buat data transaksi
   mysqli_query($mysqli,"INSERT INTO t_detailpesan (dp_id,dp_tanggal) 
   values('$nextNoTransaksi', '$date')");
   // buat detail pesanan
   $proses = mysqli_query($mysqli,"INSERT INTO t_pesan (dp_id,dm_id, u_Username, p_banyak, p_TotalHarga) 
   values('$nextNoTransaksi', '$dm_id','$id', '$jmlh', '$harga')");
   //total harga pesanan
   $sum=$mysqli->query("SELECT sum(p_TotalHarga) as 'sum' from t_pesan where dp_id='$nextNoTransaksi'");
   $sum=mysqli_fetch_array($sum);
   $sum=$sum['sum'];
   //update total pesanan di transaksi
   $proses = mysqli_query($mysqli,"UPDATE t_detailpesan SET dp_totalbayar='$sum'
   where dp_id='$nextNoTransaksi'");

 }

 if ($proses) {
 	// echo "<script> window.location.href='index.php#menu'</script>";
 }
 ?>
