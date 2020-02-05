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
        <label for="prenom_etu"></label><input  placeholder="Prénom Etudiant" type="text" name="prenom_etu" id="prenom_etu" required><br />
        <label for="nom_etu"></label><input  placeholder="Nom Etudiant" type="text" name="nom_etu" id="nom_etu" required><br />
        <label for="mail_etu"></label><input  placeholder="Email Etudiant" type="mail" name="mail_etu" id="mail_etu" required><br />
        <label for="id_etu"></label><input placeholder="ID Etudiant" type="number" name="id_etu" id="id_etu" required><br />  
        
        <input type="submit" value="Enregister">   
    </p>
</form>
<p>
    <a id="back" href="index.php">Retour</a>  
</P>
<?php

try
{
    $id = $_POST['id_etu'];
    $nom = $_POST['nom_etu'];
    $prenom = $_POST['prenom_etu'];
    $mail = $_POST['mail_etu'];

    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
    $new_etudiant = 'INSERT INTO Etudiant (id_etudiant, nom_etudiant, prenom_etudiant, mail_etudiant) VALUES(?, ?, ?, ?)';
    $query = $bdd->prepare($new_etudiant);
    $query->execute(array($id, $nom, $prenom, $mail));
}
catch(PDOException $e){
    print "Error!: " .$e->getMessage() . "<br />";
    die();
}

?>

