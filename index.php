<?php
  include("config/database.php");
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
    <link rel="stylesheet" type="text/css" href="assets/css/style.php"/>
    <link rel="stylesheet" href="https://rawcdn.githack.com/hung1001/font-awesome-pro-v6/44659d9/css/all.min.css"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
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
    <div class="menu-active">
      <i class="fa-solid fa-house logo"></i>
      <a class="menu-item noselect">Accueil</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-folder-open logo"></i>
      <a href="projects" class="menu-item">Projets</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-file-pen logo"></i>
      <a href="notes" class="menu-item">Notes</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-book logo"></i>
      <a href="indexes" class="menu-item">Indexs</a>
    </div>
    <div class="menu menu-last">
      <i class="fa-solid fa-cog logo"></i>
      <a href="settings" class="menu-item">Paramètres</a>
    </div>
  </div>
  <div class="main-content">
    <h1>Projets récents</h1><br>
    <?php
      $requete = "SELECT id, title FROM projects ORDER BY timestamp DESC LIMIT 8";
      $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
      while($row = $resultat->fetch()){
        $temp = html_entity_decode($row['title']);
        $name = substr($temp, 0, 10);
        echo "<a href='projects/project?id={$row['id']}' class='cards' style='margin-right: 15px;'>$name</a>";
      }
    ?>
    <br><br><br><br>
    <h1>Notes récentes</h1><br>
    <?php
      $requete = "SELECT id, content FROM notes ORDER BY timestamp DESC LIMIT 8";
      $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
      while($row = $resultat->fetch()){
        $temp = html_entity_decode($row['content']);
        $name = substr($temp, 0, 10);
        echo "<a href='notes/note?id={$row['id']}' class='cards' style='margin-right: 15px;'>$name</a>";
      }
    ?>
    <br><br><br><br>
    <h1>Indexs récents</h1><br>
    <?php
      $requete = "SELECT id, title FROM indexes ORDER BY timestamp DESC LIMIT 8";
      $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
      while($row = $resultat->fetch()){
        $temp = html_entity_decode($row['title']);
        $name = substr($temp, 0, 10);
        echo "<a href='indexes/index?id={$row['id']}' class='cards' style='margin-right: 15px;'>$name</a>";
      }
    ?>
    <br><br><br><br>
    <h1 style='padding-bottom: 20px;'>Statistiques</h1>
    <?php
      $requete = "SELECT count(id) FROM projects";
      $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
      while($row = $resultat->fetch()){
        echo "<h2 style='padding-bottom: 20px;'>Nombre de projets : {$row['count(id)']}</h2>";
      }
      $requete2 = "SELECT count(id) FROM notes";
      $resultat2 = $cnn->query($requete2) or die(print_r($bdd->errorInfo()));
      while($row2 = $resultat2->fetch()){
        echo "<h2 style='padding-bottom: 20px;'>Nombre de notes : {$row2['count(id)']}</h2>";
      }
      $requete3 = "SELECT count(id) FROM indexes";
      $resultat3 = $cnn->query($requete3) or die(print_r($bdd->errorInfo()));
      while($row3 = $resultat3->fetch()){
        echo "<h2>Nombre d'indexs : {$row3['count(id)']}</h2>";
      }
      ?>
  </div>
</div>
</body>
</html>