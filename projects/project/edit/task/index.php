<?php
  include("../../../../config/database.php");
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
    <link rel="stylesheet" href="../../../../assets/css/style.php"/>
    <link rel="stylesheet" href="https://rawcdn.githack.com/hung1001/font-awesome-pro-v6/44659d9/css/all.min.css"/>
    <link rel="icon" type="image/png" href="../../../../assets/img/favicon.png" />
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
      <a href="../../../../" class="menu-item">Accueil</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-folder-open logo"></i>
      <a href="../../../" class="menu-item">Projets</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-file-pen logo"></i>
      <a href="../../../../notes" class="menu-item">Notes</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-book logo"></i>
      <a href="../../../../indexes" class="menu-item">Indexs</a>
    </div>
    <div class="menu menu-last">
      <i class="fa-solid fa-cog logo"></i>
      <a href="../../../../settings" class="menu-item">Paramètres</a>
    </div>
  </div>
  <div class="main-content">
    <?php
    if(!empty($_GET['id'])) {
    echo "<h1>Modifier une tâche</h1>
    <br>";
    $id = $_GET['id'];

    $requete = "SELECT label, project_id FROM tasks WHERE id = '$id'";
    $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
    while($row = $resultat->fetch()){
      echo "<form method='post' action='../../../../scripts/edit_task.php?id={$_GET['id']}&amp;id_proj={$row['project_id']}'>
      <h2>Contenu</h2>
      <input type='text' placeholder='Entrez un contenu...' value='{$row['label']}' id='label' name='label' style='width: 15%;' required><br>
      <br><br>
      <button type='submit'><i class='fa-solid fa-pen'></i> Modifier une tâche</button>
    </form>";
    }
  }
  else {
    echo "<h1>Vous n'avez pas défini de tâche</h1>";
  }
    ?>
  </div>
</div>
</body>
</html>