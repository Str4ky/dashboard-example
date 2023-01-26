<?php
  include("../../config/database.php");
  header("Content-type: text/css");
?>

@font-face {
    font-family: "Varela";
    src: url("../fonts/varela.ttf") format("truetype");
}

<?php
    $requete = "SELECT theme FROM settings";
    $resultat = $cnn->query($requete) or die(print_r($bdd->errorInfo()));
    while($row = $resultat->fetch()){
        if($row['theme'] == 0) {
            echo"
            :root {
            --background_color: #ffffff;
            --sidebar_color: #ececec;
            --button_color: #ececec;
            --button_color_hover: #d0d0d0;
            --text_color: #282828;
            }";
        }
        else if($row['theme'] == 1) {
            echo"
            :root {
            --background_color: #121212;
            --sidebar_color: #1f1f1f;
            --button_color: #1f1f1f;
            --button_color_hover: #2e2d2d;
            --text_color: #e9e9e9;
            }";
        }
        else if($row['theme'] == 2) {
            echo"
            :root {
            --background_color: #36393f;
            --sidebar_color: #2f3136;
            --button_color: #3c3f45;
            --button_color_hover: #42464d;
            --text_color: #dcdbd4;
            }";
        }
        else if($row['theme'] == 3) {
            echo"
            :root {
            --background_color: #202327;
            --sidebar_color: #282d34;
            --button_color: #282d34;
            --button_color_hover: #333942;
            --text_color: #ccd4f5;
            }";
        }
    }
?>

* {
    font-family: "Varela", sans-serif;
}

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: var(--background_color);
  }
  
.container {
    display: flex;
    flex-direction: row;
    position: relative;
    min-height: 100%;
}
  
.sidebar {
    width: 12%;
    color: var(--text_color);
    background-color: var(--sidebar_color);
    padding: 20px;
    padding-top: 10px;
    padding-left: 10px;
    bottom: 0;
    left: 0;
    top:0;
}
  
.main-content {
    width: 100%;
    background-color: var(--background_color);
    color: var(--text_color);
    padding: 20px;
}

.menu-active {
    background-color: var(--button_color_hover);
    color: var(--text_color);
    font-size: 22px;
    padding: 10px;
    border-radius: 8px;
    margin-top: 10px;
    width: 90%;
}

.menu {
    font-size: 22px;
    padding: 10px;
    border-radius: 8px;
    margin-top: 10px;
    width: 90%;
}

.menu:hover {
    background-color: var(--button_color_hover);
}

.menu-item {
    color: var(--text_color);
    text-decoration: none;
}

.menu-last {
    position: absolute;
    bottom: 0;
    width: 9.25%;
    margin-bottom: 10px;
}


.logo {
    float: left;
    margin-right: 10px;
}

.logo2 {
    font-size: 18px;
    vertical-align: center;
}

.sidebar-title {
    padding-bottom: 10px;
    padding-left: 10px;
}

.noselect {
    cursor: default;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.content-title {
    padding-bottom: 20px;
}

.cards {
    background-color: var(--button_color);
    color: var(--text_color);
    padding: 20px;
    margin-left: 10px;
    border-radius: 8px;
    text-decoration: none;
    transition: 0.2s;
}

.cards:hover {
    background-color: var(--button_color_hover);
}

.cards_note {
    background-color: var(--button_color);
    color: var(--text_color);
    padding: 20px;
    width: 40%;
    border-radius: 8px;
    text-decoration: none;
    transition: 0.2s;
    display: inline-block;
}

.cards_note:hover {
    background-color: var(--button_color_hover);
}

input[type="text"], select, option {
    padding: 10px;
    width: 25%;
    border-radius: 8px;
}

textarea {
    border-radius: 8px;
}

button[type="submit"] {
    padding: 15px;
    border-radius: 8px;
    background-color: var(--button_color);
    color: var(--text_color);
    border: none;
    font-size: 16px;
    transition: 0.2s;
}

button[type="submit"]:hover {
    background-color: var(--button_color_hover);
    cursor: pointer;
}

.button {
    background-color: var(--button_color);
    color: var(--text_color);
    padding: 10px;
    border-radius: 8px;
    text-decoration: none;
    transition: 0.2s;
}

.button:hover {
    background-color: var(--button_color_hover);
}