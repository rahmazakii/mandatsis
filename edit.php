<?php

include('koneksi.php');

session_start();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];

    $hasil = mysqli_query($koneksi, "UPDATE students SET nama='$nama', nisn='$nisn', jk='$jk', alamat='$alamat', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir' WHERE id='$id'");

    if ($hasil) {
        $_SESSION['sukses'] = "Berhasil memperbarui data siswa.";
        header('location: index.php');
    } else {
        $_SESSION['gagal'] = "Gagal memperbarui data siswa.";
        header('location: index.php');
    }
    
}

?>