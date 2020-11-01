<?php

include 'backend/mc_admin.php';

if(isset($_POST["register"])){
    if(registrasi($_POST) > 0 ){
        echo "<script>
            alert('Admin baru berhasil ditambahkan')
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
    <title>Registrasi Admin</title>
</head>
<body>
    <h1>Registrasi Admin</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="a_username">Username</label>
                <input type="text" name="a_username" id="a_username">
            </li>
            
            <li>
                <label for="a_namaAdmin">Nama</label>
                <input type="text" name="a_namaAdmin" id="a_namaAdmin">
            </li>
            <li>
                <label for="a_jabatan">Jabatan</label>
                <input type="text" name="a_jabatan" id="a_jabatan">
            </li>
            <li>
                <label for="a_tglLahir">ttl</label>
                <input type="date" name="a_tglLahir" id="a_tglLahir">
            </li>
            <li>
                <label for="a_alamat">alamat</label>
                <input type="text" name="a_alamat" id="a_alamat">
            </li>
            <li>
                <label for="a_foto">Gambar</label>
                <input type="file" name="a_foto" id="a_foto">
            </li>
            <li>
                <label for="a_pwadmin">Password</label>
                <input type="password" name="a_pwadmin" id="a_pwadmin">
            </li>
            <li>
                <label for="a_pwadmin2">Konfirmasi Password</label>
                <input type="password" name="a_pwadmin2" id="a_pwadmin2">
            </li>
            <li>
            <button type="submit" name="register">Registrasi</button>
            </li>
        </ul>
    </form>
</body>
</html>