<?php
include "functions.php";

if (!isset($_SESSION['login'])) {
    header("location:index.php");
    exit();
}

$id_data = isset($_GET['id_data']) ? $_GET['id_data'] : "";

$query = "SELECT * FROM data WHERE id_data = '$id_data'";
$result = $db->query($query);

if (!$result || $result->num_rows == 0) {
    // Redirect or display an error message
    header("location:data_not_found.php");
    exit();
}

$data = $result->fetch_object();
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
                                                <form action="update.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>ID Data</label>
                                                        <input type="hidden" name="id_data" class="form-control" value="<?php echo $data->id_data ?>" required readonly>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Uraian</label>
                                                        <input type="text" name="uraian" class="form-control" value="<?php echo $data->uraian ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Jenis Kendaraan</label>
                                                        <select class="form-control" name="jenis_kendaraan" required>
                                                            <option value="">- - - Pilih Jenis Kendaraan - - - </option>
                                                            <option <?php echo $data->jenis_kendaraan == 'Roda 2' ? 'selected' : '' ?>>Roda 2</option>
                                                            <option <?php echo $data->jenis_kendaraan == 'Roda 4' ? 'selected' : '' ?>>Roda 4</option>
                                                        </select>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>No Plat Kendaraan</label>
                                                        <input type="text" name="plat" class="form-control" value="<?php echo $data->plat ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Masa Berlaku Lama</label>&nbsp;
                                                        <input type="date" name="mbl" value="<?php echo $data->mbl ?>" required>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<label>s/d</label>
                                                        <input type="date" name="mbl_sd" value="<?php echo $data->mbl_sd ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Masa Berlaku Baru</label> &nbsp;
                                                        <input type="date" name="mbb" value="<?php echo $data->mbb ?>" required>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<label>s/d</label>
                                                        <input type="date" name="mbb_sd" value="<?php echo $data->mbb_sd ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Jatuh Tempo</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="date" name="jatuh_tempo" value="<?php echo $data->jatuh_tempo ?>" required>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Lokasi</label>
                                                        <select class="form-control" name="lokasi" required>
                                                            <option value="">- - - Pilih Lokasi - - - </option>
                                                            <option <?php echo $data->lokasi == 'KC MANADO' ? 'selected' : '' ?>>KC MANADO</option>
                                                            <option <?php echo $data->lokasi == 'KC LUWUK' ? 'selected' : '' ?>>KC LUWUK</option>
                                                            <option <?php echo $data->lokasi == 'KC TONDANO' ? 'selected' : '' ?>>KC TONDANO</option>
                                                            <option <?php echo $data->lokasi == 'KC GORONTALO' ? 'selected' : '' ?>>KC GORONTALO</option>
                                                            <option <?php echo $data->lokasi == 'KC PALU' ? 'selected' : '' ?>>KC PALU</option>
                                                            <option <?php echo $data->lokasi == 'KC TERNATE' ? 'selected' : '' ?>>KC TERNATE</option>
                                                        </select>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label>Upload File</label>
                                                        <input type="file" name="file" accept="application/pdf" class="form-control">
                                                        <input type="hidden" name="current_file" value="<?php echo $data->file ?>">
                                                        <?php if (!empty($data->file)) { ?>
                                                            <p>File saat ini: <a href="<?php echo $data->file ?>" target="_blank"><?php echo $data->file ?></a></p>
                                                        <?php } else { ?>
                                                            <p>File saat ini: Belum ada file</p>
                                                        <?php } ?>
                                                        <p class="PDF"><b><i>*)File Dalam Bentuk PDF.<b><i></p>
                                                    </div><br>
                                                    <center>
                                                        <div class="form-group">
                                                            <input type="submit" name="proses" class="btn btn-primary" value="Update">
                                                            <a href="data.php" class="btn btn-danger">Batal</a>
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
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/template.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
</body>

</html>
