<?php
session_start();
include "koneksi.php";
$id = $_GET['id'];

$cek = mysql_query($koneksi, "select * from siswa where id='$id");
$data = mysqli_fetch_assoc($cek);

if (!$data) {
    header ("location: siswa.php?p=Data tidak ditemukan");
    exit ();
}
    $hapus = mysql_query($koneksi, "delete from siswa where id='$id'");
    if ($hapus) {
        header ("location: siswa.php?p=Data berhasil dihapus");
    } else {
        header ("location: siswa.php?p=Data gagal dihapus");
 exit ();
 
 }


?>
