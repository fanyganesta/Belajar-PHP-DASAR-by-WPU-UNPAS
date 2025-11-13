<?php
    // Cek apakah session aktif
    session_start();
    if( !isset($_SESSION['user'])){
        header("Location: login.php?message=Anda harus login dahulu");
        exit;
    }

    // Cek apakah id sudah diset
    if( !isset($_GET['id'] )){
        header("Location: index.php?error=Pilih user yang mau dihapus dahulu");
        exit;
    }

    require 'function.php';

    $id = $_GET["id"];
    $queryDelete = "DELETE FROM datapersonal WHERE id = $id";
    if ( mysqli_query( $db, $queryDelete ) ){
        header("Location: index.php?error=Data berhasil dihapus!");
    } else {
        header("Location: index.php?error=Data gagal dihapus!");
    }

?>