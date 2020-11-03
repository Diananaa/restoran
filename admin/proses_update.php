<?php
 session_start();

if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $makanan    = $_POST['makanan'];
    $harga      = $_POST['harga'];
    $deskripsi  = $_POST['deskripsi'];
    $aid        = $_SESSION['id'];

    include_once 'koneksi.php';
    
    $rand = rand();
	$ekstensi =  array('png','jpg','jpeg');
	$filename = $_FILES['gambar']['name'];
	$ukuran = $_FILES['gambar']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if ($filename!=""){
        if(!in_array($ext,$ekstensi) ) {
            echo "<script> alert('Ekstensi salah');window.location.href='form_update.php'</script>";
        }else{
            if($ukuran < 1044070){		
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/makanan/'.$rand.'_'.$filename);
                $proses = mysqli_query($mysqli,"UPDATE t_makanan SET a_id='$aid', m_namamakanan='$makanan', m_harga='$harga', m_descmakanan='$deskripsi',m_gambar='$xx'
                    where m_id='$id'");
            }else{
                echo "<script> alert('Ukuran terlalu besar, maksimal 1 MB!');window.location.href='form_update.php'</script>";
            }
        }
    }else{
        $proses = mysqli_query($mysqli,"UPDATE t_makanan SET a_id='$aid', m_namamakanan='$makanan', m_harga='$harga', m_descmakanan='$deskripsi'
        where m_id='$id'");
    }
    
    
    if ($proses) {
        echo "<script> alert('Data berhasil di Update');window.location.href='basic_table.php'</script>";
    }
    else{
        echo "<script> alert('Data gagal di Update');";
    }
}
?>