<?php
    // database params 
    $server_name = 'localhost';
    $db_user = 'root';
    $db_password = 'NeverGiveUp92';
    $db_name = 'viens-dindin';
    $datepost = date('Y-m-d');


    // connect to database

    $db = mysqli_connect($server_name,$db_user,$db_password,$db_name);

    // check if database connect successufuly

    if(!$db){
        die('Database connexion failed :'.mysqli_connect_error($db));
    }
?>