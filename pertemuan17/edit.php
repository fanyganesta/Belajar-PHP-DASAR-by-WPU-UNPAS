<?php 
    // Cek apakah user login
    session_start();
    if( !isset( $_SESSION['user'] )){   
        header("Location: login.php?error=Anda harus login dahulu");
        exit;
    }

    require 'function.php';

    if( $_GET['id'] == null && $_POST['id'] == null  ) {
        header("Location: index.php?error=Pilih user yang mau diedit dahulu");
    } else {
        $id = intval( $_GET['id'] );
        $queryGetbyId = "SELECT * FROM datapersonal WHERE id = $id" ;
        $result = query( $queryGetbyId )[0];
    }

    if( isset($_POST['submit']) ){
        if( ubah($_POST) > 0 ){
            header("Location: index.php?message=Data Berhasil Dirubah!");
        } elseif( ubah($_POST) == 0 ) {
            header("Location: index.php?error=Tidak ada data dirubah!");
        } else {
            header("Location: index.php?error=Data Gagal Dirubah!");
        }
    }
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title> Edit Data </title>
</head>
<body>
    <h3> Edit Data, dari '<?= $result['namaDepan']  ?>' </h3>

    <table>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $result['id'] ; ?>">
            <tr>
                <td colspan="2">
                    <img src="../pertemuan6/img/<?= $result['img']; ?>" alt="Foto Profile <?= $result['img']; ?>" width="100">
            </tr>
            <tr>
                <td>
                    <label for="namaDepan">Nama Depan: </label>
                </td>
                <td>
                    <input id="namaDepan" name="namaDepan" type="text" value="<?= $result['namaDepan']; ?>" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="namaBelakang">Nama Belakang: </label>
                </td>
                <td>
                    <input type="text" name="namaBelakang" id="namaBelakang" value="<?= $result['namaBelakang']; ?>" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tanggalLahir"> Tanggal Lahir: </label>
                </td>
                <td>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" value="<?=date('Y-m-d',strtotime($result['tanggalLahir']));?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pekerjaan">Pekerjaan: </label>
                </td>
                <td>
                    <input type="text" id="pekerjaan" name="pekerjaan" value="<?= $result['pekerjaan']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="img">Image: </label>
                </td>
                <td>
                    <input type="file" name="img" id="img">
                    <input type="hidden" name="oldImg" value="<?= $result['img']; ?>" >
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <button type="submit" name="submit"> Update! </button>
                </td>
            </tr>
        </form>
    </table>
</body>
</html>