<?php 
 include 'admin/koneksi.php';
 session_start();

 $u_Username = $_POST['u_Username'];
 $u_nama = $_POST['u_nama'];
 $u_alamat = $_POST['u_alamat'];
 $u_hp = $_POST['u_hp'];
 $u_pwuser = password_hash($_POST['u_pwuser'],PASSWORD_DEFAULT);

 $rand = rand();
 $ekstensi =  array('png','jpg','jpeg');
 $filename = $_FILES['foto']['name'];
 $ukuran = $_FILES['foto']['size'];
 $ext = pathinfo($filename, PATHINFO_EXTENSION);

 $proses=$mysqli->query("SELECT * from t_user where u_Username='$u_Username'");

 if (mysqli_num_rows($proses)>0){
    echo "<script> alert('Username tidak tersedia, ganti username yang diinginkan!');window.location.href='form_validation.php'</script>";
 }else{
   if(!in_array($ext,$ekstensi) ) {
      echo "<script> alert('Ekstensi salah');window.location.href='daftar.php'</script>";
   }else{
         if($ukuran < 1044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], 'image/user/'.$rand.'_'.$filename);
            $proses = mysqli_query($mysqli,"INSERT INTO t_user (u_Username, u_pwuser, u_NamaUser, u_AlamatUser,u_NoHp,u_Foto) 
            values('$u_Username','$u_pwuser', '$u_nama', '$u_alamat','$u_hp','$xx')");
         }else{
            echo "<script> alert('Ukuran terlalu besar, maksimal 1 MB!');window.location.href='daftar.php'</script>";
         }
   }

 }

 if ($proses) {
 	echo "<script> alert('Pendaftaran berhasil, silahkan login.');window.location.href='loginuser.php'</script>";
 }
 ?>
