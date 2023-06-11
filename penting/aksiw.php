<?php
require_once 'functions.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    
    /** LOGIN */
    if ($act == 'logout') {
        // unset($_SESSION['login']);
        // header("location:../index.php");
         session_unset();
        // session_unset($_SESSION['login']);
        session_destroy();
        header("location:../index.php");
    }

    /** DIAGNOSA */
    else if ($act == 'mas_hapus') {
        $db->query("DELETE FROM masyarakat WHERE id_mas='$_GET[ID]'");
        header("location:user.php");
    }

    
}
?>
