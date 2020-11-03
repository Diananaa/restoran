<?php 
include 'admin/koneksi.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login User</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #ffffff;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body style="background-color:Gray;">
<div class="login-form">
        <h2 class="text-center" style="color:white;">Daftar User</h2>  
        <?php 
        if(isset ($error)):?>

    <p style="color: yellow; font-style:italic;">username / password salah</p>    
    <?php endif; ?> 
    <?php 
        if(isset ($error2)):?>

    <p style="color: yellow; font-style:italic;">Akun tidak terdaftar!</p>    
    <?php endif; ?> 
    
    <form role="form" method="POST" action="aksi_daftar.php" enctype="multipart/form-data">

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="u_Username" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nama" name="u_nama" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Alamat" name="u_alamat" required="required">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="No. HP" name="u_hp" required="required">
        </div>
        <div class="form-group">
            <input type="password" id="u_pwuser" class="form-control" placeholder="Password" name="u_pwuser" required="required">
        </div>
        <div class="form-group">
            <input type="password" id="u_repassword" class="form-control" placeholder="Ulangi Password" name="u_repassword" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </div>
        <div class="clearfix">
        </div>        
        <p class="text"><a href="http://localhost/RESTORAN/loginuser.php">Login</a></p>
    </form>
</div>
</body>

<script>
var timer = null;
$('#u_repassword').keydown(function(){
       clearTimeout(timer); 
       timer = setTimeout(doStuff, 1000)
});

function doStuff() {
    var pass = document.getElementById("u_pwuser").value;
    var repass = document.getElementById("u_repassword").value;
    if (pass!=repass){
        document.getElementById("u_repassword").value="";
        document.getElementById("u_pwuser").value="";
        alert('Password tidak sama!');
        document.getElementById("u_pwuser").focus();
    }
}
</script>
</html>