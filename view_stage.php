<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css.css" />
</head>
<body>

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>
<table width="100%" border="1" cellspacing="0">
    <tr>
        <th>ID Etudiant</th>
        <th>Date de Début</th>
        <th>Date de Fin</th>
        <th>ID tuteur</th>
        <th>ID Entreprise</th>
        <th>Déscription</th>
    </tr>
<?php
$reponse = $bdd->query('
SELECT * FROM Stage
');
while ($donnees = $reponse->fetch())
{
?>
    <tr>
        <td><?php echo $donnees['ref_etudiant']; ?></td>
        <td><?php echo $donnees['date_debut']; ?></td>
        <td><?php echo $donnees['date_fin']; ?></td>
        <td><?php echo $donnees['ref_tutent']; ?></td>
        <td><?php echo $donnees['ref_entreprise']; ?></td>
        <td><?php echo $donnees['descrition']; ?></td>
    </tr>
<?php 
} 
?>
</table>
<p>
        <a id="back" href="index.php">Retour</a>  
    </P>
<?php

$reponse->closeCursor();

?>

</body>
</html>