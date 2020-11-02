<?php 
 include 'koneksi.php';
 session_start();

 $makanan = $_POST['makanan'];
 $harga = $_POST['harga'];
 $deskripsi = $_POST['deskripsi'];
 $id = $_SESSION['id'];

 	$rand = rand();
	$ekstensi =  array('png','jpg','jpeg');
	$filename = $_FILES['gambar']['name'];
	$ukuran = $_FILES['gambar']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if ($filename!=""){
        if(!in_array($ext,$ekstensi) ) {
            echo "<script> alert('Ekstensi salah');";
            header('location:form_validation.php');
        }else{
            if($ukuran < 1044070){		
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/makanan/'.$rand.'_'.$filename);
                $proses = mysqli_query($mysqli,"INSERT INTO t_makanan (a_id, m_namamakanan, m_harga, m_descmakanan,m_gambar) 
 					values('$id','$makanan', '$harga', '$deskripsi','$xx')");
            }else{
                echo "<script> alert('Ukuran terlalu besar, maksimal 1 MB!');";
                header('location:form_validation.php');
            }
        }
    }

 if ($proses) {
 	echo "<script> alert('Data Berhasil Di Input');</script>";
 	header('location:basic_table.php');
 }
 ?>
