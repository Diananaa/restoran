<?php 
include 'backend/mc_makanan.php';

$m_id= $_GET["m_id"];

$menu = query("SELECT * from t_makanan WHERE m_id= $m_id ") [0];

if(isset($_POST["submit"])){
    if(updateMenu($_POST)>0){
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
	<title>RESTORAN KRUSTY CRAB</title>
</head>
<body>
	<h1>UPDATE Menu</h1>
	<form action="" method="post" enctype="multipart/form-data" >

	<input type="hidden" name ="m_id" value="<?= $menu["m_id"]; ?>">
				
                <input type="hidden" name="m_gambarLama" value="<?= $menu["m_gambar"]; ?>">
		<ul>
			<li>
				<label for="a_username">Username</label>
				<input type="text" id="a_username" name="a_username" value="<?=$menu["a_username"]; ?>">
			</li>
			<li>
				<label for="m_namamakanan">Nama Makanan</label>
				<input type="text" id="m_namamakanan" name="m_namamakanan"value="<?=$menu["m_namamakanan"]; ?>" >
			</li>
			<li>
				<label for="m_harga">Harga</label><input type="text" name="m_harga" id="m_harga" value="<?=$menu["m_harga"]; ?>" >
			</li>
			<li>
				<label for="m_descmakanan">Deskripsi</label><input type="text" name="m_descmakanan" id="m_descmakanan" value="<?=$menu["m_descmakanan"]; ?>" >
			</li>
			<li>
                <label for="m_gambar">Gambar</label><br>

                <img src="asset/img/<?=$menu ['m_gambar']; ?>" widht="50"> <br>
                
				<input type="file" name="m_gambar" id="m_gambar">
            </li>
            <li>
                <button type="submit" name="submit">update</button>
            </li>
		</ul>
	</form>
</body>
</html>
