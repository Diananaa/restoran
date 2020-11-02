<?php 
include 'backend/database.php';
include 'backend/mc_makanan.php';

session_start();
if(isset($_SESSION["login"])){
    header("Location: makanan_index.php");
    exit;
}

if(isset($_POST["login"])){
    $u_Username = $_POST["u_Username"];
    $u_pwuser = $_POST["u_pwuser"];

   $result= mysqli_query($conn,"SELECT * FROM t_user WHERE u_Username='$u_Username'");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);

        // var_dump($row);
        if (password_verify($u_pwuser, $row["u_pwuser"])){
         header("Location: makanan_index.php");
    
            exit;
        }
        $error = true;
    }else{
     $error2=true;
    }
}
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
        <h2 class="text-center" style="color:white;">Login User</h2>  
        <?php 
        if(isset ($error)):?>

    <p style="color: yellow; font-style:italic;">username / password salah</p>    
    <?php endif; ?> 
    <?php 
        if(isset ($error2)):?>

    <p style="color: yellow; font-style:italic;">Akun tidak terdaftar!</p>    
    <?php endif; ?> 
    
    <form action="" method="post">

        <div class="form-group">
        
            <input type="text" class="form-control" placeholder="Username" name="u_Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="u_pwuser" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="login">Masuk</button>
        </div>
        <div class="clearfix">
        </div>        
    </form>
    <p class="text-center"><button type="button" class="btn btn-warning">Daftar Akun</button></p>
</div>
</body>
</html>