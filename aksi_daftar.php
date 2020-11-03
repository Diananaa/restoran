<?php 
 include 'admin/koneksi.php';
 session_start();

 $u_Username = $_POST['u_Username'];
 $u_nama = $_POST['u_nama'];
 $u_alamat = $_POST['u_alamat'];
 $u_hp = $_POST['u_hp'];
 $u_pwuser = password_hash($_POST['u_pwuser'],PASSWORD_DEFAULT);

 $proses=$mysqli->query("SELECT * from t_user where u_Username='$u_Username'");

 if (mysqli_num_rows($proses)>0){
    echo "<script> alert('Username tidak tersedia, ganti username yang diinginkan!');window.location.href='form_validation.php'</script>";
 }else{
    $proses = mysqli_query($mysqli,"INSERT INTO t_user (u_Username, u_pwuser, u_NamaUser, u_AlamatUser,u_NoHp) 
    values('$u_Username','$u_pwuser', '$u_nama', '$u_alamat','$u_hp')");
 }

 if ($proses) {
 	echo "<script> alert('Pendaftaran berhasil, silahkan login.');window.location.href='loginuser.php'</script>";
 }
 ?>
