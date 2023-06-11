<?php
include "functions.php";

if (!isset($_SESSION['login'])) {
    header("location:index.php");
    exit();
}

$q = isset($_GET['q']) ? $_GET['q'] : ""; // Periksa apakah variabel 'q' terdefinisi, jika tidak, beri nilai string kosong

$page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini
$perPage = 10; // Jumlah data per halaman
$start = ($page - 1) * $perPage; // Indeks awal data yang akan ditampilkan

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Kendaraan</title>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico" />
    <style>
        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            margin: 0 5px;
            padding: 8px 12px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            color: #333;
            text-decoration: none;
            border-radius: 3px;
        }

        .pagination a.active {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
        }
    </style>
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
                        </span>Data Kendaraan
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
                                        <form class="form-inline">
                                            <div class="form-group" style="float:right;">
                                                <a class="btn btn-primary" href="data_tambah.php"><span class="mdi mdi-library-plus"></span> Tambah</a>
                                            </div>
                                            <input type="hidden" name="m" value="relasi" />
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Pencarian" name="q" value="<?= $q ?>" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr class="nw">
                                                    <th>No</th>
                                                    <th>Uraian</th>
                                                    <th>Jenis Kendaraan</th>
                                                    <th>Plat</th>
                                                    <th>MBL</th>
                                                    <th>MBL_SD</th>
                                                    <th>MBB</th>
                                                    <th>MBB_SD</th>
                                                    <th>Jatuh Tempo</th>
                                                    <th>Lokasi</th>
                                                    <th>File</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM data WHERE 
                                                    id_data LIKE '%$q%' OR
                                                    id_mas LIKE '%$q%' OR
                                                    uraian LIKE '%$q%' OR
                                                    jenis_kendaraan LIKE '%$q%' OR
                                                    plat LIKE '%$q%' OR
                                                    mbl LIKE '%$q%' OR
                                                    mbl_sd LIKE '%$q%' OR
                                                    mbb LIKE '%$q%' OR
                                                    mbb_sd LIKE '%$q%' OR
                                                    jatuh_tempo LIKE '%$q%' OR
                                                    lokasi LIKE '%$q%' OR
                                                    file LIKE '%$q%'
                                                    ORDER BY id_data
                                                    LIMIT $start, $perPage";

                                                $result = $db->query($query);

                                                if ($result && $result->num_rows > 0) {
                                                    $nomor = $start + 1; // Variabel nomor urut
                                                    while ($row = $result->fetch_object()) {
                                                        echo "<tr>";
                                                        echo "<td>{$nomor}</td>"; // Menampilkan nomor urut
                                                        echo "<td>{$row->uraian}</td>";
                                                        echo "<td>{$row->jenis_kendaraan}</td>";
                                                        echo "<td>{$row->plat}</td>";
                                                        echo "<td>{$row->mbl}</td>";
                                                        echo "<td>{$row->mbl_sd}</td>";
                                                        echo "<td>{$row->mbb}</td>";
                                                        echo "<td>{$row->mbb_sd}</td>";
                                                        echo "<td>{$row->jatuh_tempo}</td>";
                                                        echo "<td>{$row->lokasi}</td>";
                                                        echo "<td>{$row->file}</td>";
                                                        echo "<td class='nw'>
                                                                <a class='btn btn-xs btn-warning' href='ubah.php?id_data={$row->id_data}'>Ubah</a> ||
                                                                <a class='btn btn-xs btn-danger' href='aksi.php?act=data_hapus&ID={$row->id_data}' onclick='return confirm(\"Hapus data?\")'><span class='mdi mdi-delete'></span></a>
                                                            </td>";
                                                        echo "</tr>";
                                                        $nomor++; // Increment nomor urut
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='12'>Tidak ada data yang ditemukan.</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pagination">
                                        <?php
                                        $queryCount = "SELECT COUNT(*) AS count FROM data WHERE 
                                            id_data LIKE '%$q%' OR
                                            id_mas LIKE '%$q%' OR
                                            uraian LIKE '%$q%' OR
                                            jenis_kendaraan LIKE '%$q%' OR
                                            plat LIKE '%$q%' OR
                                            mbl LIKE '%$q%' OR
                                            mbl_sd LIKE '%$q%' OR
                                            mbb LIKE '%$q%' OR
                                            mbb_sd LIKE '%$q%' OR
                                            jatuh_tempo LIKE '%$q%' OR
                                            lokasi LIKE '%$q%' OR
                                            file LIKE '%$q%'";
                                        $resultCount = $db->query($queryCount);
                                        $rowCount = $resultCount->fetch_assoc()['count'];
                                        $totalPages = ceil($rowCount / $perPage);

                                        if ($totalPages > 1) {
                                            echo "<a href='?q={$q}&page=1' class='" . ($page == 1 ? 'active' : '') . "'>First</a>";
                                            for ($i = 1; $i <= $totalPages; $i++) {
                                                echo "<a href='?q={$q}&page={$i}' class='" . ($page == $i ? 'active' : '') . "'>{$i}</a>";
                                            }
                                            echo "<a href='?q={$q}&page={$totalPages}' class='" . ($page == $totalPages ? 'active' : '') . "'>Last</a>";
                                        }
                                        ?>
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
