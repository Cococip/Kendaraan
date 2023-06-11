<?php
require_once 'functions.php';

// Inisialisasi koneksi database
$db = new mysqli('localhost', 'root', '', 'mojakoko');

if ($db->connect_error) {
    die("Koneksi database gagal: " . $db->connect_error);
}

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    
    /** LOGIN */
    if ($act == 'logout') {
        unset($_SESSION['login']);
        header("location:../index.php");
    }

    /** DIAGNOSA */
    else if ($act == 'data_hapus') {
        $db->query("DELETE FROM data WHERE id_data='$_GET[ID]'");
        header("location:data.php");
    } 

     /** Aset */
     else if ($act == 'dataa_hapus') {
        $db->query("DELETE FROM data WHERE id_data='$_GET[ID]'");
        header("location:aset.php");
    }  
}
?>
