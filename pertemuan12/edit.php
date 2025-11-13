<?php 
    require 'function.php';

    if( $_GET['id'] == null && $_POST['id'] == null  ) {
        header("Location: index.php?error=Halaman tidak bisa diakses");
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
        <form action="" method="POST">
            <input hidden type="text" name="id" value="<?= $result['id'] ; ?>">
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
                    <input type="text" name="img" id="img" value="<?= $result['img']; ?>">
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