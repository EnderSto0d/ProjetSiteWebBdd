<?php
    $host = "localhost";
    $username = "root"; 
    $passwd = ""; 
    $dbname = "skipass_arabi"; 
    $TypeDate = $_POST['TypeDate'];
    $Date = $_POST['date'];
    $IdCarte = $_POST['Id_carte'];
    $mysqli = new mysqli($host, $username, $passwd, $dbname);
    
    if ($mysqli->connect_error){
        ?> <h2 class = "texte-centre">Erreur de connexion à la base de donnée : <?php echo $mysqli->connect_error ?></h2>
            <h3 class = "texte-centre"><a href="../Html/FormInsert.html"><bold>RETOUR</bold></a></h3>
        <?php
    } else {
        if ($TypeDate){
            $insert_newdate = "UPDATE skipass_arabi.carte SET dateFinValide = '" . $Date . "' WHERE IdCarte = ". $IdCarte . ";";
        } else {
            $insert_newdate = "UPDATE skipass_arabi.carte SET dateDebutValide = '" . $Date . "' WHERE IdCarte = ". $IdCarte . ";";
        }
        if (!$mysqli->query($insert_newdate)) {
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
        <title>Mettre a jour une date</title>
    </head>
    <body>
    </body> 
</html>