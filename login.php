<?php

include "koneksi.php";

if(isset($_SESSION["is_login"])){
    header("location: admin_panel.php   ");
}

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $koneksi->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $_SESSION['username'] = $username;
            $_SESSION["is_login"] = true;

            header("Location: admin_panel.php");
            exit();
        }else {
            echo "akun tidak ditemukan";
        }
        $stmt->close();
        $koneksi->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    


<form action="login.php" method="POST">
    <h3>Login</h3>
    <input type="text" placeholder="username" name="username"/>
    <input type="password" placeholder="password" name="password"/>
    <button type="submit" name="login">login</button>
</form>


</body>
</html>