<?php
session_start();
include "koneksi.php";
$prodi = mysqli_query($koneksi, "SELECT * FROM prodi");
$error = "";

if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $kd_prodi = $_POST['kd_prodi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $foto = $_FILES['foto']['name'];
    if (empty($nis) || empty($nama)) {
        $error = "Semua field harus diisi!";
    } else {
    mysqli_query($koneksi, "INSERT INTO siswa (nis, nama, kelas, tahun_ajaran, kd_prodi, jenis_kelamin, foto)
    VALUES ('$nis', '$nama', '$kelas', '$tahun_ajaran', '$kd_prodi', '$jenis_kelamin', '$foto')");
(header("location: siswa.php"));
exit ();
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>tambah data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Tambah Data Siswa</h2>
    <hr>
<form method="POST" enctype ="multipart/form-data" class="form-container">
    
        <div class="form-group">
            <label>FOTO PROFIL</label>
            <input type="file" name="foto">
        </div>
        <div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" required>
        </div>
        <div class="form-group">
            <label>NAMA</label>
            <input type="text" name="nama" required>
        </div>
        <div class="form-group">
            <label>KELAS</label>
            <input type="text" name="kelas">
        </div>
        <div class="form-group">
            <label>TAHUN AJARAN</label>
            <input type="text" name="tahun_ajaran">
        </div>
        <div class="form-group">
            <label>PROGRAM STUDI</label>
            <select name="kd_prodi">
                <?php while ($p = mysqli_fetch_assoc($prodi)) { ?>
                    <option value="<?php echo $p['kd_prodi']; ?>">
                            <?php echo $p['nama_prodi']; ?>
                        </option>
                    <?php } ?>
                </select>
        </div>
            <div class="form-group">
                <label>JENIS KELAMIN</label>
                <div class="radio-group">
                    <input type="radio" name="jenis_kelamin" value="l" id="laki">
                    <label for="laki">Laki-laki</label>
                    <input type="radio" name="jenis_kelamin" value="p" id="perempuan">
                    <label for="perempuan">Perempuan</label>
                </div>
            </div>
                
            <div class="form-group">
                <button type="submit" class="submit" name="simpan">
                SIMPAN
                </button >
            <a href="siswa.php" class="btn-delete">BATAL</a>
            </div>

    
</form>
</div>


          