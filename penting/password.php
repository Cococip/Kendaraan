<?php
session_start();
include "functions.php";

if (!isset($_SESSION['login'])) {
    header("location:index.php");
    exit;
}

$error_message = "";
$success_message = "";

if (isset($_POST['password_ubah'])) {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->query("SELECT * FROM masyarakat WHERE username='{$_SESSION['login']}' AND password='".md5($pass1)."'")->fetch_assoc();
    if ($pass1 == '' || $pass2 == '' || $pass3 == '') {
        $error_message = 'Field bertanda * harus diisi.';
    } elseif (!$row) {
        $error_message = 'Password lama salah.';
    } elseif ($pass2 != $pass3) {
        $error_message = 'Password baru dan konfirmasi password baru tidak sama.';
    } else {
        $db->query("UPDATE masyarakat SET password='".md5($pass2)."' WHERE username='{$_SESSION['login']}'");
        $success_message = 'Password berhasil diubah.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Password</title>
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
                        </span> Ubah Password
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
                                                <form method="post">
                                                    <?php if ($error_message != ''): ?>
                                                        <div class="form-group">
                                                            <div class="alert alert-danger" role="alert">
                                                                <?php echo $error_message; ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($success_message != ''): ?>
                                                        <div class="form-group">
                                                            <div class="alert alert-success" role="alert">
                                                                <?php echo $success_message; ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="form-group">
                                                        <label>Password Lama <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="password" name="pass1" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password Baru <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="password" name="pass2" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="password" name="pass3" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="password_ubah" class="btn btn-primary btn-sm" value="Update">
                                                        <a class="btn btn-sm btn-danger d-inline" href="dashboard.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                                                    </div>
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
