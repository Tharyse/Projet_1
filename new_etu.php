<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Suivi de stages</title>
  <link rel="stylesheet" href="css.css" />
  <h1>Gérer les Etudiant</h1>
</head>
<body>
<form action="new_etu.php" method="post">   
    <p>    
        <label for="prenom_etu"></label><input  placeholder="Prénom Etudiant" type="text" name="prenom_etu" id="prenom_etu" require><br />
        <label for="nom_etu"></label><input  placeholder="Nom Etudiant" type="text" name="nom_etu" id="nom_etu" require><br />
        <label for="mail_etu"></label><input  placeholder="Email Etudiant" type="text" name="mail_etu" id="mail_etu" require><br />
        <label for="id_etu"></label><input placeholder="ID Etudiant" type="number" name="id_etu" id="id_etu" required><br />  
        
        <input type="submit" value="Enregister">   
    </p>
</form>

<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$new_etudiant = 'INSERT INTO Etudiant (id_etudiant, nom_etudiant, prenom_etudiant, mail_etudiant) VALUES(?, ?, ?, ?)';
$query = $bdd->prepare($new_etudiant);
$query->execute(array($_POST['id_etu'], $_POST['nom_etu'],$_POST['prenom_etu'] , $_POST['mail_etu']));

?>

