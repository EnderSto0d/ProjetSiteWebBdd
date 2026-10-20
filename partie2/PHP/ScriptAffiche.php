<?php
    session_start();
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Formulaire de retour</title>
        <link rel="stylesheet" href="../Css/SwitchPage.css">
        <link rel="stylesheet" href="../Css/ambient.css">
        <link rel="stylesheet" href="../Css/ScriptAffiche.css">
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
            } else if (!isset($_SESSION['isadmin'])) {
                ?> 
                    <h2 class = "texte-centre">Connectez vous d'abord, ou créer un compte puis connectez vous.</h2>
                    <h3 class = "texte-centre"><a href="../Html/Connexion.html"><bold>CONNEXION</bold></a></h3>
                    <h3 class = "texte-centre"><a href="../Html/Inscription.html"><bold>INSCRIPTION</bold></a></h3>
                <?php
            } else {
                $display_card = "SELECT * from skipass_arabi.Carte";
                $result = $mysqli->query($display_card);
                if (!$result) {
                    echo "Error No: " . $mysqli->errno . "\n";
                    echo "Error Msg: " . $mysqli->error . "\n";
                } else {
                ?>
                <h2 class = "texte-centre">Cartes Trouvées :</h2>
                <table>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    ?>
                    <tr>
                        <th>IdCarte</th>
                        <th>Numéros Carte</th>
                        <th>Date de Début</th>
                        <th>Date de Fin</th>
                        <?php 
                            if ($_SESSION['isadmin'] == 1){
                                ?><th>Supprimer</th><?php
                            }
                        ?>
                    </tr>
                    <?php
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th><?php echo $row["IdCarte"] ?></th>
                        <th><?php echo $row["numCarte"] ?></th>
                        <th>
                            <form action="ScriptMajDate.php" method="POST">
                                <input type="hidden" name="Id_carte" value = "<?php echo $row["IdCarte"]?>">
                                <input type="hidden" name="TypeDate" value = 0> <!-- 0 pour début et 1 pour fin -->
                                <input type="date" name="date" value= <?php echo $row["dateDebutValide"] ?> onchange="this.form.submit()"> <!-- form="form_<?php echo $row['Id']; ?>"-->
                            </form>
                        </th>
                        <th>   
                            <form action="ScriptMajDate.php" method="POST">
                                <input type="hidden" name="Id_carte" value = "<?php echo $row["IdCarte"]?>">
                                <input type="hidden" name="TypeDate" value = 1> <!-- 0 pour début et 1 pour fin -->
                                <input type="date" name="date" value= <?php echo $row["dateFinValide"] ?> onchange="this.form.submit()"> <!-- form="form_<?php echo $row['Id']; ?>"-->
                            </form>
                        </th>
                        <?php 
                            if ($_SESSION['isadmin'] == 1){
                            ?><th>
                                <form action="ScriptDel.php" method="POST">
                                    <input type="hidden" name="Id_carte" value = "<?php echo $row["IdCarte"]?>">
                                    <input type="submit" name="Delete" value="Supprimer">
                                </form>
                                </th><?php
                            }
                        ?>
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