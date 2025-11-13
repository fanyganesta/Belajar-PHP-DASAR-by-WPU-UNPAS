<?php
    $db = mysqli_connect('localhost', 'root', '', 'php_dasar');
    $dataPersonal = mysqli_query( $db, 'SELECT * FROM dataPersonal');

    $datas = [];

    function query( $query ){
        while ( $fetch = mysqli_fetch_assoc( $query )) {
            global $datas;
            $datas[] = $fetch;
        }
        return $datas;
    }

    $dataPersonals = query( $dataPersonal );




    // Tambah proses insert data
    // Cek keberhasilan dan keamanan
    // Tambah fitur hapus data


    
    if( isset($_POST["submit"])){
        
        $namaDepan = htmlspecialchars($_POST["namaDepan"]);
        $namaBelakang = htmlspecialchars($_POST["namaBelakang"]);
        $tanggalLahir = htmlspecialchars($_POST["tanggalLahir"]);
        $pekerjaan = htmlspecialchars($_POST["pekerjaan"]);
        $img = htmlspecialchars($_POST["img"]);
        
        $queryInsert = "INSERT INTO datapersonal values ('', '$namaDepan', '$namaBelakang', '$tanggalLahir', '$pekerjaan', '$img')";

        mysqli_query( $db, $queryInsert);

        if( mysqli_affected_rows($db) > 0 ){
            header("Location: index.php?message=Data ditambahkan");
        }
    }
?>