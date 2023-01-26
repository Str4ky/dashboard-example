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
      <a href="../../" class="menu-item">Projets</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-file-pen logo"></i>
      <a href="../../../notes" class="menu-item">Notes</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-book logo"></i>
      <a href="../../../indexes" class="menu-item">Index</a>
    </div>
    <div class="menu menu-last">
      <i class="fa-solid fa-cog logo"></i>
      <a href="../../../settings" class="menu-item">Paramètres</a>
    </div>
  </div>
  <div class="main-content">
    <center>
    <?php
    if(!empty($_GET['id'])) {
      echo "<h1>Modifier un projet</h1>
      <br>";
    $id = $_GET['id'];

    $requete = "SELECT title, description FROM projects WHERE id = '$id'";
    $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
    while($row = $resultat->fetch()){
      echo "<form method='post' action='../../../scripts/edit_project.php?id={$_GET['id']}'>
      <h2>Titre</h2>
      <input type='text' placeholder='Entrez un titre...' value='{$row['title']}' id='title' name='title' required><br>
      <h2>Description</h2>
      <input type='text' placeholder='Entrez une description...' value='{$row['description']}' id='description' name='description' required><br><br><br>
      <button type='submit'><i class='fa-solid fa-pen'></i> Modifier un projet</button>
    </form>";
    }
  }
  else {
    echo "<h1>Vous n'avez pas défini de projet</h1>";
  }
    ?>
    </center>
  </div>
</div>
</body>
</html>