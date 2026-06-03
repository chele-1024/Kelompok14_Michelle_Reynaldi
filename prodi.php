<?php
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
        header("location:index.php?p=Silahkan Login Terlebih Dahulu");
        exit();
    }
    include "koneksi.php";
    $cari = isset($_GET['cari']) ? $_GET['cari'] : '';
    if ($cari != '') {
        $data = mysqli_query($koneksi, "SELECT * FROM prodi WHERE kd_prodi LIKE '%$cari%' OR nama_prodi LIKE '%$cari%'");
    } else {
    $data = mysqli_query($koneksi, "SELECT * FROM prodi");
    }
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
                <tr>
                    <th>Kode Prodi</th>
                    <th>Nama Prodi</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                        <td><?php echo $row['kd_prodi']; ?></td>
                        <td><?php echo $row['nama_prodi']; ?></td>
                        <td>
                            <a href="edit_prodi.php?id_prodi=<?php echo $row['id_prodi']; ?>" class= "btn-edit">Edit</a>
                            <a href="hapus_prodi.php?id_prodi=<?php echo $row['id_prodi']; ?>" 
                            onclick="return confirm('Yakin ingin hapus?')" class = "btn-delete">DELETE</a>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>