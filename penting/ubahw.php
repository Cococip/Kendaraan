<?php
include "functions.php";

if (!isset($_SESSION['login'])) {
    header("location:index.php");
    exit();
}

$id_data = isset($_GET['id_data']) ? $_GET['id_data'] : "";

$query = "SELECT * FROM masyarakat WHERE id_mas = '$id_data'";
$result = $db->query($query);

if (!$result || $result->num_rows == 0) {
    // Redirect or display an error message
}

$data = $result->fetch_object();

$showPassword = isset($_GET['showPassword']) ? $_GET['showPassword'] : false;
$hashedPassword = $showPassword ? $data->password : $data->password;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Masyarakat</title>
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
                        </span> Tambah Masyarakat
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
                                                <form action="updatew.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>ID Masyarakat</label>
                                                        <input type="hidden" name="id_mas" class="form-control" value="<?php echo $data->id_mas ?>" required readonly>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" value="<?php echo $data->nama ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" name="username" class="form-control" value="<?php echo $data->username ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Telepon</label>
                                                        <input type="text" name="telp" class="form-control" value="<?php echo $data->telp ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <select class="form-control" name="level" required>
                                                            <option value="<?php echo $data->level ?>"><?php echo $data->level ?></option>
                                                            <option <?php echo $data->level == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                            <option <?php echo $data->level == 'warga' ? 'selected' : '' ?>>Warga</option>
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
