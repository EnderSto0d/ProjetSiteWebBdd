<?php
    session_start();
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Déconnexion</title>
        <link rel="stylesheet" href="../Css/SwitchPage.css">
        <link rel="stylesheet" href="../Css/ambient.css">
        <link rel="stylesheet" href="../Css/ScriptAffiche.css">
    </head>
    <body>
        <div class="SwitcherPage">
            <a href="../Html/Home.html">
                <div class="link_to_page" >
                    <p>Accueil !!!</p>
                </div>
            </a>
            <a href="../Html/FormInsert.html">
            <div class="link_to_page" >
                <p>Inserer une nouvelle carte !</p>
            </div>
            </a>
            <a href="../PHP/ScriptAffiche.php">
            <div class="link_to_page" >
                <p>Affichage des Cartes</p>
            </div>
            </a>
        </div>
        <?php
            if (isset($_SESSION['isadmin'])) {
                session_destroy();
                ?>
                    <h2 class="texte-centre"> Vous êtes bien déconnecté ! </h2>
                    <h3 class="texte-centre"><a href="../Html/Home.html"><strong>RETOUR</strong></a></h3>
                <?php
            } else {
                ?>
                    <h2 class="texte-centre"> Vous n'êtes pas connecté ! </h2>
                    <h3 class="texte-centre"><a href="../Html/Connexion.html"><strong>CONNEXION</strong></a></h3>
                    <h3 class="texte-centre"><a href="../Html/Home.html"><strong>RETOUR</strong></a></h3>
                <?php
            }
        ?>
    </body>
</html>