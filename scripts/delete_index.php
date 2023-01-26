<?php
    include("../config/database.php");

    $id = htmlentities($_GET['id']);

    $requete = "DELETE FROM indexes  WHERE id = '$id'";
    $cnn->query($requete) or die(print_r($bdd->errorInfo()));
    header("Location: ../indexes");
?>