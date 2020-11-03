<?php 
 include 'admin/koneksi.php';
 session_start();

 $u_pwuser = password_hash($_POST['password'],PASSWORD_DEFAULT);
 $id = $_GET['id'];

 $proses = mysqli_query($mysqli,"UPDATE t_user SET u_pwuser='$u_pwuser'
                 where u_id='$id'");

 if ($proses) {

 	echo "<script> alert('Password berhasil diubah. Silahkan login.');window.location.href='loginUser.php'</script>";
 }
 ?>
