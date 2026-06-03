<?php
    session_start();
    $_SESSION['login'] = false;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem Manajemen Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>PANEL LOGIN</h1>
        <hr>
        <form action="cek_login.php" method="POST">
            <div class="form-control">
                <input type="text" name="user" placeholder="Masukkan Username" >
            </div>
            <div class="form-control">
                <input type="password" name="pass" placeholder="Masukkan Password" >
            </div>
            <div class="form-control">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>