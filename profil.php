<?php
include "admin/koneksi.php";

session_start();
$query=mysqli_query($mysqli,"SELECT * from t_user WHERE u_username='".$_SESSION['username']."'");
$ambil=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<title>Profil</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<div class="well">
    <img src="image/user/<?= $ambil['u_Foto']?>" alt="<?= $ambil['u_Username']?>" class="rounded mx-auto d-block"height="200" width="200">
    <br><br>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Profil</a></li>
      <li><a href="#profile" data-toggle="tab">Password</a></li>
      <li><a href="#foto" data-toggle="tab">Foto</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <form id="tab" method="post" action="aksi_ubahProfil.php?id=<?=  $_SESSION['id'] ?>">
            <label>Username</label>
            <input type="text" name="username" value="<?= $ambil['u_Username']?>" class="input-xlarge">
            <label>Nama</label>
            <input type="text" name="name" value="<?= $ambil['u_NamaUser']?>" class="input-xlarge">
            <label>No. Hp</label>
            <input type="text" name="hp" value="<?= $ambil['u_NoHp']?>" class="input-xlarge">
            <label>Alamat</label>
            <textarea name="alamat" rows="3" class="input-xlarge"><?= $ambil['u_AlamatUser']?>
            </textarea>
          	<div>
        	    <button class="btn btn-primary">Ubah</button>
        	</div>
        </form>
      </div>
      <div class="tab-pane fade" id="profile">
    	<form id="tab2" method="post" action="aksi_ubahPassword.php?id=<?=  $_SESSION['id'] ?>">
        	<label>Password Baru</label>
        	<input type="password" id="password" name="password" class="input-xlarge">
            <label>Ulangi Password Baru</label>
        	<input type="password" id="repass" name="repassword" class="input-xlarge">
        	<div>
        	    <button class="btn btn-primary">Ubah</button>
        	</div>
    	</form>
      </div>
      <div class="tab-pane fade" id="foto" >
    	<form id="tab3" method="post" action="aksi_ubahFoto.php?id=<?=  $_SESSION['id'] ?>" enctype="multipart/form-data">
        
        	<label>Foto Baru</label>
            <input class="input-xlarge" name="foto" type="file"  accept="image/png, image/jpeg"/>
        	<div>
        	    <button class="btn btn-primary">Ubah</button>
        	</div>
    	</form>
      </div>
  </div>

  <script>
    var timer = null;
    $('#repass').keydown(function(){
        clearTimeout(timer); 
        timer = setTimeout(doStuff, 1000)
    });

    function doStuff() {
        var pass = document.getElementById("password").value;
        var repass = document.getElementById("repass").value;
        if (pass!=repass){
            document.getElementById("repass").value="";
            document.getElementById("password").value="";
            alert('Password tidak sama!');
            document.getElementById("password").focus();
        }
    }
</script>

  </body>
</html>
