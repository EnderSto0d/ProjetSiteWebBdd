<?php
    $host = "localhost";
    $username = "root"; 
    $passwd = ""; 
    $dbname = "skipass_arabi"; 
    $IdCarte = $_POST['Id_carte'];
    $mysqli = new mysqli($host, $username, $passwd, $dbname);
    
    if ($mysqli->connect_error){
        ?> <h2 class = "texte-centre">Erreur de connexion à la base de donnée : <?php echo $mysqli->connect_error ?></h2>
            <h3 class = "texte-centre"><a href="../Html/FormInsert.html"><bold>RETOUR</bold></a></h3>
        <?php
    } else {
        $insert_newcard = "DELETE FROM skipass_arabi.Carte WHERE IdCarte = ". $IdCarte;
        if (!$mysqli->query($insert_newcard)) {
            echo "Error No: " . $mysqli->errno . "\n";
            echo "Error Msg: " . $mysqli->error . "\n";
        } else {
            header("Location: ScriptAffiche.php");
            exit;
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Supprimer un tuple</title>
    </head>
    <body>
    </body> 
</html>