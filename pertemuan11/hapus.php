<?php
    require 'function.php';

    $id = $_GET["id"];
    $queryDelete = "DELETE FROM datapersonal WHERE id = $id";
    if ( mysqli_query( $db, $queryDelete ) ){
        header("Location: index.php?error=Data berhasil dihapus!");
    } else {
        header("Location: index.php?error=Data gagal dihapus!");
    }

?>