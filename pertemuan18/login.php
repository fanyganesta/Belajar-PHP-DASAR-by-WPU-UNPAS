<?php 
    // Buat halaman loginnya
    // Tangkap data yang dikirim
    // Cek apakah username ada di database
    // Ambil password dari database
    // Cek apakah password sama antara database dan yang dimasukkan
    // Login
    session_start();
    require 'function.php';
    
    //Cek apakah sudah tersedia COOKIE untuk login
    if( isset( $_COOKIE['id'] ) && isset( $_COOKIE['hashedUsername'] ) ) {
        $cookieId = $_COOKIE['id'];
        $cookieUsername = $_COOKIE['hashedUsername'];

        // Cek apakah hashed username sama dengan username dari database
        $result = mysqli_query($db, "SELECT username FROM users WHERE id = '$cookieId'");
        $username = mysqli_fetch_assoc( $result )['username'];
        if( $cookieUsername == hash( 'sha512', $username) ){
            $_SESSION['user'] = true;
        }
    }

    if( isset($_SESSION['user']) ){
        header("Location: index.php");
        exit;
    }

    // Cek apakah form dikirim
    if( isset( $_POST['login'] ) ){
        if( login($_POST) > 0 ){
            $name = $_POST['username'];
            header("Location: index.php?message=Berhasil Login! Selamat datang $name");
        } else {
            header("Location: login.php?error=Data yang anda masukkan salah! Coba lagi");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Halaman Login </title>
</head>
<body>
    <?php if( isset($_GET['error'] ) ) : ?>
        <p style="color: red; font-style: italic"><?= $_GET['error']; ?> </p>
    <?php endif ?>
    <?php if( isset($_GET['message']) ) : ?>
        <p style="color: green; font-style: italic"> <?= $_GET['message']; ?> </p>
    <?php endif ?>
    <h3> Halo, Selamat Datang! </h3>
    <form action="" method="POST">
        <table>
            <tr>
                <td> <label for="username"> Username: </label> </td>
                <td> <input type="text" id="username" name="username" required>
            </tr>
            <tr> 
                <td> <label for="password"> Password: </label> </td>
                <td> <input type="password" id="password" name="password" required> </td> 
            </tr>
            <tr> 
                <td colspan="2" style="text-align: center;"> 
                    <input type="checkbox" name="rememberme" id="rememberme"> 
                    <label for="rememberme"> Remember Me </label> 
                </td> 
            </tr>
            <tr> 
                <td colspan="2" style="text-align: center"> 
                    <button type="submit" name="login"> Login </button> 
                </td>
            </tr>
        </table>
    </form>
</body>
</html>