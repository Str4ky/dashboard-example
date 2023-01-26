<?php
    include("../config/database.php");

    $id = htmlentities($_GET['id']);

    $requete = "SELECT id, project_id, is_done FROM tasks WHERE id = '$id'";
    $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
    while($row = $resultat->fetch()){
        if($row['is_done'] == 0) {
            $requete2 = "UPDATE tasks SET is_done = 1 WHERE id = '{$_GET['id']}'";
            $cnn->query($requete2) or die(print_r($bdd->errorInfo()));
        }
        else if($row['is_done'] == 1) {
            $requete3 = "UPDATE tasks SET is_done = 0 WHERE id = '{$_GET['id']}'";
            $cnn->query($requete3) or die(print_r($bdd->errorInfo()));
        }
        header("Location: ../projects/project?id={$row['project_id']}");
    }
?>