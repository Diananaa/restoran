<?php 
include 'backend/mc_pesan.php';

if(isset($_POST["tambah"])){
    if(tambahPesan($_POST)>0){
        echo "<script>
        alert('Pesanan berhasil ditambahkan')
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
    <h1>pesan menu</h1>
    <form action="" method="post" enctype="multipart/form-data" >
    <ul>
        <li>
            <label for="dm_id">id detail makanan</label>
            <input type="text" id="dm_id" name="dm_id" >
        </li>
        <li>
            <label for="u_Username">
            nama user
            </label><input type="text" id="u_Username" name="u_Username">
        </li>
        <li>
            <label for="a_Username">
            nama Admin
            </label><input type="text" id="a_Username" name="a_Username">
        </li>
        <li>
            <label for="p_banyak">
            banyak
            </label><input type="text" id="p_banyak" name="p_banyak">
        </li>
        <li>
            <label for="p_DescPesanan">
            deskripsi
            </label><input type="text" id="p_DescPesanan" name="p_DescPesanan">
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
                <button type="submit" name="tambah">Tambah</button>
        </li>
    </ul>
    </form>
</body>
</html>





