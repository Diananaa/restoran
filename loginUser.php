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
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
</head>
<body>
    <h1>Login User</h1>
    <?php 
        if(isset ($error)):?>

    <p style="color: red; font-style:italic;">username / password salah</p>
        <?php endif; ?>
        <form action="" method="post">

            <ul>
                <li>
                    <label for="u_Username">Username : </label>
                    <input type="text" name="u_Username" id="u_Username">
                </li>
                <li>
                    <label for="u_pwuser">Password : </label>
                    <input type="password" name="u_pwuser" id="u_pwuser">
                </li>
                <li>
                    <button type="submit" name="login">LOGIN</button>
                </li>
            </ul>
        </form>

        
</body>
</html>