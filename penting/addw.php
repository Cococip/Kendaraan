<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mojakoko";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


// Enkripsi password menggunakan MD5
$password = md5($_POST['password']);

// Menyimpan data ke tabel 'masyarakat'
$sql_masyarakat = "INSERT INTO `masyarakat` (`nama`, `username`, `password`, `telp`, `level`) 
                    VALUES ('".$_POST['nama']."', '".$_POST['username']."', '$password', '".$_POST['telp']."', '".$_POST['level']."')";

if (mysqli_query($con, $sql_masyarakat)) {
    echo "<script>alert('Masyarakat berhasil ditambahkan!'); window.location.href = 'user.php';</script>";
} else {
    echo "<script>alert('Masyarakat gagal ditambahkan!'); window.location.href = 'dataw_tambah.php';</script>";
}

mysqli_close($con);
?>
