<?php
    include("../config/database.php");

    if(!empty($_POST)) {
        $title = htmlentities($_POST['title']);
        $content = htmlentities($_POST['content']);
        $id = htmlentities($_GET['id']);
        $date = new DateTime();
        $timestamp = $date->getTimestamp();

        $requete = "UPDATE indexes SET title = '$title', content = '$content', timestamp = '$timestamp' WHERE id = '$id'";
        $cnn->exec($requete) or die(print_r($bdd->errorInfo()));
        $cnn=null;
    }
    header("Location: ../indexes/index?id={$_GET['id']}");
?>