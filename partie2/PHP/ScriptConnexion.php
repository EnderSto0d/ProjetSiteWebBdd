<?php
    session_start();
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Formulaire de retour</title>
        <link rel="stylesheet" href="../Css/SwitchPage.css">
        <link rel="stylesheet" href="../Css/ambient.css"> <!-- LIGNE AJOUTÉE -->
        <link rel="stylesheet" href="../Css/ScriptAffiche.css"> <!-- LIGNE MODIFIÉE -->
        <!-- Config Page -->
        <?php
            $host = "localhost";
            $username = "root"; 
            $passwd = ""; 
            $dbname = "skipass_arabi"; 
        ?>
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
            // On vérifie si la variable de session existe déjà
            if (isset($_SESSION['isadmin'])) {
                ?> 
                    <h2 class="texte-centre"> Vous êtes déjà connectez ! Deconnecté vous d'abord ! </h2>
                    <h3 class="texte-centre"><a href="../PHP/ScriptDeconnexion.php"><strong>SE DÉCONNECTER</strong></a></h3>
                    <h3 class="texte-centre"><a href="../Html/Home.html"><strong>RETOUR</strong></a></h3>
                <?php
            } else {
                $mysqli = new mysqli($host, $username, $passwd, $dbname);
                if ($mysqli->connect_error){
                    ?> <h2 class = "texte-centre">Erreur de connexion à la base de donnée : <?php echo $mysqli->connect_error ?></h2>
                        <h3 class = "texte-centre"><a href="../Html/Home.html"><bold>RETOUR</bold></a></h3>
                    <?php
                } else {
                    $Login = $_POST['Login'];
                    $Password = $_POST['password'];
                    $Password_Hashed = hash("sha256", $Password);
                    $sql_request = "SELECT admin FROM skipass_arabi.Users WHERE login = '" . $Login ."' AND password = '" . $Password_Hashed ."';";
                    $result = $mysqli->query($sql_request);
                    $row = $result->fetch_row();
                    
                    if ($row == NULL){
                        ?> 
                            <h2 class="texte-centre"> Mot de passe ou login incorrect. Essayez de vous reconnecter </h2>
                            <h2 class = "texte-centre">Erreur de connexion à la base de donnée : <?php echo $sql_request ?></h2>
                            <h3 class="texte-centre"><a href="../Html/Connexion.html"><strong>Connexion</strong></a></h3>
                        <?php
                    } else {
                        $is_admin = $row[0];
                        $_SESSION['isadmin'] = $is_admin;
                        ?> 
                            <h2 class="texte-centre"> Connexion réussi ! </h2>
                            <h3 class="texte-centre"><a href="../Html/Home.html"><strong>RETOUR</strong></a></h3>
                        <?php
                    } 
                }
            }
        ?>
    </body> 
</html>