<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <a href="./affiche_entreprise.php">Notre Entreprise</a>
            <a href="./form.php">Gestion Projets</a>
        </nav>
    </header>

    <?php

    $intitule = $_POST['intitule'];
    $debut    = $_POST['debut'];
    $fin      = $_POST['fin'];
    $numChef  = $_POST['numChef'];

    $host = "localhost";
    $bd = "entreprise";
    $user = "user";
    $password = "Azerty@77";

    //tentative de connexion
    try {
        $bdd = new PDO("mysql:host=$host;dbname=$bd;chartset=utf8", $user, $password);
        //echo "Connexion ok";

        $maRequete = "INSERT INTO projet(numProjet, intitule, debut, fin, numChef) VALUES (NULL, '$intitule', '$debut', '$fin', '$numChef');";
        echo $maRequete;
        // preparation d'une requête = requête à trou (blank) 
        $req = $bdd->prepare($maRequete);

        // paramètre à inserer dans la requête

        // exécution de la requête
        $req->execute();

        echo "Projet ajouté correctement";
        require_once('./affiche_entreprise.php');
    } catch (Exception $e) {
        die("erreur de connexion");
    }


    ?>

</body>

</html>