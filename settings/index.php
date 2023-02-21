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
    <div class="menu">
      <i class="fa-solid fa-folder-open logo"></i>
      <a href="../projects" class="menu-item">Projets</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-file-pen logo"></i>
      <a href="../notes" class="menu-item">Notes</a>
    </div>
    <div class="menu">
      <i class="fa-solid fa-book logo"></i>
      <a href="../indexes" class="menu-item">Indexs</a>
    </div>
    <div class="menu-active menu-last">
      <i class="fa-solid fa-cog logo"></i>
      <a class="menu-item noselect">Paramètres</a>
    </div>
  </div>
  <div class="main-content">
    <h1 class="content-title">Paramètres</h1>

    <?php
      $requete = "SELECT name, theme FROM settings";
      $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
      while($row = $resultat->fetch()){
        echo "<form method='post' action='../scripts/set_settings.php'>
        <h2>Nom du site</h1>
        <input type='text' placeholder='Nom du site...' value='{$row['name']}' id='name' name='name' style='width: 15%;' required><br><br>
        <h2>Thème</h2>
        <select id='theme' name='theme' style='width: 10%;'>
        ";
        if($row['theme'] == 0) {
          echo "<option value='0' selected>Clair</option>
          <option value='1'>Sombre</option>
          <option value='2'>Gris</option>
          <option value='3'>Bleu sombre</option>";
        }
        else if($row['theme'] == 1) {
          echo "<option value='0'>Clair</option>
          <option value='1' selected>Sombre</option>
          <option value='2'>Gris</option>
          <option value='3'>Bleu sombre</option>";
        }
        else if($row['theme'] == 2) {
          echo "<option value='0'>Clair</option>
          <option value='1'>Sombre</option>
          <option value='2' selected>Gris</option>
          <option value='3'>Bleu sombre</option>";
        }
        else if($row['theme'] == 3) {
          echo "<option value='0'>Clair</option>
          <option value='1'>Sombre</option>
          <option value='2'>Gris</option>
          <option value='3' selected>Bleu sombre</option>";
        }
        echo "</select>
        <br><br>
        <button type='submit' style='margin-top: 20px;'>Sauvegarder</button>
        </form>";
      }
    ?>
  </div>
</div>
</body>
</html>