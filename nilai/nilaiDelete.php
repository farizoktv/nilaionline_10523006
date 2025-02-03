<?php 
    include ('../koneksi/koneksi.php');

    $nim=$_GET["nim"];
    $delNilai= "DELETE FROM nilai WHERE nim = '$nim'";
    $resultMhs =mysqli_query($koneksi, $delNilai);

    if($resultMhs){
        echo "<script>alert('Data Nilai Mahasiswa Berhasil Di Hapus') </script>";
        echo "<script type='text/javascript'>window.location = 'nilaiView.php'</script>";
    } else {
        echo "<script>alert('Data Nilai Mahasiswa Gagal Hapus') </script>";
        echo "<script type='text/javascript'>window.location = 'nilaiView.php'</script>";
    }
?>

