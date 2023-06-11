<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mojakoko";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id_mas = $_POST['id_mas'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$telp = $_POST['telp'];
$level = $_POST['level'];

$sql = "UPDATE masyarakat SET nama='$nama', username='$username', telp='$telp', level='$level' WHERE id_mas='$id_mas'";

if (mysqli_query($con, $sql)) {
    echo "<script>alert('Data berhasil diperbarui!'); history.go(-1);</script>";
} else {
    echo "<script>alert('Data gagal diperbarui!'); history.go(-1);</script>";
}

mysqli_close($con);
?>
