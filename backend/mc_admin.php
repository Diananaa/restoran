<?php
include 'backend/database.php';

function registrasi($data){
    global $conn;
    $a_username = htmlspecialchars($data["a_username"]);

    $a_namaAdmin = htmlspecialchars($data["a_namaAdmin"]);

    $a_jabatan = htmlspecialchars($data["a_jabatan"]);

    $a_tglLahir = htmlspecialchars($data["a_tglLahir"]);

    $a_alamat = htmlspecialchars($data["a_alamat"]);

    $a_foto= upload();
    if(!$a_foto){
        return false;
    };

    $a_pwadmin = mysqli_real_escape_string($conn, $data["a_pwadmin"]);

    $a_pwadmin2 = mysqli_real_escape_string($conn, $data["a_pwadmin2"]);

    $result = mysqli_query($conn, "SELECT a_username FROM t_admin WHERE a_username = '$a_username'" );

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username yang dipilih sudah terdaftar')
    </script>";
        return false;
    }

    if($a_pwadmin !== $a_pwadmin2){
        echo "<script> 
            alert('konfirmasi password tidak sesuai');
        </script>";
        return false; 
    }

    mysqli_query($conn, "INSERT INTO t_admin VALUES ('$a_username', '$a_pwadmin','$a_namaAdmin','$a_jabatan','$a_tglLahir','$a_alamat','$a_foto' )");

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['a_foto']['name'];

    $ukuranFile = $_FILES['a_foto']['size'];

    $error =$_FILES['a_foto']['error'];

    $tmpName = $_FILES['a_foto']['tmp_name'];

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