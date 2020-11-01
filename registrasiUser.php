<?php
include 'backend/mc_user.php';

if(isset($_POST["register"])){
    if(registrasi($_POST) > 0 ){
        echo "<script>
            alert('user baru berhasil ditambahkan')
        </script>";
    } else{
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman Register pengguna</title>
</head>
<body>
    <h1>Registrasi login pengguna</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="u_username">Username</label>
            <input type="text" name="u_username" id="u_username" >
        </li>
        <li>
            <label for="u_namaUser">Nama</label>
            <input type="text" name="u_namaUser" id="u_namauser">
        </li>
        <li>
            <label for="u_alamatUser">Alamat</label>
            <input type="text" name="u_alamatUser" id="u_alamatuser">
        </li>
        <li>
            <label for="u_nohp">No Telepon</label>
            <input type="text" name="u_nohp" id="u_nohp">
        </li>
        <li>
            <label for="u_foto">Gambar</label>
            <input type="file" name="u_foto" id="u_foto">
        </li>

     

        
        <li>
            <label for="u_password">Password</label>
            <input type="password" name="u_password" id="u_password" require>
        </li>
        <li>
            <label for="u_password2">Konfirmasi Password :</label>
            <input type="password" name="u_password2" id="u_password2" require>
        </li>
        
        <li>
            <button type="submit" name="register">Registrasi</button>
        </li>
    </ul>
        
    </form>
</body>
</html>