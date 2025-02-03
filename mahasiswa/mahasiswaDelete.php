<?php 
    include ('../koneksi/koneksi.php');

    $nim=$_GET["nim"];
    $delMhs= "DELETE FROM mahasiswa WHERE nim = '$nim'";
    $resultMhs =mysqli_query($koneksi, $delMhs);

    if($resultMhs){
        echo "<script>alert('Data Mahasiswa Berhasil Di Hapus') </script>";
        echo "<script type='text/javascript'>window.location = 'mahasiswaView.php'</script>";
    } else {
        echo "<script>alert('Data Mahasiswa Gagal Hapus') </script>";
        echo "<script type='text/javascript'>window.location = 'mahasiswaView.php'</script>";
    }
?>

