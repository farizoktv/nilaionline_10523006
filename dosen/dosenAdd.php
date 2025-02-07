<?php
    include('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA DOSEN</h3>
<br /><hr /><br />

<?php 
    if (!isset($_POST['submit'])) {
?>

<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
        <tr>
            <td width="27%">NIP</td>
            <td width="40%">:</td>
            <td width="69%"><input type="text" name="nip" size="30" placeholder="NIP"></td>
        </tr>

        <tr>
            <td width="27%">NAMA</td>
            <td width="40%">:</td>
            <td width="69%"><input type="text" name="nama" size="30" placeholder="NAMA"></td>
        </tr>

        <tr>
            <td height="50">KODE MATA KULIAH:</td>
            <td></td>
            <td>
                <select name="kode_mtkul">
                    <option value="">PILIH</option>
                    <option value="MK001">MK001</option>
                    <option value="MK002">MK002</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>
                <input id="submit" name="submit" type="submit" value="TAMBAH" />
            </td>
        </tr>
    </table>
</form>

<?php 
    } else {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $kode_mtkul = $_POST['kode_mtkul'];

        // Input Data Dosen
        $insertDosen = "INSERT INTO dosen (nip, nama, kode_mtkul) VALUES ('$nip', '$nama', '$kode_mtkul')";
        $queryDosen = mysqli_query($koneksi, $insertDosen);

        if ($queryDosen) {
            echo "<script>alert('Data Berhasil Disimpan!');</script>";
            echo "<script type='text/javascript'>window.location='dosenView.php';</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan!');</script>";
            echo "<script type='text/javascript'>window.location='dosenView.php';</script>";
        }
    }
?>

<a href="dosenView.php">&laquo; KEMBALI </a>