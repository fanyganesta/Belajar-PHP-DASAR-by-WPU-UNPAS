<?php 

require 'function.php';

$dataPersonals = query( "SELECT * FROM datapersonal");

if( isset( $_POST['cari']) ){

    $cari = $_POST['cari'];
    
    $dataPersonals = query( "SELECT * FROM datapersonal WHERE 
    namaDepan LIKE '%$cari%' OR
    namaBelakang LIKE '%$cari%' OR
    tanggalLahir LIKE '%$cari%'
     ");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba Menampilkan Data</title>
    <style>
        .a {
            border-collapse: separate;
            border-spacing: 0px;
        }
        
        .a th, .a td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        .message {
            color: green;
            font-style: italic;
        }

        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    
    <?php if( isset($_GET["message"]) ) : ?>
        <p class="message"> <?= $_GET["message"] ?> </p>
    <?php endif ?>

    <?php if( isset($_GET["error"]) ) : ?>
        <p class="error"> <?= $_GET["error"] ?> </p>
    <?php endif ?>

    <h3> Data Personal </h3>

    <a href="tambah.php">Tambah data di sini!.</a>
    <br><br>
    <table>
        <form action="" method="POST">
            <tr>
                <td>
                    <label for="cari">Cari: </label>
                </td>
                <td>
                    <input type="text" name="cari" size=30 id='cari'>
                    <button tipe="submit" name="submit2">Cari!</button>
                </td>
            </tr>
        </form>
    </table>

    <br>

    <table class='a'>
        <tr>
            <th> No. </th>
            <th> Foto Profile </th>
            <th> Nama Depan </th>
            <th> Nama Belakang </th>
            <th> Tanggal Lahir </th>
            <th> Pekerjaan </th>
            <th> Action </th>
        </tr>

        <?php $i = 1; foreach ( $dataPersonals as $key => $dataPersonal ) : ?>
        <tr>
            <td> <?= $i ?> </td>
            <td> <img src="../pertemuan6/img/<?= $dataPersonal["img"]; ?>" alt="Foto Pengguna ke-<?= $i ?>" width="50"></td>
            <td> <?= $dataPersonal["namaDepan"]; ?> </td>
            <td> <?= $dataPersonal["namaBelakang"]; ?> </td>
            <td> <?= $dataPersonal["tanggalLahir"]; ?> </td>
            <td> <?= $dataPersonal["pekerjaan"]; ?> </td>
            <td> <a href="edit.php?id=<?= $dataPersonal["id"]; ?>"> edit </a> | <a href="hapus.php?id=<?= $dataPersonal["id"] ?>" onclick=" return confirm('yakin?')"> hapus </a></td>
        </tr>
        <?php $i++; endforeach ?>
    </table>
</body>
</html>