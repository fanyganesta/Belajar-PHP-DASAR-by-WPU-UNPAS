<?php
    // Penggunaan SESSION sebagai variabel super global yang disimpan di server
    // Aktifkan penggunaan SESSION saat login
    // Tambah sistem logout di index.php
    // Berikan pengkondisian SESSION di halaman yang membutuhkan
        // 1. Login -> User telah login tidak bisa mengakses ini lagi kecuali logout
        // 2. index.php
        // 3. tambah.php
        // 4. hapus.php
        // 5. edit.php
        // 6. logout.php -> Hanya user yang telah login bisa mengakses
    
    session_start();

    // Cek apakah user sudah login
    if( !isset( $_SESSION['user'] )){
        header("Location: login.php");
        exit;
    }

    session_destroy();
    header("Location: login.php?message=Berhasil logout, silahkan login kembali");
    
?>