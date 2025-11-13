<?php 

    // Membuat HTML untuk register
    // Menangkap input dari htmml
    // Pengecekan password harus sama dengan konfirmasi password
    // Hash password
    // Pemrosesan string username
    // Pengecekan tidak ada username yang sama dalam database
    // Buat database, simpan jika persyaratan terpenuhi

    require 'function.php';

    if( isset( $_POST['register'] ) ){
        if ( register( $_POST ) > 0 ) {
            header("Location: index.php?message=User berhasil ditambahkan!");
            exit;
        } else {
            header("Location: register.php?error=Data gagal ditambahkan!");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title> Halaman Register </title>
</head>
<body>
    <?php if( isset($_GET['error'] ) ) : ?>
        <p style="color: red; font-style: italic;"> 
            <?= $_GET['error']; ?>
        </p>
    <?php endif ?>

    <h3> Masukkan data anda! </h3>
    <form method="POST" action="" autocomplete="off">
        <table>
            <tr>
                <td> <label for="username"> Username: </label>
                <td> <input type="text" name="username" required>
            </tr>
            <tr>
                <td> <label for="password"> Password: </label>
                <td> <input type="password" name="password" required>
            </tr>
            <tr>
                <td> <label for="konfirmasiPassword"> Konfirmasi Password: </label> </td>
                <td> <input type="password" name="konfirmasiPassword" required>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center"> 
                    <button type="submit" name="register"> Register </button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>