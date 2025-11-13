<?php 
    // Array Asosiatif
        // Sama seperti array sebelumnya, hanya saja indexnya kita buat sendiri
        // Sifat numerik pada array default menjadi hilang

    $dataDiri = [
        [
            "fotoProfile" => "img1.webp",
            "namaDepan" => "Fany",
            "namaBelakang" => "Ganesta",
            "tanggalLahir" => "25 Oktober 2000",
            "pekerjaan" => "Advertiser"
        ],
        [
            "fotoProfile" => "img2.webp",
            "namaDepan" => "Frisca Weliyani",
            "namaBelakang" => "Bunga",
            "tanggalLahir" => "19 Maret 2000",
            "pekerjaan" => "IRT"
        ],
        
    ]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Asosiatif</title>
</head>
<body>
    <h2> Contoh Penggunaan Array Asosiatif </h2>
    <ul>
        <?php foreach( $dataDiri as $key => $data) : ?>
            <li> 
                <img src="img/<?= $data["fotoProfile"] ?>" alt="Foto Profile Pengguna ke-<?= $key ?>" width="100">
            </li>
            <li> Nama Depan: <?= $data["namaDepan"] ?> </li>
            <li> Nama Belakang: <?= $data["namaBelakang"] ?> </li>
            <li> Tanggal Lahir: <?= $data["tanggalLahir"] ?> </li>
            <li> Pekerjaan: <?= $data["pekerjaan"] ?> </li>
            <br>
        <?php endforeach ?>
    </ul>
</body>
</html>