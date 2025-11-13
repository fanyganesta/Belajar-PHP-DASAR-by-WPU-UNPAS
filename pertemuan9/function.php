<?php
    $db = mysqli_connect('localhost', 'root', '', 'php_dasar');
    $dataPersonal = mysqli_query( $db, 'SELECT * FROM dataPersonal');

    $datas = [];

    function query( $query ){
        while ( $fetch = mysqli_fetch_assoc( $query )) {
            global $datas;
            $datas[] = $fetch;
        }
        return $datas;
    }

    $dataPersonals = query( $dataPersonal );

?>