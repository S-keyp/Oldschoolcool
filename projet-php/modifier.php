<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <?php 
    require('config.php');

    if (isset($_POST['id_utilisateurs'])) {
        $id = $_SESSION['id_utilisateurs'];
        $nom = $_POST['nom'];
        $prenom = $_POST['Prénom'];
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $sql_maj = "UPDATE utilisateurs " . 
                      "SET nom = '" . $nom . "' , Prénom='" . $prenom . "' , pseudo='" . $pseudo . "' ," .
                      "    email = '" . $email . "' " .
                      "WHERE id_utilisateurs=" . $id;
        $result = $dbh->query( $sql_maj ) ;
            if ($result === false) {
                echo "erreur d'exécution de la requete<br/>";
                echo $dbh->error;
            } else {
                if ($dbh->affected_rows == 1) {
                    echo "Enregistrement effectué<br/>";
                }
            }
    }

                if (! isset($_SESSION['id_utilisateurs'])) {
                    echo "pas d'utilsateur sélectionné";
                } else {

                    $id = $_SESSION['id_utilisateurs'];
                    $sql = 'SELECT id_utilisateurs, nom, Prénom, pseudo, email FROM utilisateurs WHERE id_utilisateurs=' . $id . ";";
                    $result = $dbh->query( $sql ) ;
                    if ($result === false) {
                        echo "erreur d'exécution de la requete<br/>";
                        echo $dbh->error;
                    } else {
                        $row = $result->fetch_array( MYSQLI_ASSOC ) ;
                        if (! $row) {
                            echo "Abonné inexistant";
                        } else {
        ?>

            <input type="hidden" name="id_utilisateurs" value="<?=$row['id_utilisateurs']?>"/><br/>
            <label>Nom : </label><input name="nom" value="<?=$row['nom']?>"/><br/>
            <label>Prénom : </label><input name="prenom" value="<?=$row['Prénomnom']?>"/><br/>
            <label>Ville : </label><input name="pseudo" value="<?=$row['pseudo']?>"/><br/>
            <label>Date de naissance : </label><input name="email" value="<?=$row['email']?>"/><br/>
            <br/>
            <input type="submit" value="Enregistrer">
        <?php

                        }
                    }
                }
            
        ?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </div>

           
        </div>
    </div>
</div>
        </form>