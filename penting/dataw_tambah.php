<?php include "functions.php" ?>
<?php
if (!isset($_SESSION['login'])) {
    header("location:index.php");
}

if (isset($_POST['proses'])) {
    // Mengambil data dari form
    // Menyimpan data masyarakat
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    $query = "INSERT INTO masyarakat (nama, username, password, telp, level) VALUES ('$nama', '$username', '$password', '$telp', '$level')";
    // Eksekusi query
    // ...
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data</title>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico" />
</head>

<body>
    <?php require "partials/navbar.php"; ?>
    <div class="container-fluid page-body-wrapper">
        <?php require "partials/sidebar.php"; ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-account-search-outline"></i>
                        </span> Tambah Data
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <form action="addw.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" name="username" class="form-control" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Telp</label>
                                                        <input type="text" name="telp" class="form-control" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <select class="form-control" type="option_level" name="level" required>
                                                            <option value="">- - - Pilih Level - - - </option>
                                                            <option>admin</option>
                                                            <option>warga</option>
                                                        </select>
                                                    </div><br>
                                                    <center>
                                                        <div class="form-group">
                                                            <input type="submit" name="proses" class="btn btn-primary btn-sm" value="Simpan">
                                                            <a class="btn btn-sm btn-danger d-inline" href="user.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                                                        </div>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/dashboard.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
</body>

</html>
