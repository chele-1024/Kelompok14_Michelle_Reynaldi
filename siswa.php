<?php
session_start();
header ("cache-control: no-cache, must-revalidate");
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location: index.php?p = silahkan login dahulu");
    exit;

}
include "koneksi.php";
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$data = mysqli_query($koneksi, "SELECT s.*, p.nama_prodi FROM siswa s join prodi p on s.kd_prodi = p.kd_prodi WHERE s.nama LIKE '%$cari%' OR p.nama_prodi LIKE '%$cari%'");
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Data siswa </title>
    <link rel="stylesheet" href = "style.css"> 
    <script src="script.js"></script>
    <title></title>
</head>
<body>
    <?php include "navigasi.php"; ?>
    <div id ="main"> 
        <div class = "container">   
            <h2>Data Siswa</h2>
            <hr>
            <a href="tambah_siswa.php" class="tambah" >Tambah data siswa</a>
            <form method= "get">
                <input type="text" name="cari" placeholder="Cari siswa..." value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
                <button type="submit">Cari</button>
            </form>
            <table> 
                <tr>
                    <th>PROFIL</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>TAHUN AJARAN</th>
                    <th>PRODI</th>
                    <th>ACTION</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($data)) { ?>
<tr> 
    
    <td>
    <?php if(!empty($row['foto'])) { ?>
        <img src="image/<?php echo $row['foto']; ?>" alt="Foto Siswa" width="40">
    <?php } else { ?>
        <img src="image/default.jpg" alt="Default" width="40">
    <?php } ?>
    </td>
    <td><?php echo $row ['nis']?></td>
    <td><?php echo $row ['nama']?></td>
    <td><?php echo $row ['kelas']?></td>
    <td><?php echo $row ['tahun_ajaran']?></td>
    <td><?php echo $row ['nama_prodi']?></td>
    <td>
        <a href = "edit_siswa.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
        <a href = "hapus_siswa.php?id=<?php echo $row['id']; ?>" onclick="return confirm('yakin ingin hapus?')" class="btn-delete">DELETE</a>
    </td>
    </tr>
    <?php } ?>
</table>
</div>
</div>
</body>
</html>