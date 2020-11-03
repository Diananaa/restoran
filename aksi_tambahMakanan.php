<?php 
 include 'admin/koneksi.php';
 date_default_timezone_set('Asia/Jakarta');

 session_start();

 $id = $_GET['id'];
 $jmlh = $_POST['jmlh'];
 $m_id = $_POST['submit'];
 $date = date('Y-m-d H:i:s');

 $proses=$mysqli->query("SELECT * from t_detailmakanan where m_id='$m_id' and a_username='$id'");
 $ambil=mysqli_fetch_array($proses);

 if (mysqli_num_rows($proses)>0){
     $jmlh=$ambil['dm_JumlahMakanan']+$jmlh;
    $proses = mysqli_query($mysqli,"UPDATE t_detailmakanan SET dm_JumlahMakanan='$jmlh', dm_Tanggal='$date'
    where m_id='$m_id' and a_username='$id'");
 }else{
    $proses = mysqli_query($mysqli,"INSERT INTO t_detailmakanan (m_id, a_username, dm_JumlahMakanan, dm_Tanggal) 
    values('$m_id','$id', '$jmlh', '$date')");
 }

 if ($proses) {
 	echo "<script> window.location.href='index.php'</script>";
 }
 ?>
