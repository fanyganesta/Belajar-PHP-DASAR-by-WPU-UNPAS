<?php 

require 'function.php';
    // Mengkoneksikan database dengan program
        // Ada beberapa cara
            // 1. Menggunakan Ekstensi MySQL
            // 2. Menggunakan Ekstensi MySQLi
            // 2. Menggunaakan PDO

        // Menggunakan MySQLi
            // mysqli_connect("nama_host", "username", "password", "nama_database")

            // ager lebih mudah digunakan, function tersebut dimasukkan ke variable
            // $db = mysqli_connect('localhost', 'root', '', 'php_dasar');

    // Mengambil data dari database
        // raw query data
            // query("koneksi_database", "sintaks_sql");

            // print_r(mysqli_query($db, "SELECT * FROM dataPersonal"));

        // mysqli_fetch_row
            // mengembalikan array numerik

            // print_r( mysqli_fetch_row( mysqli_query($db, "SELECT * FROM dataPersonal")));
        
        // mysqli_fetch_assoc
            // mengembalikan array asosiatif

            // print_r(mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM dataPersonal")));
        
        // mysqli_fetch_array
            // mengembalikan data array numerik dan array asosiatif

            // $datas = mysqli_fetch_array( mysqli_query( $db, "SELECT * FROM dataPersonal" ) );
            // print_r( $datas );
            

        // mysqli_fetch_object

            // $datas = mysqli_fetch_object( mysqli_query( $db, "SELECT * FROM dataPersonal" ));
            // print_r( $datas->namaDepan );


    // Menampilkan data dari database
        // mengulangi query untuk semua data yang ada di database
        //  $result = mysqli_query( $db, "SELECT * FROM dataPersonal");
         
        // while( $datas = mysqli_fetch_assoc( $result ) ){
        //     var_dump( $datas);
        //     echo "<br>";
        // }


    // Refactoring Program
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Menampilkan Data</title>
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0px;
        }
        
        th,td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h3> Data Personal </h3>

    
        <?php 

            // $queryDataPersonal = mysqli_query($db, "SELECT * FROM dataPersonal");
            // $dataPersonals = [];
            // while ( $datasPersonal = mysqli_fetch_assoc( $queryDataPersonal ) ) {
            //     global $dataPersonals;
            //     $dataPersonals[] = $datasPersonal;
            // }
            
        ?>

    <table>
        <tr>
            <th> No. </th>
            <th> Foto Profile </th>
            <th> Nama Depan </th>
            <th> Nama Belakang </th>
            <th> Tanggal Lahir </th>
            <th> Pekerjaan </th>
            <th> Action </th>
        </tr>

        <?php foreach ( $dataPersonals as $dataPersonal ) : ?>
        <tr>
            <td> 2 </td>
            <td> <img src="../pertemuan6/img/<?= $dataPersonal["img"]; ?>" alt="Foto Pengguna ke-1" width="50"></td>
            <td> <?= $dataPersonal["namaDepan"]; ?> </td>
            <td> <?= $dataPersonal["namaBelakang"]; ?> </td>
            <td> <?= $dataPersonal["tanggalLahir"]; ?> </td>
            <td> <?= $dataPersonal["pekerjaan"]; ?> </td>
            <td> <a href="#"> edit </a> | <a href="#"> hapus </a></td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>