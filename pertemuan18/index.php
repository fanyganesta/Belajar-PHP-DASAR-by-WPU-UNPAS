<?php 

session_start();

// cek apakah user sudah login
if(!isset($_SESSION['user'])){
    header("Location: login.php?message=Silahkan login dulu");
    exit;
}

require 'function.php';

// Gunakan paginasi
$indexAwal = 0;
$jumlahDataTampil = 5;

// Hitung julah halaman untuk navigasi
$jumlahData = count(query("SELECT * FROM datapersonal"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataTampil);

// Tentukan halaman aktif untuk navigasi dan index
$halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

// Set indexAwal berdasarkan halaman aktif
$indexByPagination = $halamanAktif * $jumlahDataTampil - $jumlahDataTampil;
if( isset($_GET['halaman']) && $_GET['halaman'] <= 0 ){
    $indexByPagination = 0;
    $halamanAktif = 1;
}

$indexAwal = ($jumlahHalaman > 1) ? $indexByPagination : 0;

$dataPersonals = query( "SELECT * FROM datapersonal LIMIT $indexAwal, $jumlahDataTampil");


if( isset( $_POST['cari']) ){

    $cari = $_POST['cari'];
    
    $dataPersonals = query( "SELECT * FROM datapersonal WHERE 
    namaDepan LIKE '%$cari%' OR
    namaBelakang LIKE '%$cari%' OR
    tanggalLahir LIKE '%$cari%'
     ");

}


    // Pagination
    // 1. Menggunakan Limit dengan parameter index_mulai, jumlah_ditampilkan
    // 2. Tampilkan navigasi pagination
    // 3. Hitung jumlah halaman paginasi dengan bagi total_data dengan jumlah_data_ditampilkan
    // 4. Rubah queri index_awal sesuai data yang baru perhalaman
    // 5. Tambah panah untuk naik atau menurunkan halaman

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

    <p> <h3> Data Personal </h3>
        <a href="logout.php">Logout </a> | <a href="tambah.php">Tambah data di sini!.</a>
    </p>
    
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
        <?php if($jumlahHalaman > 1) : ?>  
            <tr>
                <td colspan="7">
                    <?php if( $halamanAktif != 1 ) : ?>
                        <a href="?halaman=<?= $halamanAktif - 1 ?>" style="text-decoration: none;"> &laquo; </a>
                    <?php endif ?>

                    <?php for( $j = 1; $j <= $jumlahHalaman; $j++ ) : ?> 
                        <?php if( $jumlahHalaman > 1 && $j == $halamanAktif ) : ?>
                            <a href="?halaman=<?= $j ?>" style="font-weight: bold; color: red;"> <?= $j ?> </a>
                        <?php else : ?>
                            <a href="?halaman=<?= $j ?>"> <?= $j ?>
                        <?php endif ?>
                    <?php endfor ?>

                    <?php if( $halamanAktif < $jumlahHalaman ) : ?>
                        <a href="?halaman=<?= $halamanAktif + 1 ?>" style="text-decoration: none;"> &raquo; </a>
                    <?php endif ?>
                </td>
            </tr>
        <?php endif ?>
    </table>
</body>
</html>