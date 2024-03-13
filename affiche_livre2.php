<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Liste des livres </h1>
    <table id="customers">
        <tr>
            <th>n°</th><th>titre</th><th>auteur</th>
            <th>genre</th><th>prix</th>
        </tr>
<?php
// paramètres de connexion
$host="localhost";
$bd="biblio";
$user ="user";
$password ="Azerty@77";

//tentative de connexion
try
{
    $bdd = new PDO("mysql:host=$host;dbname=$bd;chartset=utf8", $user, $password);
    // preparation d'une requête = requête à trou (blank) 
    $req = $bdd->prepare('SELECT * FROM livre WHERE auteur LIKE :auteur AND genre LIKE :genre ');
   // paramètre à inserer dans la requête
   $genre='%';
   $auteur='%';
   // exécution de la requête
   $req->execute(array('auteur'=>$auteur,'genre'=>$genre));
    while ($donnees = $req->fetch()) // On affiche chaque entrée une à une
    {
		
      $numero   = $donnees['numlivre'];
	  $titre    = $donnees['Titre'];
      $auteur   = $donnees['auteur'];
      $genre    = $donnees['genre'];
      $prix     = $donnees['prix'];
      
      echo "<tr><td>$numero</td><td>$titre</td><td>$auteur</td>
       <td>$genre</td><td>$prix</td></tr>";
	 
    }
    $req->closeCursor(); // Termine le traitement de la requête
 }
catch(Exception $e)
{
    die("erreur de connexion");
}
?>
</table>
</body>
</html>
