<?php
    include("../config/database.php");

    if(!empty($_POST)) {
        $title = htmlentities($_POST['title']);
        $description = htmlentities($_POST['description']);
        $date = new DateTime();
        $timestamp = $date->getTimestamp();

        $requete = "INSERT INTO projects (title, description, timestamp)
        VALUES ('$title','$description', '$timestamp')";
        $cnn->exec($requete) or die(print_r($bdd->errorInfo()));
        $cnn=null;
    }
    header("Location: ../projects");
?>