<?php
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header("location:index.php?p=Silahkan Login Terlebih Dahulu");
        exit();
    }
    include "koneksi.php";
    $data = mysqli_query($koneksi, "SELECT * FROM prodi");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Prodi</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <?php include "navigasi.php"; ?>
    <div id="main">
        <div class="container">
            <h2>Data Prodi</h2>
            <hr>
            <a href="tambah_prodi.php" class="tambah">Tambah Data Prodi</a>
            <br><br>
            <table>
                
        </div>
    </div>
</body>
</html>