<?php
    
    if( !isset($_GET["namaDepan"]) ||
            $_GET["namaBelakang"] ||
            $_GET["tanggalLahir"] ||
            $_GET["pekerjaan"]
    ){
        header("Location: latihan1.php?error=Halaman Tadi Menolak Anda!");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan Data Menggunakan GET</title>
</head>
<body>
    <h2>Data Diri Pengguna "<?= $_GET["namaDepan"]; ?>"</h2>

    <ul>
        <li><img src="../pertemuan6/img/<?= $_GET["img"]; ?>" alt="Foto Profile <?= $_GET["namaDepan"]; ?>" width="100"> </li>
        <li> Nama Depan: <?= $_GET["namaDepan"]; ?> </li>
        <li> Nama Belakang: <?= $_GET["namaBelakang"]; ?> </li>
        <li> Tanggal Lahir: <?= $_GET["tanggalLahir"]; ?> </li>
        <li> Pekerjaan: <?= $_GET["pekerjaan"]; ?> </li>
    </ul>
</body>
</html>