<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mojakoko";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Mendapatkan id_mas dari sesi login (Anda perlu menggantinya dengan implementasi sesi login yang sesuai)
$id_mas = $_SESSION['id_mas'];

// Mengambil data dari form
$uraian = $_POST['uraian'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$plat = $_POST['plat'];
$mbl = $_POST['mbl'];
$mbl_sd = $_POST['mbl_sd'];
$mbb = $_POST['mbb'];
$mbb_sd = $_POST['mbb_sd'];
$jatuh_tempo = $_POST['jatuh_tempo'];
$lokasi = $_POST['lokasi'];

// Mendapatkan nama file
$file_name = $_FILES['file']['name'];
// Mendapatkan path file sementara
$file_tmp = $_FILES['file']['tmp_name'];
// Mendapatkan path folder tujuan penyimpanan file
$folder_path = 'admin/pdf/';
// Menyimpan file ke folder tujuan
$upload_path = $folder_path . $file_name;

// Cek jika file dengan nama yang sama sudah ada di folder tujuan
if (file_exists($upload_path)) {
    echo "<script>alert('File dengan nama yang sama sudah ada! Rubah nama file dan upload kembali.'); window.location.href = 'data_tambah.php';</script>";
} else {
    move_uploaded_file($file_tmp, $upload_path);

    // Menambahkan data ke tabel 'data'
    $sql_data = "INSERT INTO `data` (`id_data`, `id_mas`, `uraian`, `jenis_kendaraan`, `plat`, `mbl`, `mbl_sd`, `mbb`, `mbb_sd`, `jatuh_tempo`, `lokasi`, `file`) 
                VALUES (NULL, '$id_mas', '$uraian', '$jenis_kendaraan', '$plat', '$mbl', '$mbl_sd', '$mbb', '$mbb_sd', '$jatuh_tempo', '$lokasi', '$file_name')";

    if (mysqli_query($con, $sql_data)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href = 'aset.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan!'); window.location.href = 'dataa_tambah.php';</script>";
    }
}

mysqli_close($con);
?>
