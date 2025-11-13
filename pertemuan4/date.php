<?php
    // Function
        // Function adalah kumpulan program untuk menyelesaikan suatu pekerjaan.
        // Ada 2 macam
            // 1. Built-in Function
            // 2. User difined function

    // 1. Built-in function
        // echo date("l");
        // echo date("l", time()+60*60*24*3);
        // echo date("l", strtotime("25 Oct 2000"));

    // 2. User Defined Function
        // Tata cara pembuatan
        // 1. Harus di-Definisikan dahulu
        // 2. Bisa memiliki parameter atau tidak
        // 3. Bisa memiliki lebih dari 1 parameter
        // 4. Bisa memiliki kembalian atau tidak, biasanya memiliki
        
        function salam($waktu, $nama){
            return "Selamat $waktu, $nama!";
        };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Function</title>
</head>
<body>
    <h1>
        <?php echo salam("Pagi", "Fany Ganesta"); ?>
    </h1>
</body>
</html>