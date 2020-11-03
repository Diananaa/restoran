<?php 
 include 'koneksi.php';
 date_default_timezone_set('Asia/Jakarta');

 session_start();

 $jmlh = $_POST['jmlh'];
 $m_id = $_POST['id'];
 $date = date('Y-m-d');
 $id = $_SESSION['id'];

 $proses=$mysqli->query("SELECT * from t_detailmakanan where m_id='$m_id' and dm_Tanggal='$date'");
 $ambil=mysqli_fetch_array($proses);

 if (mysqli_num_rows($proses)>0){
    $proses = mysqli_query($mysqli,"UPDATE t_detailmakanan SET dm_JumlahMakanan='$jmlh'
    where m_id='$m_id' and dm_Tanggal='$date'");
 }else{
    $proses = mysqli_query($mysqli,"INSERT INTO t_detailmakanan (m_id, dm_JumlahMakanan, dm_Tanggal, a_id) 
    values('$m_id', '$jmlh', '$date', '$id')");
 }

 if ($proses) {
 	echo "<script> window.location.href='basic_table.php'</script>";
 }
 ?>
