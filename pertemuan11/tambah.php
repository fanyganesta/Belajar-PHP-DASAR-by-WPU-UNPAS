<?php
    require 'function.php';

    if ( isset($_POST['submit']) ){
        if ( tambah($_POST) > 0 ) {
            header("Location: index.php?message=Data berhasil ditambah!");
        } else {
            header("Location: index.php?error=Data gagal ditambahkan!");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h3> Tambah Data </h3>
    <form action="" method="POST">
        <table>
            <tr>
                <td>
                    <label for="namaDepan"> Nama Depan: </label>
                </td>
                <td>
                    <input type="text" name="namaDepan" id="namaDepan" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="namaBelakang"> Nama Belakang: </label>
                </td>
                <td>
                    <input type="text" name="namaBelakang" id="namaBelakang" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tanggalLahir"> Tanggal Lahir: </label>
                </td>
                <td>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" required value="2000-10-11">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pekerjaan"> Pekerjaan: </label>
                </td>
                <td>
                    <input type="text" name="pekerjaan" id="pekerjaan" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="img"> Foto Pengguna: </label>
                </td>
                <td>
                    <input type="text" name="img" id="img" required>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <button type="submit" name="submit"> Tambah! </button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>