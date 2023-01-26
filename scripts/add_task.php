<?php
    include("../config/database.php");

    if(!empty($_POST)) {
        $project_id = htmlentities($_GET['id']);
        $label = htmlentities($_POST['label']);

        $requete = "INSERT INTO tasks (project_id, label, is_done)
        VALUES ('$project_id','$label', 0)";
        $cnn->exec($requete) or die(print_r($bdd->errorInfo()));
        $cnn=null;
    }
    header("Location: ../projects/project?id={$_GET['id']}");
?>