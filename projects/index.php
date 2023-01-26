<?php
  include("../config/database.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
      $requete = "SELECT name FROM settings";
      $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
      while($row = $resultat->fetch()){
        echo "<title>{$row['name']}</title>";
      }
    ?>
    <link rel="stylesheet" href="../assets/css/style.php"/>
    <link rel="stylesheet" href="https://rawcdn.githack.com/hung1001/font-awesome-pro-v6/44659d9/css/all.min.css"/>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
</head>
<body>
<div class="container">
  <div class="sidebar">
    <?php
      $requete = "SELECT name FROM settings";
      $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
      while($row = $resultat->fetch()){
        echo "<h2 class='sidebar-title'>{$row['name']}</h2>";
      }
    ?>
    <div class="menu">
      <i class="fa-solid fa-house logo"></i>
      <a href="../" class="menu-item">Accueil</a>
    </div>
    <div class="menu-active">
      <i class="fa-solid fa-folder-open logo"></i>
      <a class="menu-item noselect">Projets</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-file-pen logo"></i>
      <a href="../notes" class="menu-item">Notes</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-book logo"></i>
      <a href="../indexes" class="menu-item">Index</a>
    </div>
    <div class="menu menu-last">
      <i class="fa-solid fa-cog logo"></i>
      <a href="../settings" class="menu-item">Paramètres</a>
    </div>
  </div>
  <div class="main-content">
    <h1 class="content-title">Projets</h1>
      <div style="display: grid; grid-template-columns: repeat(8, 1fr); grid-gap: 16px;">
    <?php
      $requete = "SELECT id, title FROM projects";
      $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
      while($row = $resultat->fetch()){
        $temp = html_entity_decode($row['title']);
        $name = substr($temp, 0, 10);
        echo "<a href='project?id={$row['id']}' class='cards'>$name</a>";
      }
    ?>
    <a href="new" class="cards" style="width: 8%;"><i class="fa-solid fa-plus logo2"></i></a>
    </div>
  </div>
</div>
</body>
</html>