<?php

include('koneksi.php');

session_start();

if (!isset($_SESSION['login'])) {
    header('location: login.php');
}

$data = mysqli_query($koneksi, "SELECT * FROM students");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mandatsis | Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Mandatsis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir dari Navbar -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title">Manajemen Data Siswa</h3>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['gagal'])) {
                    echo '<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                            ' . $_SESSION['gagal'] . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    unset($_SESSION['gagal']);
                } elseif (isset($_SESSION['sukses'])) {
                    echo '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show" role="alert">
                            ' . $_SESSION['sukses'] . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    unset($_SESSION['sukses']);
                }
                ?>
                <a href="#" data-bs-toggle="modal" data-bs-target="#tambahData" class="btn btn-primary mb-2">&plus; Tambah</a>
                <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahData" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Siswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="tambah.php" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="mb-1" for="exampleInputEmail1">Nama Lengkap</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" required placeholder="Masukkan nama lengkap">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="mb-1" for="exampleInputPassword1">NISN</label>
                                            <input type="text" name="nisn" class="form-control" id="exampleInputnisn1" required placeholder="Masukkan nisn">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="mb-1">Jenis Kelamin</label>
                                            <select name="jk" class="form-select" aria-label="Pilih jenis kelamin">
                                                <option disabled selected>- Pilih -</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="mb-1" for="exampleInputPassword1">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="exampleInputalamat1" required placeholder="Masukkan alamat"></textarea>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="mb-1" for="exampleInputPassword1">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" id="exampleInputtempat_lahir1" required placeholder="Masukkan tempat lahir">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="mb-1" for="exampleInputPassword1">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control" id="exampleInputtgl_lahir1" required>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $d) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $d['nama'] ?></td>
                                <td><?= $d['nisn'] ?></td>
                                <td><?= $d['jk'] ?></td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#lihatData<?= $d['id'] ?>">Lihat</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editData<?=$d['id']?>" class="btn btn-success btn-sm">Edit</a>
                                    <div class="modal fade" id="editData<?=$d['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editData<?=$d['id']?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Siswa</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="edit.php" id="form<?=$d['id']?>" method="POST">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <input type="hidden" name="id" value="<?=$d['id']?>">
                                                                <label class="mb-1" for="exampleInputEmail1">Nama Lengkap</label>
                                                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="<?= $d['nama'] ?>" required placeholder="Masukkan nama lengkap">
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <label class="mb-1" for="exampleInputPassword1">NISN</label>
                                                                <input type="text" name="nisn" class="form-control" id="exampleInputnisn1" value="<?= $d['nisn'] ?>" required placeholder="Masukkan nisn">
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <label class="mb-1">Jenis Kelamin</label>
                                                                <select name="jk" class="form-select" aria-label="Pilih jenis kelamin">
                                                                    <option disabled selected>- Pilih -</option>
                                                                    <option <?php if ($d['jk'] == "Laki-laki") {echo "selected";} ?> value="Laki-laki">Laki-laki</option>
                                                                    <option <?php if ($d['jk'] == "Perempuan") {echo "selected";} ?> value="Perempuan">Perempuan</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <label class="mb-1" for="exampleInputPassword1">Alamat</label>
                                                                <textarea name="alamat" class="form-control" id="exampleInputalamat1" required placeholder="Masukkan alamat"><?= $d['alamat'] ?></textarea>
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <label class="mb-1" for="exampleInputPassword1">Tempat Lahir</label>
                                                                <input type="text" name="tempat_lahir" class="form-control" id="exampleInputtempat_lahir1" value="<?= $d['tempat_lahir'] ?>" required placeholder="Masukkan tempat lahir">
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <label class="mb-1" for="exampleInputPassword1">Tanggal Lahir</label>
                                                                <input type="date" name="tgl_lahir" class="form-control" id="exampleInputtgl_lahir1" value="<?= $d['tgl_lahir'] ?>" required>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="submit" class="btn btn-success">Perbarui</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="hapus.php?id=<?=$d['id']?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="lihatData<?= $d['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="lihatData<?= $d['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Data Siswa</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>ID Data</h5>
                                            <p><?= $d['id'] ?></p>
                                            <hr>
                                            <h5>Nama Lengkap</h5>
                                            <p><?= $d['nama'] ?></p>
                                            <hr>
                                            <h5>NISN</h5>
                                            <p><?= $d['nisn'] ?></p>
                                            <hr>
                                            <h5>Jenis kelamin</h5>
                                            <p><?= $d['jk'] ?></p>
                                            <hr>
                                            <h5>Alamat</h5>
                                            <p><?= $d['alamat'] ?></p>
                                            <hr>
                                            <h5>Tempat & Tanggal Lahir</h5>
                                            <p><?= $d['tempat_lahir'] ?>, <?= $d['tgl_lahir'] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>