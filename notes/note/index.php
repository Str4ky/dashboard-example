<?php
  include("../../config/database.php");

  $date = new DateTime();
  $timestamp = $date->getTimestamp();

  if(!empty($_GET['id'])) {
    $requete = "UPDATE notes SET timestamp = '$timestamp' WHERE id = '{$_GET['id']}'";
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
      <a href="../../projects" class="menu-item">Projets</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-file-pen logo"></i>
      <a href="../" class="menu-item">Notes</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-book logo"></i>
      <a href="../../indexes" class="menu-item">Index</a>
    </div>
    <div class="menu menu-last">
      <i class="fa-solid fa-cog logo"></i>
      <a href="../../settings" class="menu-item">Paramètres</a>
    </div>
  </div>
  <div class="main-content">
    <?php
      if(empty($_GET['id'])) {
        echo "<h1 class='content-title' style='padding-bottom: 40px;'>Nouvelle note</h1><form method='post' action='../../scripts/create_note.php'>
        <h2>Contenu de la note</h2>
        <textarea rows='20' cols='85' placeholder='Contenu de la note...' id='content' name='content' required></textarea>
    <br><br>
    <h2>Projet associé</h2>
    <select style='width: 15%;' id='project' name='project'>
    <option value='0'>Aucun</option>";
      $requete = "SELECT id, title FROM projects";
      $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
      while($row = $resultat->fetch()){
        echo "<option value='{$row['id']}'>{$row['title']}</option>";
      }
        echo "</select><br><br><br><button type='submit' style='padding: 12px;'><i class='fa-solid fa-pen'></i> Sauvegarder la note</button>
        </form>";
  }
    else {
      $requete = "SELECT content FROM notes WHERE id = {$_GET['id']}";
      $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
      while($row = $resultat->fetch()){
        echo "<h1 class='content-title' style='padding-bottom: 40px;'>Note</h1><form method='post' action='../../scripts/edit_note.php?id={$_GET['id']}'>
        <h2>Contenu de la note</h2>
        <textarea rows='20' cols='85' placeholder='Contenu de la note...' id='content' name='content' required>{$row['content']}</textarea>";
      }
    echo "
    <br><br>
    <h2>Projet associé</h2>
    <select style='width: 15%;' id='project' name='project'>
    <option value='0'>Aucun</option>";
      $requete2 = "SELECT id, title FROM projects";
      $resultat2 = $cnn->query($requete2) or die(print_r($bdd->errorInfo()));
      while($row2 = $resultat2->fetch()){
        $requete3 = "SELECT associated_project FROM notes WHERE id = '{$_GET['id']}'";
        $resultat3 = $cnn->query($requete3) or die(print_r($bdd->errorInfo()));
        while($row3 = $resultat3->fetch()){
          if($row2['id'] == $row3['associated_project']) {
            echo "<option value='{$row2['id']}' selected>{$row2['title']}</option>";
          }
          else {
            echo "<option value='{$row2['id']}'>{$row2['title']}</option>";
          }
        }
      }
      echo "</select><br><br><br>
        <button type='submit' style='padding: 12px;'><i class='fa-solid fa-pen'></i> Sauvegarder la note</button>
        <a href='../../scripts/delete_note.php?id={$_GET['id']}' class='cards' style='padding: 12px;'><i class='fa-solid fa-trash'></i> Supprimer la note</a>
        </form>";
    }
      ?>
</div>
</body>
</html>