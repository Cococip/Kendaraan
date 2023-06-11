<?php include "functions.php" ?>
<?php
if (!isset($_SESSION['login'])) {
    header("location:index.php");
}

if (isset($_POST['proses'])) {
    // Mengambil data dari form
    // Menyimpan data masyarakat
    $id_mas = $_SESSION['id_mas'];
    $uraian = $_POST['uraian'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $plat = $_POST['plat'];
    $mbl = $_POST['mbl'];
    $mbl_sd = $_POST['mbl_sd'];
    $mbb = $_POST['mbb'];
    $mbb_sd = $_POST['mbb_sd'];
    $jatuh_tempo = $_POST['jatuh_tempo'];
    $lokasi = $_POST['lokasi'];

    // Mengambil file yang diupload
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    // Menentukan lokasi folder untuk menyimpan file
    $folder = "admin/pdf/";
    $file_path = $folder . $file_name;

    // Memindahkan file ke lokasi yang ditentukan
    move_uploaded_file($file_tmp, $file_path);

    // Memasukkan data ke dalam tabel "data"
    $query = "INSERT INTO data (id_mas, uraian, jenis_kendaraan, plat_mbl, mbl_sd, mbb, mbb_sd, jatuh_tempo, lokasi, file) VALUES ('$id_mas', '$uraian', '$jenis_kendaraan', '$plat_mbl', '$mbl_sd', '$mbb', '$mbb_sd', '$jatuh_tempo', '$lokasi', '$file_name')";
    // Eksekusi query
    // ...

    // Redirect ke halaman lain setelah proses selesai
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
                                                <form action="adda.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Uraian</label>
                                                        <input type="text" name="uraian" class="form-control" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Jenis Kendaraan</label>
                                                        <select class="form-control" name="jenis_kendaraan" required>
                                                            <option value="">- - - Pilih Jenis Kendaraan - - - </option>
                                                            <option value="roda 2">Roda 2</option>
                                                            <option value="roda 4">Roda 4</option>
                                                        </select>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Plat Mobil</label>
                                                        <input type="text" name="plat" class="form-control" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Masa Berlaku Lama</label>&nbsp;
                                                        <input type="date" name="mbl"  required>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<label>s/d</label>
                                                        <input type="date" name="mbl_sd" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Masa Berlaku Baru</label> &nbsp;
                                                        <input type="date" name="mbb" required>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<label>s/d</label>
                                                        <input type="date" name="mbb_sd" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Jatuh Tempo</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="date" name="jatuh_tempo" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Lokasi</label>
                                                        <select class="form-control" name="lokasi" required>
                                                            <option value="">- - - Pilih Lokasi - - - </option>
                                                            <option value="KC MANADO">KC MANADO</option>
                                                            <option value="KC TERNATE">KC TERNATE</option>
                                                            <option value="KC LUWUK">KC LUWUK</option>
                                                        </select>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Upload File Dengan format PDF</label>
                                                        <input type="file" name="file" accept="application/pdf" class="form-control">
                                                        <p class="PDF"><b><i style="color: red;">*)File Dalam Bentuk PDF.<b><i></p>
                                                    </div><br>
                                                    <center>
                                                        <div class="form-group">
                                                            <input type="submit" name="proses" class="btn btn-primary btn-sm" value="Simpan">
                                                            <a class="btn btn-sm btn-danger d-inline" href="aset.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
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
