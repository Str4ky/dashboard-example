<?php
  include("../../../config/database.php");
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
    <link rel="stylesheet" href="../../../assets/css/style.php"/>
    <link rel="stylesheet" href="https://rawcdn.githack.com/hung1001/font-awesome-pro-v6/44659d9/css/all.min.css"/>
    <link rel="icon" type="image/png" href="../../../assets/img/favicon.png" />
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
      <a href="../../../" class="menu-item">Accueil</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-folder-open logo"></i>
      <a href="../../../projects" class="menu-item">Projets</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-file-pen logo"></i>
      <a href="../../../notes" class="menu-item">Notes</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-book logo"></i>
      <a href="../../" class="menu-item">Indexs</a>
    </div>
    <div class="menu menu-last">
      <i class="fa-solid fa-cog logo"></i>
      <a href="../../../settings" class="menu-item">Paramètres</a>
    </div>
  </div>
  <div class="main-content">
    <h1 class="content-title" style="padding-bottom: 40px;">Modifier un Index</h1>
    <?php
      if(!empty($_GET['id'])) {
        $requete = "SELECT title, content FROM indexes WHERE id = {$_GET['id']}";
        $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
        while($row = $resultat->fetch()){
          echo "
          <form method='post' action='../../../scripts/edit_index.php?id={$_GET['id']}'>
            <h2>Titre de l'index</h2>
            <input type='text' placeholder='Titre de l'index...' value='{$row['title']}' id='title' name='title' required><br><br>
            <h2>Contenu de l'index</h2>
            <textarea rows='20' cols='85' placeholder='Contenu de l'index...' id='content' name='content' required>{$row['content']}</textarea><br><br>
            <button type='submit' style='padding: 12px;'><i class='fa-solid fa-pen'></i> Modifier l'index</button>
          </form>";
        }
      }
      else {
        echo "<h1>Vous n'avez pas défini d'index</h1>";
      }
      ?>
  </div>
</body>
</html>
