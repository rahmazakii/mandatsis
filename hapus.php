<?php

include('koneksi.php');

session_start();

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $hasil = mysqli_query($koneksi, "DELETE FROM students WHERE id='$id'");

    if ($hasil) {
        $_SESSION['sukses'] = "Berhasil menghapus data siswa.";
        header('location: index.php');
    } else {
        $_SESSION['gagal'] = "Gagal menghapus data siswa.";
        header('location: index.php');
    }
    
}

?>