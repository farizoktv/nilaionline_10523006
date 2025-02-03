<?php
include "../koneksi/koneksi.php";

$queryNilai = "
    SELECT
    nilai.nim,
    mahasiswa.nama,
    nilai.nl_tugas,
    nilai.nl_uts,
    nilai.nl_uas, 
    (0.2 * nilai.nl_tugas) + (0.4 * nilai.nl_uts) + (0.4 * nilai.nl_uas) as nilai_akhir, 
    nilai.nip,
    dosen.nama dosen from nilai 
    left join mahasiswa on nilai.nim = mahasiswa.nim 
    left join dosen on nilai.nip = dosen.nama
";
$resultNilai = mysqli_query($koneksi, $queryNilai);
$countNilai = mysqli_num_rows($resultNilai);
?>

<h3>DATA NILAI</h3>
<br />
<a href="nilaiAdd.php"><input name="add" type="submit" class="buttonadd" value="TAMBAH DATA NILAI"></a>
<br /><br />

<table border="1">
    <!-- TABEL MASTER MAHASISWA -->
    <tr>
        <th>NIM</th>
        <th>NAMA</th>
        <th>TUGAS</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>NILAI AKHIR</th>
        <th>DOSEN</th>
        <th>AKSI</th>
    </tr>

    <?php
    if ($countNilai > 0) {
        while ($dataNilai = mysqli_fetch_array($resultNilai, MYSQLI_NUM)) {
    ?>
    <tr class="add">
        <td class="value"><?php echo $dataNilai[0]; ?></td>
        <td class="value"><?php echo $dataNilai[1]; ?></td>
        <td class="value"><?php echo $dataNilai[2]; ?></td>
        <td class="value"><?php echo $dataNilai[3]; ?></td>
        <td class="value"><?php echo $dataNilai[4]; ?></td>
        <td class="value"><?php echo $dataNilai[5]; ?></td>
        <td class="value"><?php echo $dataNilai[6]; ?></td>
        <td class="value">
            <a href="nilaiEdit.php?nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>">Edit</a> 
            <a href="nilaiDelete.php?nim=<?php echo $dataNilai[0]; ?>&nip=<?php echo $dataNilai[6]; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
        </td>
    </tr>
    <?php
        }
    } else {
        echo "
        <tr>
            <td colspan='9' align='center' height='20'>
                <i>Belum ada Data Mahasiswa</i>
            </td>
        </tr>
        ";
    }
    ?>
</table>
