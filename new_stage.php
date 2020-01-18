<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <title>Suivi de stages</title>
</head>
<body>

<form action="new_stage.php" method="post">
    <p>  
        <label for="ref_etudiant">ID de L'étudiant</label> : <input type="number" name="ref_etudiant" id="ref_etudiant" require><br />
        <label for="ref_tutent">ID du Tuteur</label> : <input type="number" name="ref_tutent" id="ref_tutent" require><br />
        <label for="ref_entreprise">ID de L'enteprise</label> : <input type="number" name="ref_entreprise" id="ref_entreprise" require><br />
        <label for="date_deb">Date de début de stage</label> : <input type="date" name="date_deb" id="date_deb" require><br />
        <label for="date_finn">Date de fin de stage</label> : <input type="date" name="date_finn" id="date_finn"><br />    
        <label for="description">Courte déscription</label> : <input type="text" name="description" id="description" require><br />
    </p>
    <p>
        <input type="submit" value="Créer un stage">    
    </p>
</form>
</body>
</html>

<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$new_stage = 'INSERT INTO Stage (ref_etudiant, date_debut, date_fin, ref_tutent, ref_entreprise, descrition) VALUES(?, ?, ?, ?, ?, ?)';
$query = $bdd->prepare($new_stage);
$query->execute(array($_POST['ref_etudiant'], $_POST['date_deb'] , $_POST['date_finn'] ,$_POST['ref_tutent'] ,$_POST['ref_entreprise'] ,$_POST['description']));
?>

</body>
</html>