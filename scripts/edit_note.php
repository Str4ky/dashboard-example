<?php
    include("../config/database.php");

    if(!empty($_POST)) {
        $content = $_POST['content'];
        $project = htmlentities($_POST['project']);
        $date = new DateTime();
        $timestamp = $date->getTimestamp();

        $requete = "UPDATE notes SET content = '$content', associated_project = '$project', timestamp = '$timestamp' WHERE id = {$_GET['id']}";
        $cnn->exec($requete) or die(print_r($bdd->errorInfo()));
        $cnn=null;
    }
    header("Location: ../notes/note?id={$_GET['id']}");
?>