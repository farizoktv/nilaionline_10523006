<?php 
include "../koneksi/koneksi.php";

$queryDosen = "SELECT * FROM dosen";
$resultDosen = mysqli_query($koneksi, $queryDosen);
$countDosen = mysqli_num_rows($resultDosen);
?>

<h3>DATA DOSEN</h3>
<br /><br />
<a href="dosenAdd.php"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA DOSEN" /></a>
<br /><br />
<table border="1">
    <!-- TABEL MASTER DOSEN -->
    <tr>
        <th>NIP</th>
        <th>NAMA</th>
        <th>KODE MATA KULIAH</th>
        <th>AKSI</th>
    </tr>
    <?php
    if ($countDosen > 0) {
        while ($dataDosen = mysqli_fetch_array($resultDosen, MYSQLI_NUM)) {
    ?>
            <tr class="add">
                <td class="value"><?php echo "$dataDosen[0]"; ?></td>
                <td class="value"><?php echo "$dataDosen[1]"; ?></td>
                <td class="value"><?php echo "$dataDosen[2]"; ?></td>
                <td class="value">
                    <a href="dosenEdit.php?nip=<?php echo $dataDosen[0]; ?>">Edit</a>
                    <a href="dosenDelete.php?nip=<?php echo $dataDosen[0]; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
    <?php
        }
    } else {
        echo "<tr>
                <td colspan='4' align='center' height='20'>
                    <div>Belum ada Data Dosen</div>
                </td>
              </tr>";
    }
    echo "</table>";
    ?>

<a href="../admin/index.php">&laquo; KEMBALI </a>