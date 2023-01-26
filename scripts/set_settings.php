<?php
    include("../config/database.php");

    if(!empty($_POST)) {
        $name = htmlentities($_POST['name']);
        $theme = htmlentities($_POST['theme']);

        $requete = "SELECT theme, name FROM settings";
        $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
        while($row = $resultat->fetch()){
            if($row['name'] != $name && $row['theme'] != $theme) {
                $requete2 = "UPDATE settings SET theme = '$theme', name = '$name'";
                $cnn->exec($requete2) or die(print_r($bdd->errorInfo()));
                $cnn=null;
            }
            else if($row['theme'] != $theme) {
                $requete3 = "UPDATE settings SET theme = '$theme'";
                $cnn->exec($requete3) or die(print_r($bdd->errorInfo()));
                $cnn=null;
            }
            else if($row['name'] != $name) {
                $requete4 = "UPDATE settings SET name = '$name'";
                $cnn->exec($requete4) or die(print_r($bdd->errorInfo()));
                $cnn=null;
            }
        }
    }
    header("Location: ../settings");
?>