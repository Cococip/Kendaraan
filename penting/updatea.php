<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mojakoko";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id_data = $_POST['id_data'];
$uraian = $_POST['uraian'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$plat = $_POST['plat'];
$mbl = $_POST['mbl'];
$mbl_sd = $_POST['mbl_sd'];
$mbb = $_POST['mbb'];
$mbb_sd = $_POST['mbb_sd'];
$jatuh_tempo = $_POST['jatuh_tempo'];
$lokasi = $_POST['lokasi'];
$file = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];

$target_dir = 'admin/pdf/';

// Retrieve the current file name from the database
$current_file_query = "SELECT file FROM data WHERE id_data = '$id_data'";
$current_file_result = mysqli_query($con, $current_file_query);
$current_file_data = mysqli_fetch_assoc($current_file_result);
$current_file = $current_file_data['file'];

// If a new file is uploaded, use the new file name. Otherwise, use the current file name
$target_file = (!empty($file)) ? $target_dir . basename($file) : $current_file;

// Check if a new file was uploaded
if (!empty($file)) {
    move_uploaded_file($file_tmp, $target_file);
}

$sql = "UPDATE data SET uraian='$uraian', jenis_kendaraan='$jenis_kendaraan', plat='$plat', mbl='$mbl', mbl_sd='$mbl_sd', mbb='$mbb', mbb_sd='$mbb_sd', jatuh_tempo='$jatuh_tempo', lokasi='$lokasi', file='$target_file' WHERE id_data='$id_data'";

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='aset.php';</script>";
} else {
    mysqli_close($con);
    echo "<script>alert('Data gagal diperbarui!'); window.location.href='ubaha.php';</script>";
}
?>
