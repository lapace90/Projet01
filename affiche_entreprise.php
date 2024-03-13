<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Entreprise</title>
</head>

<body>
<header>
        <nav>
            <ul>
                <li><a href="./new_project.php">Nouveaux Projets</a></li>
                <li><a href="./form.php">Gestion Projets</a></li>
            </ul>
            
            
        </nav>
    </header>
    <h1>Notre Entreprise </h1>
    <div class="container">
    <table id="customers">
        <tr>
            <th>N° Projet</th>
            <th>Intitulé</th>
            <th>Date de debut</th>
            <th>Date de fin</th>
            <th>N° Chef de Projet</th>
            <th>Mission</th>
            <th>Date d'affectation</th>
        </tr>
        <?php
        // paramètres de connexion
        $host = "localhost";
        $bd = "entreprise";
        $user = "user";
        $password = "Azerty@77";

        //tentative de connexion
        try {
            $bdd = new PDO("mysql:host=$host;dbname=$bd;chartset=utf8", $user, $password);
            //echo "Connexion ok";

            // preparation d'une requête = requête à trou (blank) 
            $req = $bdd->prepare(
                'SELECT *
                FROM affectationprojet 
                JOIN projet ON affectationprojet.numProjet = projet.numProjet
                JOIN emp ON affectationprojet.num_emp = emp.Numero'
            );

            // paramètre à inserer dans la requête

            // exécution de la requête
            $req->execute();


            while ($donnees = $req->fetch()) // On affiche chaque entrée une à une
            {
                //var_dump($donnees);
                $mission = $donnees['mission'];
                $numProjet = $donnees['numProjet'];
                $intitule = $donnees['intitule'];
                $debut = $donnees['debut'];
                $fin = $donnees['fin'];
                $numchef = $donnees['numchef'];
                $d_affectation = $donnees['date_affectation'];

                echo "<tr><td>$numProjet</td><td>$intitule</td><td>$debut</td>
       <td>$fin</td><td>$numchef</td><td>$mission</td><td>$d_affectation</td></tr>";
            }
            $req->closeCursor(); // Termine le traitement de la requête
        } catch (Exception $e) {
            die("erreur de connexion");
        }
        ?>
    </table>
    </div>
    

   
</body>

</html>