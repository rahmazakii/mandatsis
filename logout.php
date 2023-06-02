<?php

    include('koneksi.php');

    session_start();
    if (isset($_SESSION['login'])) {
        session_destroy();
        unset($_SESSION);
        
        header('location: login.php');
    }

?>