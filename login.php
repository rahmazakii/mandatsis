<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mandatsis | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            background: url("mandatsis.png");
            margin: 0px auto;    
            background-size: 100%;                     
            width: 750px;
        }
        body,
        .container {
            min-height: 100vh !important;
           
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card card-primary w-50">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title">Log in</h3>
            </div>
            <form action="cek_login.php" method="POST">
                <div class="card-body">
                    <?php session_start();
                        if (isset($_SESSION['login'])) {
                            header('location: index.php');
                        }
                        if (isset($_SESSION['gagal'])) {
                            echo '<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                            Username atau password salah.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
                    ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" required placeholder="Masukkan username">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required placeholder="Masukkan password">
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" name="submit" class="btn btn-primary">Log in</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>