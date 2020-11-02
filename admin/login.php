<?php
include "koneksi.php";
ob_start();
session_start();
//ambil data dari form
$username=$_POST['username'];
$password=$_POST['password'];
//cek apakah username & pwd yang dimasukkan benar
$query=mysqli_query($mysqli,"SELECT * from t_admin WHERE a_username='$username' and a_pwadmin='$password'");
$ambil=mysqli_fetch_array($query);
$keadaan=mysqli_num_rows($query);

if($keadaan > 0)
{
 echo   $_SESSION['username']=$ambil['a_Username'];
    $_SESSION['nama']=$ambil['a_NamaAdmin'];
    $_SESSION['foto']=$ambil['a_Foto'];
    $_SESSION['id']=$ambil['a_id'];
    $_SESSION['timeout']=time()+3600;
    echo "berhasil";
    header("location:profile.php");
}
else
{
    echo "<align = center>Login gagal,Username atau password salah, silahkan<br />";
    echo "<a href='index.php'>Login Kembali</a></center>";
}

?>