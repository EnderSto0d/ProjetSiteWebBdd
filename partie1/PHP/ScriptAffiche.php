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
                ?> <h2 class = "texte-centre">Erreur de connexion : <?php echo $mysqli->connect_error ?></h2>
                    <h3 class = "texte-centre"><a href="../Html/FormInsert.html"><bold>RETOUR</bold></a></h3>
                <?php
            } else {
                $display_card = "SELECT * from skipass_arabi.Carte";
                $result = $mysqli->query($display_card);
                if (!$result) {
                    echo "Error No: " . $mysqli->errno . "\n";
                    echo "Error Msg: " . $mysqli->error . "\n";
                } else {
                ?>
                <h2 class = "texte-centre">Carte Trouvées :</h2>
                <table>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    ?>
                    <tr>
                        <th>IdCarte</th>
                        <th>Numéros Carte</th>
                        <th>Date de Début</th>
                        <th>Date de Fin</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th><?php echo $row["IdCarte"] ?></th>
                        <th><?php echo $row["numCarte"] ?></th>
                        <th><?php echo $row["dateDebutValide"] ?></th>
                        <th><?php echo $row["dateFinValide"] ?></th>
                        <th>
                            <form action="ScriptDel.php" method="POST">
                                <input type="hidden" name="Id_carte" value = "<?php echo $row["IdCarte"]?>">
                                <input type="submit" name="Delete" value="Supprimer">
                            </form>    
                        </th>

                    </tr>
                    <?php
                }
                } else {
                    ?>
                    <tr>
                        <th>Aucune Cartes</th>
                    </tr>
                    <?php
                }
                ?>
                </table>
                <?php
                }
            }
            ?>
    </body> 

</html>