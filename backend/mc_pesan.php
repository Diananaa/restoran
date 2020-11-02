<?php
include 'backend/database.php';

function tambahPesan($data){
    global $conn;
 
    $dm_id = htmlspecialchars( $data["dm_id"]);

    $u_Username = htmlspecialchars( $data["u_Username"]);

    $a_Username = htmlspecialchars( $data["a_Username"]);

    $p_banyak = htmlspecialchars( $data["p_banyak"]);

    $p_DescPesanan = htmlspecialchars( $data["p_DescPesanan"]);




    $query = " INSERT INTO t_pesan 
    VALUES  
    (' ', '$dm_id', '$u_Username', '$a_Username', '$p_banyak',' ', '$p_DescPesanan')
    ";
    mysqli_query($conn, $query);

    $totalHarga = " SELECT m_harga FROM t_makanan WHERE dm_id='$dm_id' ";

    $query = " INSERT INTO t_pesan 
    VALUES  
    (' ', '$dm_id', '$u_Username', '$a_Username', '$p_banyak','$totalHarga', '$p_DescPesanan')
    ";


return mysqli_affected_rows($conn);

}

