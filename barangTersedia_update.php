<?php 
require 'backend/mc_detailpesan.php';

$dm_id = $_GET["dm_id"];


// $barang=query(" SELECT t_detailmakanan.dm_id, t_makanan.m_namamakanan, t_detailmakanan.dm_JumlahMakanan, 
// t_detailmakanan.dm_Tanggal 
// FROM t_detailmakanan, t_makanan 
// GROUP BY t_detailmakanan.m_id ");

$barang = query("SELECT * FROM t_detailmakanan WHERE dm_id= $dm_id") [0];

if(isset($_POST["submit"]))
{
    if(update_pesan($_POST)>0){
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href ='makanan_index.php';
            </script>
       ";
    }else{
        echo "data gagal diubah";
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
<h1>Update barang</h1>
<form action="" method="post">
    <input type="hidden" name="dm_id" value="<?= $barang["dm_id"]; ?>" >
    <ul>
            <li>
                <label for="a_username">Nama Admin</label>
                <input type="text" id="a_username" name="a_username" value="<?= $barang["a_username"]; ?>">
            </li>
            <li>
                <label for="a_username">Nama Admin</label>
                <input type="text" id="a_username" name="a_username" value="<?= $barang["dm_JumlahMakanan"]; ?>"> 
            </li>
            <li>
                <label for="dm_JumlahMakanan">Jumlah Tersedia</label>
                <input type="text" id="dm_JumlahMakanan" name="dm_JumlahMakanan" value="<?= $barang["dm_JumlahMakanan"]; ?>">
            </li> 
            <li>
                <label for="dm_Tanggal">Tanggal</label><input type="date" id="dm_Tanggal" name="dm_Tanggal" value="<?= $barang['dm_Tanggal']; ?>">
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
                <button type="submit" name="submit">update</button>
            </li>
        </ul>
</form>
</body>
</html>