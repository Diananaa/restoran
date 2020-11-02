<?php 
 include 'koneksi.php';
 session_start();

 $makanan = $_POST['makanan'];
 $harga = $_POST['harga'];
 $deskripsi = $_POST['deskripsi'];
 $id = $_SESSION['id'];

 $proses = mysqli_query($mysqli,"INSERT INTO t_makanan (a_id, m_namamakanan, m_harga, m_descmakanan) 
 values('$id','$makanan', '$harga', '$deskripsi')");

 if ($proses) {
 	echo "<script> alert('Data Berhasil Di Input');</script>";
 	header('location:basic_table.php');
 }
 ?>
