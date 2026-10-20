<html>
    <head>
        <meta charset="utf-8"/>
        <title>Formulaire de retour</title>
        <link rel="stylesheet" href="../Css/ScriptInsert.css">
        <link rel="stylesheet" href="../Css/ambient.css"> <!-- LIGNE AJOUTÉE -->
        <!-- Config Page -->
        <?php
            $host = "localhost";
            $username = "root"; 
            $passwd = ""; 
            $dbname = "skipass_arabi"; 
        ?>
    </head>
    <body>
        <?php
            $IdCarte = $_POST['Id_carte'];
            $DateStart = $_POST['Date_Start']; 
            $DateEnd = $_POST['Date_End']; 
            $mysqli = new mysqli($host, $username, $passwd, $dbname);
            if ($mysqli->connect_error){
                ?> <h2 class = "texte-centre">Erreur de connexion : <?php echo $mysqli->connect_error ?></h2>
                    <h3 class = "texte-centre"><a href="../Html/FormInsert.html"><bold>RETOUR</bold></a></h3>
                <?php
            } else {
                $insert_newcard = "INSERT INTO skipass_arabi.Carte VALUES
                    (NULL, '" . $IdCarte . "', '" . $DateStart . "', '" . $DateEnd . "');";
                if (!$mysqli->query($insert_newcard)) {
                    echo "Error No: " . $mysqli->errno . "\n";
                    echo "Error Msg: " . $mysqli->error . "\n";
                } else {
                ?>
                <h2 class = "texte-centre">Nouvelle carte créer</h2>
                <h3 class = "texte-centre"><a href="../Html/FormInsert.html"><bold>RETOUR</bold></a></h3>
                <?php
                }
            }
            ?>
    </body> 
</html>