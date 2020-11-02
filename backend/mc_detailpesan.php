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

function create($data){
    global $conn;

    $m_id = htmlspecialchars( $data["m_id"]);

    $a_username = htmlspecialchars( $data["a_username"]);

    $dm_JumlahMakanan = htmlspecialchars( $data["dm_JumlahMakanan"]);

    $dm_Tanggal = htmlspecialchars( $data["dm_Tanggal"]);

    $query ="INSERT INTO t_detailmakanan
    VALUES ('','$m_id','$a_username','$dm_JumlahMakanan','$dm_Tanggal')
     ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update_pesan($data){
    global $conn;

    $dm_id = htmlspecialchars( $data["dm_id"]);

    $m_id = htmlspecialchars( $data["m_id"]);

    $a_username = htmlspecialchars( $data["a_username"]);

    $dm_JumlahMakanan = htmlspecialchars( $data["dm_JumlahMakanan"]);

    $dm_Tanggal = htmlspecialchars( $data["dm_Tanggal"]);

    $query= "UPDATE t_detailmakanan SET
   m_id ='$m_id',
   a_username ='$a_username',
   dm_JumlahMakanan ='$dm_JumlahMakanan',
   dm_Tanggal ='$dm_Tanggal'
   WHERE dm_id=$dm_id
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deletePesan($dm_id){
    global $conn;
    $query = "DELETE FROM t_detailmakanan WHERE dm_id= $dm_id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}