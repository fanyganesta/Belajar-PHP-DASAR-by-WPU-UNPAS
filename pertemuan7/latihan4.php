<?php
    if( !isset($_POST["submit"]) ){
        header("Location: latihan3.php?error=Anda Belum Login!");
    } else if ( $_POST["username"] != "fany" || $_POST["password"] != 123 ){
        header("Location: latihan3.php?salah=Username atau Password Salah!");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang, <?= $_POST["username"] ?> </h1>
    <a href="latihan3.php"> kembali ke halaman login </a>
</body>
</html>