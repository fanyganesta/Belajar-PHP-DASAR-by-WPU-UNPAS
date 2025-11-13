<?php 
    // Penggunaan POST
        // Yaitu pengiriman data ke halaman lain atau halaman itu sendiri menggunakan variabel super global POST atau dengan kata lain data tidak terlihat di url.

    // Penggunaan pada form login
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Method POST</title>
</head>
<body>
    <?php if( isset($_GET["error"])) : ?>
        <p style="color: red">Anda Harus Login Dahulu!</p>
    <?php elseif( isset($_GET["salah"])) : ?>
        <p style="color: red"><?= $_GET["salah"] ?></p>
    <?php endif ?>

    <h2> Contoh Penggunaan Method POST </h2>
    <table>
        <form action="latihan4.php" method="POST">
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password </label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit"> Submit! </button></td>
            </tr>
        </form>
    </table>
</body>
</html>