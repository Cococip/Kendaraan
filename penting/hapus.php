<?php
include"koneksi.php";
$id= $_GET['id'];
$data= mysqli_query($koneksi,"DELETE FROM data where uraian='$id'");

if($data){
	header('location:data.php');
}else{
	echo "Maaf Hapus Data Tidak Berhasil";
}
?>