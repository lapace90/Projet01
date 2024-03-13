<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Projets</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <nav>
            <a href="./affiche_entreprise.php">Notre Entreprise</a>
            <a href="./new_project.php">Nouveaux Projets</a>
        </nav>
    </header>

    <h1>Gestion Projets</h1>
    <!-- se connecter à la base de données et envoyer une requête pour recuperer les numéros d'employés -->

    <?php
    // paramètres de connexion
    $host = "localhost";
    $bd = "entreprise";
    $user = "user";
    $password = "Azerty@77";



    ?>

    <div class="container">
        <form action="new_project.php" method="post">
            <fieldset>
                <legend> Ajouter un nouveau Projet: </legend>
                <div class="mb-3">
                    <label for="TextInput" class="form-label"> Nom du Projet</label>
                    <input type="text" id="TextInput" name="intitule" class="form-control">
                </div>
                <div class="calendario mb-3">

                    <p>Date Debut:</p> <input type="date" name="debut" id="datepicker">
                    <p>Date Fin: </p><input type="date" name="fin" id="datepickerFin">
                </div>
                <div class="mb-3">
                    <label for="Select" class="form-label">N° Chef de projet</label>
                    <select id="Select" class="form-select">
                        <?php
                        try {
                            $bdd = new PDO("mysql:host=$host;dbname=$bd;chartset=utf8", $user, $password);
                            $req = $bdd->prepare(
                                'SELECT Numero, Nom
                                    FROM emp;'
                            );

                            $req->execute();

                            while ($donnees = $req->fetch()) {
                                $numChef =  $donnees['Numero'];
                                // $nom = $donnees['Nom']

                                echo "<option>$numChef</option>";
                            }
                            $req->closeCursor(); // Termine le traitement de la requête
                        } catch (Exception $e) {
                            die("erreur de connexion");
                        }
                        ?>

                    </select>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-light">Valider</button>
                    <button type="reset" class="btn btn-light">Annuller</button>
                </div>

            </fieldset>
        </form>
    </div>
</body>

</html>