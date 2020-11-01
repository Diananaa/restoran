<?php 
require 'backend/mc_detailpesan.php';
$barang=query(" SELECT t_detailmakanan.dm_id, t_makanan.m_namamakanan, t_detailmakanan.dm_JumlahMakanan, 
t_detailmakanan.dm_Tanggal 
FROM t_detailmakanan, t_makanan 
GROUP BY t_detailmakanan.m_id ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Barang Tersedia</h1>
    <a href="barangTersedia_create.php">tambah barang </a>
    <form action="" method="post">
        <table border="1" cellpadding="10" cellspacing="0">
            
            <tr>
                <th>No. </th>
                <th>Nama Makanan</th>
                <th>Jumlah Tersedia</th>
                <th>Tanggal</th>
                <th>aksi</th>
            </tr>
            <?php $i=1; ?>
            <?php foreach( $barang as $row): ?>
            <tr>
                <td><?=$i ?></td>
                <td>
                <?= $row["m_namamakanan"]; ?>
                </td>
                <td>
                <?= $row["dm_JumlahMakanan"]; ?>
                </td>
                <td>
                <?= $row["dm_Tanggal"]; ?>
                </td>
                <td>
                    <a href="barangTersedia_update.php?dm_id=<?php echo $row["dm_id"];?>">update</a> |
                    <a href="barangTersedia_delete.php?dm_id=<?php echo $row["dm_id"];?>">delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach;?>
        </table>
    </form>
</body>
</html>