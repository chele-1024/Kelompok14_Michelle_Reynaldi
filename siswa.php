<?php
session_start();
header ("cache-control: no-cache, must-revalidate");
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location: index.php?p = silahkan login dahulu");
    exit;

}
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT s.*, p.nama_prodi FROM siswa s join prodi p on s.kd_prodi = p.kd_prodi");
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Data siswa </tittle>
    <link rel="stylesheet" href = "style.css"> 
    <script src="script.js"></script>
    <title></title>
</head>
<body>
    <?php include "navigasi.php"; ?>
    <div id ="main"> 
        <div clas = "container">   
            <h2>Data Siswa</h2>
            <a href="tambah_siswa.php" class="tambah" >Tambah data siswa</a>
            <table> 
                <tr>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>PRODI</th>
                    <th>ACTION</th>
</tr>

<?php while (&row = mysqli_fetch_assoc($data)) { ?>
<tr> 
    <td><?php echo $row ['nis']?></td>
    <td><?php echo $row ['nama']?></td>
    <td><?php echo $row ['kelas']?></td>
    <td><?php echo $row ['tahun_ajaran']?></td>
    <td><?php echo $row ['nama_prodi ']?></td>
    <td>
        <a href = "edit_siswa.php?id=<?php echo $row['id']; ?>">edit</a>
        <a href = "hapus_siswa.php?id=<?php echo $row['id']; ?>"onclick="return confirm('yakin ingin hapus?')">DELETE</a>
        
    </td>
    </tr>
    <?php} ?>
</table>
</div>
</div>
</body>
</html>