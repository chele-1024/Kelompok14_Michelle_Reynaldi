<?php
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== "true") {
        header("location:index.php?p=Silahkan Login Terlebih Dahulu");
        exit();
    }

    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date ("d-m-Y");
    $jam = date ("H");

    if ($jam >= 5 && $jam < 12) {
        $salam = "Selamat Pagi";
    } elseif ($jam >= 12 && $jam < 15) {
        $salam = "Selamat Siang";
    } elseif ($jam >= 15 && $jam < 18) {
        $salam = "Selamat Sore";
    } else {
        $salam = "Selamat Malam";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Home</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <?php include "navigasi.php"; ?>
        <div id="main">
            <div class="container">
                <h2>APLIKASI MANAJEMEN DATA SISWA</h2>
                <hr>
                <p>Hari ini tanggal : <?php echo $tanggal; ?></p>
                <p><?php echo $salam; ?>, <?php echo $_SESSION['user']; ?>!</p>
                <p>Selamat datang di aplikasi Data Siswa SMKS PGTI 3 Malang</p>
            </div>
        </div>
    </body>
</html>