<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <title>Suivi de stages</title>
  <link rel="stylesheet" href="css.css" />
  <h1>Gérer les Entreprises</h1>
</head>
<body>
<form action="new_ent.php" method="post">   
    <p>    
        <label for="nom_ent"></label><input  placeholder="Nom Entreprise" type="text" name="nom_ent" id="nom_ent" required><br />
        <label for="id_ent"></label><input placeholder="ID Entreprise" type="number" name="id_ent" id="id_ent" required><br />  
        <input type="submit" value="Enregister">
    </p>
</form>
<br />
<p>
    <a id="back" href="index.php">Retour</a>  
</P>
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$new_entreprise = 'INSERT INTO Entreprise (id_entreprise, nom_entreprise) VALUES(?, ?)';
$query = $bdd->prepare($new_entreprise);
$query->execute(array($_POST['id_ent'], $_POST['nom_ent']));
?>
</body>
</html>
