<?php 

include 'backend/mc_detailpesan.php';

global $conn;

if(isset($_POST["create"])){
    if(create($_POST)>0){
        echo "<script>
        alert('Barang berhasil ditambahkan')
    </script>";
    }else{
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <h1>tambah barang</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="a_username">Nama Admin</label>
                <input type="text" id="a_username" name="a_username">
            </li>
            <li>
                <select name="m_id" id="m_id">
                    <?php
                    $barang ="SELECT * FROM t_makanan";
                    $result1 = mysqli_query($conn, $barang);
                    while ($r = mysqli_fetch_array($result1)) {
                        echo '<option value="'.$r['m_id'].'">'.$r['m_namamakanan'].'</option>';
                    } ?>
                </select>
            </li>
            <li>
                <label for="dm_JumlahMakanan">Jumlah Tersedia</label>
                <input type="text" id="dm_JumlahMakanan" name="dm_JumlahMakanan">
            </li>
            <li>
                <label for="dm_Tanggal">Tanggal</label><input type="date" id="dm_Tanggal" name="dm_Tanggal">
            </li>
           
            <li>
                <button type="submit" name="create">Tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>