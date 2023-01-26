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
    <link rel="stylesheet" href="https://rawcdn.githack.com/hung1001/font-awesome-pro-v6/44659d9/css/all.min.css"/>
    <link rel="icon" type="image/png" href="../../../assets/img/favicon.png" />
</head>
<body>
  <?php
      $requete = "SELECT title, description FROM projects WHERE id = '{$_GET['id']}'";
      $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
      while($row = $resultat->fetch()){
        echo "<h1>{$row['title']}</h1>
        <h3>{$row['description']}</h3>
        <br>
        <h2>Tâches à réaliser</h2>";
        $requete2 = "SELECT label FROM tasks WHERE project_id = '{$_GET['id']}' AND is_done = 0";
        $resultat2 = $cnn->query($requete2) or die(print_r($bdd->errorInfo()));
        while($row2 = $resultat2->fetch()){
          echo "<p>- {$row2['label']}</p>";
        }
        echo "<br>
        <h2>Tâches réalisées</h2>";
        $requete3 = "SELECT label FROM tasks WHERE project_id = '{$_GET['id']}' AND is_done = 1";
        $resultat3 = $cnn->query($requete3) or die(print_r($bdd->errorInfo()));
        while($row3 = $resultat3->fetch()){
          echo "<p>- {$row3['label']}</p>";
        }
      }
    ?>
</body>
</html>

<style>
@font-face {
    font-family: "Varela";
    src: url("../../../assets/fonts/varela.ttf") format("truetype");
}

* {
    font-family: "Varela", sans-serif;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script>
  var doc = new jsPDF();
  var elementHandler = {
    '#ignorePDF': function (element, renderer) {
      return true;
    }
  };
  var source = window.document.getElementsByTagName("body")[0];
  doc.fromHTML(
    source,
    15,
    15,
    {
      'width': 180,'elementHandlers': elementHandler
    });

  doc.save('Project.pdf');

  window.close();
</script>