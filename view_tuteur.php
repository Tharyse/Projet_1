<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Suivi de stages</title>
</head>

<table width="100%" border="1" cellspacing="0">
    <tr>
        <th>ID Tuteur</th>
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

$reponse = $bdd->query('SELECT * FROM Tutent ORDER BY id_tutent');
while ($donnees = $reponse->fetch())
{
?>
    <tr>
        <td><?php echo $donnees['id_tutent']; ?></td>
        <td><?php echo $donnees['nom_tutent']; ?></td>
        <td><?php echo $donnees['prenom_tutent']; ?></td>
        <td><?php echo $donnees['mail_tutent']; ?></td>
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