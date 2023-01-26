<?php
    include("../config/database.php");

    if(!empty($_POST)) {
        $content = htmlentities($_POST['content']);
        $project = htmlentities($_POST['project']);
        $date = new DateTime();
        $timestamp = $date->getTimestamp();

        $requete = "INSERT INTO notes (content, associated_project, timestamp)
        VALUES ('$content','$project', '$timestamp')";
        $cnn->exec($requete) or die(print_r($bdd->errorInfo()));
        $cnn=null;
    }
    header("Location: ../notes");
?>