<?php
    include("../config/database.php");

    $id = htmlentities($_GET['id']);

    $requete = "DELETE FROM tasks  WHERE project_id = '$id'";
    $cnn->query($requete) or die(print_r($bdd->errorInfo()));

    $requete2 = "DELETE FROM projects  WHERE id = '$id'";
    $cnn->query($requete2) or die(print_r($bdd->errorInfo()));

    header("Location: ../projects");
?>