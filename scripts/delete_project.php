<?php
    include("../config/database.php");

    $id = htmlentities($_GET['id']);

    $requete = "DELETE FROM tasks  WHERE project_id = '$id'";
    $cnn->query($requete) or die(print_r($bdd->errorInfo()));

    $requete2 = "UPDATE notes SET associated_project = 0  WHERE associated_project = '$id'";
    $cnn->query($requete2) or die(print_r($bdd->errorInfo()));

    $requete3 = "DELETE FROM projects  WHERE id = '$id'";
    $cnn->query($requete3) or die(print_r($bdd->errorInfo()));

    header("Location: ../projects");
?>