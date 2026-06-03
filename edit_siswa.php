<?php 
session_start();
include "koneksi.php";  

if (!isset($_SESSION['login'])) {
    header("location: index.php");
    exit ();

}
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);
    $prodi = mysqli_query($koneksi, "SELECT * FROM prodi");
    if (isset($_POST['update'])) {
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $tahun_ajaran = $_POST['tahun_ajaran'];
        $kd_prodi = $_POST['kd_prodi'];
        $jk = $_POST['jenis_kelamin'];

        if (
            empty($nis) ||
            empty($nama) ||
            empty($kelas) ||
            empty($tahun_ajaran) ||
            empty($kd_prodi) ||
            empty($jk)
        ) {
            echo "<script>alert('Semua field harus diisi!');</script>";
            exit();
        } else {
            mysqli_query($koneksi, "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', tahun_ajaran='$tahun_ajaran', kd_prodi='$kd_prodi', jenis_kelamin='$jk' WHERE id='$id'");
        }

        mysqli_query($koneksi, "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', tahun_ajaran='$tahun_ajaran', kd_prodi='$kd_prodi', jenis_kelamin='$jk' WHERE id='$id'");
        header("location: siswa.php");
        exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "navigasi.php"; ?>
    <div id="main">
        <div class="container">
            <h2>Edit Data Siswa</h2>
            <hr>
            <form method="POST" class="form-container">
         
                    <div class="form-group">
                        <label>NIS</label>
                        <td><input type="text" name="nis" value="<?php echo $data['nis']; ?>" required></td>
                    </div>
                    <div class="form-group">
                        <label>NAMA</label>
                        <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" required></td>   
                    </div>
                    <div class="form-group">
                        <label>KELAS</label>
                        <td><input type="text" name="kelas" value="<?php echo $data['kelas']; ?>" required></td>
                    </div>
                    <div class="form-group">
                        <label>TAHUN AJARAN</label>
                        <td><input type="text" name="tahun_ajaran" value="<?php echo $data['tahun_ajaran']; ?>"required></td>
                    </div>
                    <div class="form-group">
                        <label>Jenis kelamin</label>
                        <td>
                      
                               <input type = "radio" name="jenis_kelamin" value="l" <?php if ($data['jenis_kelamin'] == 'l') { echo 'checked'; }?>> Laki-laki
                               <input type = "radio" name="jenis_kelamin" value="p" <?php if ($data['jenis_kelamin'] == 'p') { echo 'checked'; }?>> Perempuan

                        </td>
                    </div>
                    <div class="form-group">
                        <label>Program studi</label>
                        <td>
                <select name = "kd_prodi" required>
                    <option value="">
                        -- Pilih Prodi--
                        </option>
                        <?php while ($p = mysqli_fetch_assoc($prodi)) { ?>
                            <option value="<?php echo $p['kd_prodi']; ?>"
                             <?php if ($p['kd_prodi'] == $data['kd_prodi']) echo 'selected'; ?>>  
                                <?php echo $p['nama_prodi']; ?>
                            </option>
<?php } ?>
                </select>
</td>
                    </div>
<tr>
    <td></td>
    <td>
        <button type="submit" name="update" class = "submit">UPDATE
</button>
</td>
</tr>
              
            </form>
</div>
        </div>
</body>
</html>