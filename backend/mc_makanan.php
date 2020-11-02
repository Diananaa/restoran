<?php 
include 'backend/database.php';

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows=[];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
    

function cari ($keyword){
    $query = "SELECT * FROM t_makanan
    WHERE 
    m_namamakanan LIKE '%$keyword' OR
    m_harga LIKE '%$keyword' OR
    m_descmakanan LIKE '%$keyword'
    ";
    return query($query);
}

function tambahMenu($data){
    global $conn;
 
    $a_username = htmlspecialchars( $data["a_username"]);

    $m_namamakanan = htmlspecialchars( $data["m_namamakanan"]);

    $m_harga = htmlspecialchars( $data["m_harga"]);

    $m_descmakanan = htmlspecialchars( $data["m_descmakanan"]);

    $m_gambar = upload();
    if(!$m_gambar){
        return false;
    }

    $query = "INSERT INTO t_makanan 
    VALUES 
    (' ','$a_username','$m_namamakanan','$m_harga','$m_descmakanan','$m_gambar')";

mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['m_gambar']['name'];
    $ukuranFIle = $_FILES['m_gambar']['size'];
    $error = $_FILES['m_gambar']['error'];
    $tmpName = $_FILES['m_gambar']['tmp_name'];

    // cek apakah tidak ada gambar yg diupload
    if($error === 4){
        echo "<script>
                alert('Gambar gagal diupload');
            </script>";
        return false;
    }

      // cek ekstensi gambar
      $ekstensiGambarValid = ['jpg','jpeg','png'];
      $ekstensiGambar = explode('.', $namaFile);
      $ekstensiGambar = strtolower(end($ekstensiGambar));
      if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
          echo "<script>
                  alert('yg ada anda upload bukan gambar');
              </script>";
          return false;
      }

        // cek jika ukurannya terlalu besar
    if($ukuranFIle>70000000){
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

function updateMenu($data){
    global $conn;
    $m_id = $data["m_id"];

    $a_username = htmlspecialchars( $data["a_username"]);

    $m_namamakanan = htmlspecialchars( $data["m_namamakanan"]);

    $m_harga = htmlspecialchars( $data["m_harga"]);

    $m_descmakanan = htmlspecialchars( $data["m_descmakanan"]);

    $m_gambarLama =htmlspecialchars( $data["m_gambarLama"]);

    if($_FILES['m_gambar']['error'] == 4){
        $m_gambar = $m_gambarLama;
    } else{
        $m_gambar = upload( );
    }      

    $query = "UPDATE t_makanan 
    SET 
    a_username='$a_username',
    m_namamakanan='$m_namamakanan',
    m_harga='$m_harga',
    m_descmakanan='$m_descmakanan',
    m_gambar='$m_gambar'
    WHERE m_id= $m_id
    ";
  
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function deleteMakanan($m_id){
    global $conn;
    $query= "DELETE FROM t_makanan WHERE m_id= $m_id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



?>