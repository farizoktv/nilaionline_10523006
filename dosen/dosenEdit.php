<?php
include('../koneksi/koneksi.php');

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];
    // Ambil data dosen berdasarkan NIP
    $queryGetDosen = "SELECT * FROM dosen WHERE nip = '$nip'";
    $resultGetDosen = mysqli_query($koneksi, $queryGetDosen);

    if (mysqli_num_rows($resultGetDosen) > 0) {
        $dataDosen = mysqli_fetch_assoc($resultGetDosen);
    } else {
        echo "<script>alert('Data Dosen tidak ditemukan!')</script>";
        echo "<script type='text/javascript'>window.location = 'dosenView.php'</script>";
        exit;
    }
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kode_mtkul = $_POST['kode_mtkul'];

    // Query update dosen
    $updateDosen = "
        UPDATE dosen 
        SET nama = '$nama', 
            kode_mtkul = '$kode_mtkul' 
        WHERE nip = '$nip'
    ";
    $resultUpdate = mysqli_query($koneksi, $updateDosen);

    if ($resultUpdate) {
        echo "<script>alert('Data Dosen Berhasil Diperbarui')</script>";
        echo "<script type='text/javascript'>window.location = 'dosenView.php'</script>";
    } else {
        echo "<script>alert('Data Dosen Gagal Diperbarui')</script>";
        echo "<script type='text/javascript'>window.location = 'dosenView.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Dosen</title>
</head>
<body>
<h3>Edit Data Dosen</h3>
<form method="post">
    <table>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td><input type="text" name="nip" value="<?php echo $dataDosen['nip']; ?>" readonly></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $dataDosen['nama']; ?>" required></td>
        </tr>
        <tr>
            <td>Kode Mata Kuliah</td>
            <td>:</td>
            <td>
                <select name="kode_mtkul" required>
                    <option value="MK001" <?php echo ($dataDosen['kode_mtkul'] == 'MK001') ? 'selected' : ''; ?>>MK001</option>
                    <option value="MK002" <?php echo ($dataDosen['kode_mtkul'] == 'MK002') ? 'selected' : ''; ?>>MK002</option>
                </select>
            </td>
        </tr>
    </table>
    <br>
    <input type="submit" name="submit" value="Simpan">
    <a href="dosenView.php"><button type="button">Batal</button></a>
</form>
</body>
</html>