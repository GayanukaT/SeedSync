<?php
define('SERVERNAME','mariadb');
define('USERNAME','mariadb');
define('PASSWORD','mariadb');
define('DBNAME','Seeds');

try {
    $connect = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);
    if (!$connect){
        die("Connection Failed!");
    }
    else{
        echo("Connected Successfully!");
    }
}
catch (Exception $e){
    die($e->getMessage());
}
?>