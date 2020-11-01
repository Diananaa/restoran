<?php
include 'backend/database.php';

function registrasi($data){
    global $conn;
    $u_username = htmlspecialchars($data["u_username"]);

    $u_namaUser =htmlspecialchars($data["u_namaUser"]);

    $u_alamatUser =htmlspecialchars($data["u_alamatUser"]);

    $u_nohp =htmlspecialchars($data["u_nohp"]);


    // UPLOAD GAMBAR
    $u_foto = upload();
    if(!$u_foto){
        return false;
    }

    $u_password = mysqli_real_escape_string($conn, $data["u_password"]);

    $u_password2 = mysqli_real_escape_string($conn, $data["u_password2"]);
    
    $result= mysqli_query($conn, "SELECT u_username FROM t_user WHERE u_username = '$u_username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username yang dipilih sudah terdaftar')
    </script>";
    return false;
    }

    if($u_password !== $u_password2){
        echo "<script> 
            alert('konfirmasi password tidak sesuai');
        </script>";
        return false;
    }
    $u_password = password_hash($u_password, PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO t_user VALUES('$u_username','$u_password','$u_namaUser','$u_alamatUser','$u_nohp','$u_foto') ");

    // mysqli_query($conn, "CALL insertRegistrasiUser ('$u_username','$u_password','$u_namaUser','$u_alamatUser','$u_nohp','$u_foto')");

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['u_foto']['name'];

    $ukuranFile = $_FILES['u_foto']['size'];

    $error =$_FILES['u_foto']['error'];

    $tmpName = $_FILES['u_foto']['tmp_name'];

    // cek apakah tidak ada gambar yg diupload
    if($error === 4){
        echo "<script>
                alert('tes');
            </script>";
        return false;
    }

    // cek ekstensi gambar
    $ekstensiGambarValid =['jpg','jpeg','png'];

    $ekstensiGambar = explode('.',$namaFile);

    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "<script>
                alert('yg ada anda upload bukan gambar');
            </script>";
        return false;
    }

    
    // cek jika ukurannya terlalu besar
    if($ukuranFile>7000000){
        echo "<script>
                alert('yg ada anda upload terlalu besar');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'asset/img/'. $namaFileBaru);

    return $namaFileBaru;

}


?>