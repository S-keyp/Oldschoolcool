if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $nom = $_POST['nom'];
                    $prenom = $_POST['Prénom'];
                    $pseudo = $_POST['pseudo'];
                    $email = $_POST['email'];
                    $sql_maj = "UPDATE abonne " . 
                                  "SET nom = '" . $nom . "' , Prénom='" . $prenom . "' , pseudo='" . $pseudo . "' ," .
                                  "    email = '" . $email . "' " .
                                  "WHERE id_utilisateurs=" . $id;
                    $result = $connexion->query( $sql_maj ) ;
                    if ($result === false) {
                        echo "erreur d'exécution de la requete<br/>";
                        echo $connexion->error;
                    } else {
                        if ($connexion->affected_rows == 1) {
                            echo "Enregistrement effectué<br/>";
                        }
                    }

                }

                if (! isset($_GET['id'])) {
                    echo "pas d'utilsateur sélectionné";
                } else {

                    // On affiche le formulaire en récupérant les données en base
        +
                    $id = $_GET['id'];
                    $sql = 'SELECT id, nom, prenom, ville, date_naissance FROM abonne WHERE id=' . $id . ";";
                    $result = $connexion->query( $sql ) ;
                    if ($result === false) {
                        echo "erreur d'exécution de la requete<br/>";
                        echo $connexion->error;
                    } else {
                        $row = $result->fetch_array( MYSQLI_ASSOC ) ;
                        if (! $row) {
                            echo "Abonné inexistant";
                        } else {
        ?>

            <input type="hidden" name="id" value="<?=$row['id']?>"/><br/>
            <label>Nom : </label><input name="nom" value="<?=$row['nom']?>"/><br/>
            <label>Prénom : </label><input name="prenom" value="<?=$row['prenom']?>"/><br/>
            <label>Ville : </label><input name="ville" value="<?=$row['ville']?>"/><br/>
            <label>Date de naissance : </label><input type="date" name="date_naissance" value="<?=$row['date_naissance']?>"/><br/>
            <br/>
            <input type="submit" value="Enregistrer">
        <?php

                        }
                    }
                }
            }
        ?>
        </form>