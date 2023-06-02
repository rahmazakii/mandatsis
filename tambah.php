<?php

include('koneksi.php');

session_start();

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];

    $hasil = mysqli_query($koneksi, "INSERT INTO students(nama, nisn, jk, alamat, tempat_lahir, tgl_lahir) VALUES('$nama', '$nisn', '$jk', '$alamat', '$tempat_lahir', '$tgl_lahir')");

    if ($hasil) {
        $_SESSION['sukses'] = "Berhasil menambahkan data siswa.";
        header('location: index.php');
    } else {
        $_SESSION['gagal'] = "Gagal menambahkan data siswa.";
        header('location: index.php');
    }
    
}

?>