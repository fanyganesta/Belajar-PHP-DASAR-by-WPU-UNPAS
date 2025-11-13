<?php 
    // Variabel Scope
        // Setiap variabel memiliki ruang lingkup masing masing
        // Variabel global tidak bisa digunakan di dalam function tertentu kecuali dideklarasikan ulang di dalam function tersebut

        // $x = 10;
        // echo $x . "<br>";
        // function tampilX() {
        //     global $x;  
        //     echo $x;
        // }
        // tampilX();

    // Variabel Super Global
        // Variabel yang bisa diakses di halaman manapun karena sudah disediakan oleh PHP
            // $_GET, $_POST, $_COOKIE, $_SESSION, dan masih banyak lagi
        
        // Penggunaan GET (Pengiriman data menggunakan URL)
        $dataPersonal = [
            [
                "img" => "img1.webp",
                "namaDepan" => "Fany",
                "namaBelakang" => "Ganesta",
                "tanggalLahir" => "25 Oktober 2000",
                "pekerjaan" => "Advertiser",
            ],
            [
                "img" => "img2.webp",
                "namaDepan" => "Frisca Weliyani",
                "namaBelakang" => "Bunga",
                "tanggalLahir" => "19 Maret 2000",
                "pekerjaan" => "IRT",
            ]
        ];
        
    // Request
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penggunaan Request</title>
</head>
<body>
    <!-- <h2> Contoh Penggunaan Array Asosiatif</h2>
    <ul>
        <?php foreach( $dataPersonal as $key => $data) : ?>
            <li> <img src="../pertemuan6/img/<?= $data["img"] ?>" alt="Foto Profile Pengguna ke-<?= $key ?>" width="100"> </li>
            <li> Nama Depan: <?= $data["namaDepan"] ?> </li>
            <li> Nama Belakang: <?= $data["namaBelakang"] ?> </li>
            <li> Tanggal Lahir: <?= $data["tanggalLahir"] ?> </li>
            <li> Pekerjaan: <?= $data["pekerjaan"] ?> </li>
            <br>
        <?php endforeach ?>
    </ul> -->

    <?php if ( isset($_GET["error"])) { ?>

        <p style="color: red"> <?= $_GET["error"] ?> </p>

    <?php } else { ?>

    <h2>Lihat Data Personal</h2>
    
    <ol>
        <?php foreach( $dataPersonal as $key => $value ) : ?>
            <li> Nama: <a href="latihan2.php?img=<?= $value["img"]; ?>&namaDepan=<?= $value["namaDepan"]; ?>&namaBelakang=<?= $value["namaBelakang"];?>&tanggalLahir=<?= $value["tanggalLahir"];?>&pekerjaan=<?= $value["pekerjaan"];?> "> <?= $value["namaDepan"] ?> </a></li>
        <?php endforeach ?>
    </ol>
    <?php } ?>

</body>
</html>