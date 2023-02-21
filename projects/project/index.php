<?php
  include("../../config/database.php");

  $date = new DateTime();
  $timestamp = $date->getTimestamp();

  if(!empty($_GET['id'])) {
    $requete = "UPDATE projects SET timestamp = '$timestamp' WHERE id = '{$_GET['id']}'";
    $cnn->query($requete) or die(print_r($bdd->errorInfo()));
  }
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
    <link rel="stylesheet" href="../../assets/css/style.php"/>
    <link rel="stylesheet" href="https://rawcdn.githack.com/hung1001/font-awesome-pro-v6/44659d9/css/all.min.css"/>
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
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
      <a href="../../" class="menu-item">Accueil</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-folder-open logo"></i>
      <a href="../" class="menu-item">Projets</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-file-pen logo"></i>
      <a href="../../notes" class="menu-item">Notes</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-book logo"></i>
      <a href="../../indexes" class="menu-item">Indexs</a>
    </div>
    <div class="menu menu-last">
      <i class="fa-solid fa-cog logo"></i>
      <a href="../../settings" class="menu-item">Paramètres</a>
    </div>
  </div>
  <div class="main-content" style="width: 20%;">
    <?php
      if(!empty($_GET['id'])) {
      $requete2 = "SELECT title, description FROM projects WHERE id = '{$_GET['id']}'";
      $resultat2 = $cnn->query($requete2) or die(print_r($bdd->errorInfo()));
      while($row2 = $resultat2->fetch()){
        echo "<h1 class='content-title'>{$row2['title']}</h1>
        <p>{$row2['description']}</p><br>";
      }

      echo "<a href='edit?id={$_GET['id']}' class='button'><i class='fa-solid fa-pen'></i> Modifier</a><a href='pdf?id={$_GET['id']}' target='_blank' class='button' style='margin-left: 10px;'><i class='fa-solid fa-file-pdf'></i> Exporter</a><a href='../../scripts/delete_project.php?id={$_GET['id']}' class='button' style='margin-left: 10px;'><i class='fa-solid fa-trash'></i> Supprimer</a></div><div class='main-content' style='width: 20%;'><h2><u>Tâches à réaliser</u> :</h2>";

      $requete3 = "SELECT id, label, is_done FROM tasks WHERE project_id = '{$_GET['id']}' ORDER BY id ASC";
      $resultat3 = $cnn->query($requete3) or die(print_r($bdd->errorInfo()));
      while($row3 = $resultat3->fetch()){
        if($row3['is_done'] == 0) {
          echo "<h3>{$row3['label']} <a href='edit/task?id={$row3['id']}'><br><i class='fa-solid fa-pen button' style='margin-right: 8px; margin-top: 10px;'></i></a> <a href='../../scripts/delete_task.php?id={$row3['id']}'><i class='fa-solid fa-trash button' style='margin-bottom: 16px; margin-right: 8px;'></i></a> <a href='../../scripts/move_task.php?id={$row3['id']}'><i class='fa-solid fa-arrow-right button'></i></a></h3>";
        }
      }

      echo "
      <form method='post' action='../../scripts/add_task.php?id={$_GET['id']}'>
      <input type='text' placeholder='Entrez une tâche...' id='label' name='label' style='width: 50%;' required></input><br><br>
      <button type='submit' style='padding: 12px; margin-left: 12px;'>Ajouter une tâche</button>
      </form>
      </div>
      <div class='main-content' style='width: 20%;'>
      <h2><u>Tâches réalisées</u> :</h2>";

      $requete4 = "SELECT id, label, is_done FROM tasks WHERE project_id = '{$_GET['id']}' ORDER BY id ASC";
      $resultat4 = $cnn->query($requete4) or die(print_r($bdd->errorInfo()));
      while($row4 = $resultat4->fetch()){
        if($row4['is_done'] == 1) {
          echo "<h3>{$row4['label']} <a href='../../scripts/move_task.php?id={$row4['id']}'><br><br><i class='fa-solid fa-arrow-left button' style='margin-right: 14px;'></i></a><a href='../../scripts/move_task.php?id={$row4['id']}'><i class='fa-solid fa-pen button' style='margin-bottom: 16px; margin-right: 8px;'></i></a> <a href='../../scripts/delete_task.php?id={$row4['id']}'><i class='fa-solid fa-trash button'></i></a></h3>";
        }
      }
      echo "</div>
      <div class='main-content' style='width: 20%;'>
      <h2><u>Notes associées</u> :</h2><br>
      ";
      $requete5 = "SELECT id, content FROM notes WHERE associated_project = '{$_GET['id']}' ORDER BY id ASC";
      $resultat5 = $cnn->query($requete5) or die(print_r($bdd->errorInfo()));
      while($row5 = $resultat5->fetch()){
        $name = substr($row5['content'], 0, 8);
        echo "<a href='../../notes/note?id={$row5['id']}' class='cards_note'>$name</a><br><br>";
      }
      echo "
      </div>";
    }
    else {
      echo "<div class='main-content'>
      <h1>Vous n'avez pas défini de projet</h1>
      </div>";
    }
    ?>
</div>
</body>
</html>