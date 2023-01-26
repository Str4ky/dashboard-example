<?php
    include("../config/database.php");

    $id = htmlentities($_GET['id']);

    $requete = "SELECT project_id FROM tasks WHERE id = '$id'";
    $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
    while($row = $resultat->fetch()){
        $temp_id = $row['project_id'];
        $requete2 = "DELETE FROM tasks  WHERE id = '$id'";
        $cnn->query($requete2) or die(print_r($bdd->errorInfo()));
        header("Location: ../projects/project?id=$temp_id");
    }
?>