<?php
    // Perulangan
        // For
        // While
        // do while
        // Foreach

    // Pengkondisian
        // If
        // If Else
        // If Else If Else
        // Ternary
        // Switch

?>

<?php
    // for ( $i = 0; $i < 5; $i++ ){
    //     echo "Fany Ganesta <br>";
    // }
?>

<?php
    // $i = 0;

    // while ( $i < 5 ){
    //     echo "Fany Ganesta <br>";
    //     $i++;
    // }
?>

<?php
    // $i = 0;
    // do{
    //     echo "Fany Ganesta $i <br>";  
    //     $i++;
    // } while ($i < 5);
?>

<?php
    // $i = 5;

    // if ( $i == 10 ){
    //     echo "benar";
    // } else if ( $i == 1){
    //     echo "booom";
    // } 
    // else {
    //     echo "salah";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perulangan</title>
    <style>
        .color {
            background-color: lightgrey;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0" >
        <?php for ($i = 1; $i <= 5; $i++ ) : ?>
            <tr>
                <?php for ( $j = 1; $j <= 5; $j++ ) : ?>
                        <?php if ( $i == $j ) { ?>
                            <td class="color">
                            <?php echo "$i, $j"; } else {?>
                            <td>
                                <?php echo "$i, $j"; ?>
                        <?php } ?> 
                        </td>
                    </td>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>
</body>
</html>