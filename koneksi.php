<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "michelle_penilaian";

    $koneksi = mysqli_connect($host, $username, $password, $database);

    if ($koneksi) {
        //memilih database
        $pilih_db = mysqli_select_db($koneksi, $database);
        if ($pilih_db) {
            echo "Database Terpilih";    
        }
    } else {
        echo "Koneksi Gagal, di periksa lagi";
    }
?>