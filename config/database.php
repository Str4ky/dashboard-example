<?php
    $host = "localhost";
    $bdd = "dashboard";
    $user = "root";
    $passwd = "";

    try{
        $cnn = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8",$user,$passwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));  
    }
    catch(PDOException $e){
        echo "Erreur : ".$e->getMessage();
    }
?>