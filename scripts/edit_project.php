<?php
    include("../config/database.php");

    if(!empty($_POST)) {
        $title = htmlentities($_POST['title']);
        $description = htmlentities($_POST['description']);
        $id = htmlentities($_GET['id']);
        $date = new DateTime();
        $timestamp = $date->getTimestamp();

        $requete = "UPDATE projects SET title = '$title', description = '$description', timestamp = '$timestamp' WHERE id = '$id'";
        $cnn->exec($requete) or die(print_r($bdd->errorInfo()));
        $cnn=null;
    }
    header("Location: ../projects/project?id={$_GET['id']}");
?>