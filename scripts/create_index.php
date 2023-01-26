<?php
    include("../config/database.php");

    if(!empty($_POST)) {
        $title = htmlentities($_POST['title']);
        $content = htmlentities($_POST['content']);
        $date = new DateTime();
        $timestamp = $date->getTimestamp();

        $requete = "INSERT INTO indexes (title, content, timestamp)
        VALUES ('$title','$content', '$timestamp')";
        $cnn->exec($requete) or die(print_r($bdd->errorInfo()));
        $cnn=null;
    }
    header("Location: ../indexes");
?>