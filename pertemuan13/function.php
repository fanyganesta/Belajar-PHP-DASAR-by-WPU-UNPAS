<?php
    $db = mysqli_connect('localhost', 'root', '', 'php_dasar');
    
    function query( $query ){

        global $db;
        $result = mysqli_query( $db, $query );

        $datas = [];
        while ( $fetch = mysqli_fetch_assoc( $result )) {
            $datas[] = $fetch;
        }
        return $datas;
    }


    // Tambah proses insert data
    // Cek keberhasilan dan keamanan
    // Tambah fitur hapus data


    
    
    function tambah( $data ){
        global $db;

        $fileName = dataFile($_FILES['img']);

        $namaDepan = htmlspecialchars($_POST["namaDepan"]);
        $namaBelakang = htmlspecialchars($_POST["namaBelakang"]);
        $tanggalLahir = htmlspecialchars($_POST["tanggalLahir"]);
        $pekerjaan = htmlspecialchars($_POST["pekerjaan"]);
        $img = $fileName;
        
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

        // Cek apakah file tidak diupload => Menandakan file tidak dirubah
        if( $_FILES['img']['error'] == 4 ){
            $img = $data['oldImg'];
        } else {
            
            // Panggil Fungsi yang menangani file gambar
            $img = dataFile($_FILES['img']);

        }


        mysqli_query($db, "UPDATE datapersonal SET
                namaDepan = '$namaDepan',
                namaBelakang = '$namaBelakang',
                tanggalLahir = '$tanggalLahir',
                pekerjaan = '$pekerjaan',
                img = '$img'
            WHERE id = '$id'");
        return mysqli_affected_rows($db);
    }
    
    // PERTEMUAN 13
    // cek apakah gambar kosong
    // cek apakah ekstensi gambar sesuai
    // cek ukuran gambar
    // simpan nama gambar ke database
    // pindah gambar ke lokasi yang diinginkan
    // perbaiki proses ubah dengan enctype form

    function dataFile($data){

        // Apakah gambar adalah file yang diperbolehkan? 
        
        $filesMustExtentions = ['img', 'jpe', 'jpeg', 'webp', 'png'];

        // Ambil file extention
        $fileRawName = $data['name'];
        $fileArrayName = explode( '.', $fileRawName );
        $fileExtention = strtolower(end($fileArrayName));

        // Cek apakah file diperbolehkan
        if( in_array( $fileExtention, $filesMustExtentions ) ){

            // Cek apakah ukuran besar?
            if( $data['size'] >= 1000000 ){
                header("Location: index.php?error=File terlalu besar");
                exit;
            }

            // Pindahkan gambar yang sudah terupload
            $tmp_file = $data['tmp_name'];
            $renamedFileName = uniqid($fileRawNane);
            $renamedFileName .= '.';
            $renamedFileName .= $fileExtention;
            move_uploaded_file($tmp_file, '../pertemuan6/img/' . $renamedFileName);
            return $renamedFileName;

        } else {
            header("Location: index.php?error=File yang anda upload bukan file yang diperbolehkan");
            exit;
        }

        exit;
    

    }
?>