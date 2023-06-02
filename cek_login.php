<?php

    include('koneksi.php');

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hasil = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        $cek = mysqli_num_rows($hasil);

        session_start();
        
        if ($cek > 0) {
            $_SESSION['login'] = true;
            header('location: index.php');
        } else {
            $_SESSION['gagal'] = true;
            header('location: login.php');
        }

    }

?>