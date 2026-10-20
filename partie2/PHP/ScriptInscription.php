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
            $mysqli = new mysqli($host, $username, $passwd, $dbname);
            if ($mysqli->connect_error){
                ?> <h2 class = "texte-centre">Erreur de connexion à la base de donnée : <?php echo $mysqli->connect_error ?></h2>
                    <h3 class = "texte-centre"><a href="../Html/Inscription.html"><bold>RETOUR</bold></a></h3>
                <?php
            } else {
                    $Login = $_POST['Login'];
                    $Password= $_POST['password'];
                    $Nom = $_POST['Nom'];
                    $Prenom = $_POST['Prenom'];
                    $Hashed_Password = hash("sha256", $Password);
                    $insert_newuser = "INSERT INTO skipass_arabi.Users VALUES
                        ('" . $Login . "', '" . $Hashed_Password . "', '" . $Nom . "', '" . $Prenom . "', '0');";
                    $count_nbr_user = "SELECT COUNT(*) FROM skipass_arabi.Users;";
                    if (!$mysqli->query($insert_newuser)) {
                        echo "Error No: " . $mysqli->errno . "\n";
                        echo "Error Msg: " . $mysqli->error . "\n";
                    } else {
                    $result = $mysqli->query($count_nbr_user);                  
                    $row = $result->fetch_row();
                    $nombre_utilisateurs = $row[0];
                    ?>
                    <h2 class="texte-centre">Votre compte a été correctement créé, veuillez vous connecter !</h2>
                    <h2 class="texte-centre">Nombre d'utilisateurs dans la station : <?php echo $nombre_utilisateurs; ?> !</h2>
                    <h3 class="texte-centre"><a href="../Html/Home.html"><strong>RETOUR</strong></a></h3>
                    <?php
                    }
            }
            ?>
    </body>     
</html>