<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Suivi de stages</title>
  <link rel="stylesheet" href="css.css" />
</head>

<table width="100%" border="1" cellspacing="0">
    <tr>
        <th>ID Etudiant</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse eMail</th>
    </tr>
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM Etudiant ORDER BY id_etudiant');
while ($donnees = $reponse->fetch())
{
?>
    <tr>
        <td><?php echo $donnees['id_etudiant']; ?></td>
        <td><?php echo $donnees['nom_etudiant']; ?></td>
        <td><?php echo $donnees['prenom_etudiant']; ?></td>
        <td><?php echo $donnees['mail_etudiant']; ?></td>
    </tr>
<?php 
} 
?>
</table>

<?php

$reponse->closeCursor();

?>

</body>
</html>