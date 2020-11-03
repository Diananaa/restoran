<?php 
 include 'admin/koneksi.php';
 session_start();

 $u_Username = $_POST['username'];
 $u_nama = $_POST['name'];
 $u_alamat = $_POST['alamat'];
 $u_hp = $_POST['hp'];
 $id = $_GET['id'];

 $proses = mysqli_query($mysqli,"UPDATE t_user SET u_Username='$u_Username', 
                u_NamaUser='$u_nama', u_AlamatUser='$u_alamat', u_NoHp='$u_hp' where u_id='$id'");

 if ($proses) {
 	echo "<script> alert('Data berhasil diubah.');window.location.href='logout.php'</script>";
 }
 ?>
