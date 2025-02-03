<?php
    include('../koneksi/koneksi.php');
?>

<h3>TAMBAH NILAI</h3>
<br /><hr /><br />

<?php 
    if (!isset($_POST['submit'])) {
?>

<form enctype="multipart/form-data" method="post">
    <table width="100%" border="0">
        <tr>
            <td width="27%">NAMA MAHASISWA</td>
            <td width="40%">:</td>
            <td width="69%">
                <select name="mhs" class='form-control' required>
                    <option value="">-=PILIH=-</option>
                    <?php 
                        $querymhs = "SELECT nim, nama FROM mahasiswa";
                        $resultmhs = mysqli_query($koneksi, $querymhs);
                        while ($datamhs = mysqli_fetch_array($resultmhs, MYSQLI_NUM)) {
                            echo "<option value='$datamhs[0]'>$datamhs[1]</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td width="27%">NAMA DOSEN</td>
            <td width="40%">:</td>
            <td width="69%">
                <select name="dosen" class='form-control' required>
                    <option value="">-=PILIH=-</option>
                    <?php 
                        $querydosen = "SELECT nip, nama FROM dosen";
                        $resultdosen = mysqli_query($koneksi, $querydosen);
                        while ($datadosen = mysqli_fetch_array($resultdosen, MYSQLI_NUM)){
                            echo "<option value='$datadosen[0]'>$datadosen[1]</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td width="27%">Nilai Tugas</td>
            <td width="40%">:</td>
            <td width="69%"><input type="number" name="tugas" size="30" placeholder="0-100"></td>
        </tr>

        <tr>
            <td width="27%">Nilai UTS</td>
            <td width="40%">:</td>
            <td width="69%"><input type="number" name="uts" size="30" placeholder="0-100"></td>
        </tr>

        <tr>
            <td width="27%">Nilai UAS</td>
            <td width="40%">:</td>
            <td width="69%"><input type="number" name="uas" size="30" placeholder="0-100"></td>
        </tr>
    </table>

    <br />
    <input id="submit" name="submit" type="submit" value="TAMBAH" />
</form>

<?php
    }
    else {
        $mhs = $_POST['mhs'];
        $dosen = $_POST['dosen'];
        $tugas = $_POST['tugas'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];

        // Debugging: Cek data yang diambil
        // echo $mhs . " - " . $dosen; die;

        // Query untuk memasukkan nilai ke dalam tabel
        $insertnilai = "INSERT INTO nilai (nl_tugas, nl_uts, nl_uas, nim, nip) VALUES ('$tugas', '$uts', '$uas', '$mhs', '$dosen') ";
        $querynilai = mysqli_query($koneksi, $insertnilai);

        // Cek apakah query berhasil
        if ($querynilai) {
            echo "<script>alert('Data Nilai Berhasil Disimpan!')</script>";
            echo "<script type='text/javascript'>window.location = 'nilaiView.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan!')</script>";
            echo "<script type='text/javascript'>window.location = 'nilaiView.php'</script>";
        }
    }
?>
