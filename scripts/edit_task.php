<?php
    include("../config/database.php");

    if(!empty($_POST)) {
        $label = htmlentities($_POST['label']);
        $id = htmlentities($_GET['id']);

        $requete = "UPDATE tasks SET label = '$label' WHERE id = '$id'";
        $cnn->exec($requete) or die(print_r($bdd->errorInfo()));
        $cnn=null;
    }
    header("Location: ../projects/project?id={$_GET['id_proj']}");
?>