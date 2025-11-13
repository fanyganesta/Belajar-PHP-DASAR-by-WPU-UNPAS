<?php
    // ARRAY
        // Merupakan variabel yang lebih sakti
        // Sebenarnya adalah sesuatu yang bisa mengumpulkan beberapa data yang memiliki index.
        // Cara menampilkan array untuk developer menggunakan var_dump atau print_r
        // Cara menampilkan array untuk user adalah menggunakan foreach atau for
        // Bisa dituliskan dengan cara lama, atau cara baru
        // Cara Lama
            // $oldArray = array("Fany", "Ganesta", "Frisca", "Welyani");
            // print_r($oldArray);
        // Cara Baru
            // $newArray = ["Fany", "Ganesta", "Frisca", "Welyani"];
            // print_r($newArray);

        // Array Multi Dimensi
            // Array yang menyimpan array didalamnya
            // $multiArray = [
            //     "Warna", 
            //     ["Putih", "Kuning", "Hijau", "Merah"]
            // ];
            // print_r($multiArray);
            // Bagaimana cara menampilkan "Hijau" saja?
            // echo $multiArray [1] [2];

        // Untuk User
            // $mahasiswa = [
            //     "Fany",
            //     "Ganesta",
            //     "Frisca",
            //     "Weliyani",
            //     "Bunga"
            // ];
            // Menggunakan For
                // for ( $i = 0; $i < count($mahasiswa); $i++ ){
                //     echo "Nama Mahasiswa: " . $mahasiswa[$i] . "<br>";
                // }
            // Menggunakan Foreach
                // foreach ( $mahasiswa as $key => $value ) {
                //     echo "Nama Mahasiswa ke-" . $key+1 . ": "  . $value . "<br>"; 
                // }
        
        // Memapilkan Array Multi Dimensi di HTML
            $mahasiswa = [
                ["Fany Ganesta", "123123123", "Teknik", "fany@email.com"],
                ["Frisca Weliyani Bunga", "34234234243", "Ilmu Sosial", "frisca@email.com"]
            ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Array Multi Dimensi</title>
</head>
<body>
    <?php foreach( $mahasiswa as $key => $mhs ) :?>
        <li> Nama Mahasiswa: <?php echo $key . " " . $mhs[0] ?> </li>
        <li> NIM: <?php echo $mhs[1] ?> </li>
        <li> Jurusan: <?php echo $mhs[2] ?> </li>
        <li> Email: <?php echo $mhs[3] ?> </li>
        <br>
    <?php endforeach ?>
</body>
</html>