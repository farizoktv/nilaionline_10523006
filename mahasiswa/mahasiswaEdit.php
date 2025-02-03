<?php
include('../koneksi/koneksi.php');

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    // Ambil data mahasiswa berdasarkan NIM
    $queryGetMhs = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $resultGetMhs = mysqli_query($koneksi, $queryGetMhs);

    if (mysqli_num_rows($resultGetMhs) > 0) {
        $dataMhs = mysqli_fetch_assoc($resultGetMhs);
    } else {
        echo "<script>alert('Data Mahasiswa tidak ditemukan!')</script>";
        echo "<script type='text/javascript'>window.location = 'mahasiswaView.php'</script>";
        exit;
    }
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jur = $_POST['jur'];
    $password = $_POST['password'];

    // Query update mahasiswa
    $updateMhs = "
        UPDATE mahasiswa 
        SET nama = '$nama', 
            jk = '$jk', 
            jur = '$jur', 
            password = '$password' 
        WHERE nim = '$nim'
    ";
    $resultUpdate = mysqli_query($koneksi, $updateMhs);

    if ($resultUpdate) {
        echo "<script>alert('Data Mahasiswa Berhasil Diperbarui')</script>";
        echo "<script type='text/javascript'>window.location = 'mahasiswaView.php'</script>";
    } else {
        echo "<script>alert('Data Mahasiswa Gagal Diperbarui')</script>";
        echo "<script type='text/javascript'>window.location = 'mahasiswaView.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
<h3>Edit Data Mahasiswa</h3>
<form method="post">
    <table>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><input type="text" name="nim" value="<?php echo $dataMhs['nim']; ?>" readonly></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $dataMhs['nama']; ?>" required></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <select name="jk" required>
                    <option value="Laki-laki" <?php echo ($dataMhs['jk'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo ($dataMhs['jk'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>jurusan</td>
            <td>:</td>
            <td><input type="text" name="jur" value="<?php echo $dataMhs['jur']; ?>" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="password" value="<?php echo $dataMhs['password']; ?>" required></td>
        </tr>
    </table>
    <br>
    <input type="submit" name="submit" value="Simpan">
    <a href="mahasiswaView.php"><button type="button">Batal</button></a>
</form>
</body>
</html>
