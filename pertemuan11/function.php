<?php
    $db = mysqli_connect('localhost', 'root', '', 'php_dasar');
    $dataPersonal = mysqli_query( $db, 'SELECT * FROM dataPersonal');

    
    function query( $query ){
        $datas = [];
        while ( $fetch = mysqli_fetch_assoc( $query )) {
            $datas[] = $fetch;
        }
        return $datas;
    }

    $dataPersonals = query( $dataPersonal );




    // Tambah proses insert data
    // Cek keberhasilan dan keamanan
    // Tambah fitur hapus data


    
    
    function tambah( $data ){
        global $db;
        $namaDepan = htmlspecialchars($_POST["namaDepan"]);
        $namaBelakang = htmlspecialchars($_POST["namaBelakang"]);
        $tanggalLahir = htmlspecialchars($_POST["tanggalLahir"]);
        $pekerjaan = htmlspecialchars($_POST["pekerjaan"]);
        $img = htmlspecialchars($_POST["img"]);
        
        $queryInsert = "INSERT INTO datapersonal values ('', '$namaDepan', '$namaBelakang', '$tanggalLahir', '$pekerjaan', '$img')";

        mysqli_query( $db, $queryInsert);

        return mysqli_affected_rows($db);
    }


    function ubah($data){
        global $db;
        $id = $_POST['id'];
        $namaDepan = $_POST['namaDepan'];
        $namaBelakang = $_POST['namaBelakang'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $pekerjaan = $_POST['pekerjaan'];
        $img = $_POST['img'];
        mysqli_query($db, "UPDATE datapersonal SET
                namaDepan = '$namaDepan',
                namaBelakang = '$namaBelakang',
                tanggalLahir = '$tanggalLahir',
                pekerjaan = '$pekerjaan',
                img = '$img'
            WHERE id = '$id'");
        return mysqli_affected_rows($db);
    }
?>