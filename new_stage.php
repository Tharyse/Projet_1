<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <title>Suivi de stages</title>
  <link rel="stylesheet" href="css.css" />
  <h1>Gérer les Stages</h1>
  
</head>
<body>

<?php
try
{
    echo'<form action="new_stage.php" method="post"><p>';  
    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
///Paneau déroulant pour les étudiants
    echo'<label for="ref_etudiant">Etudiant</label> :';
    echo'<select name="ref_etudiant">';
    echo '<option value="">--Choisir une étudiant--</option>';
    foreach ($bdd->query('SELECT * FROM Etudiant') as $row)
    {
        echo '<option value="' .$row['id_etudiant']. '">' .$row['nom_etudiant']. " " .$row['prenom_etudiant'].'</option>';
    }
    echo '</select> <br />';
    
///Paneau déroulant pour les tuteurs
    echo'<label for="ref_tutent">Tuteur</label> :';
    echo'<select name="ref_tutent">';
    echo '<option value="">--Choisir un tuteur--</option>';
    foreach($bdd->query('SELECT * FROM Tutent') as $row2)
    {
        echo '<option value="' .$row2['id_tutent']. '">' .$row2['nom_tutent']. " " .$row2['prenom_tutent'].'</option>'; 
    }
    echo '</select> <br />';

///Paneau déroulant pour les entreprises
    echo'<label for="ref_entreprise">Enteprise</label> : ';
    echo'<select name="ref_entreprise" >';
    echo '<option value="">--Choisir une entreprise--</option>';
    foreach($bdd->query('SELECT * FROM Entreprise') as $row3)
    {
        echo '<option value="' .$row3['id_entreprise']. '">' .$row3['nom_entreprise']. " " .$row3['prenom_entreprise'].'</option>';
    }
    echo '</select> <br />';
///Fin du formulaire
    echo'<label for="date_deb">Date de début</label> : <input type="date" name="date_deb" id="date_deb" required><br />';
    echo'<label for="date_finn">Date de fin</label> : <input type="date" name="date_finn" id="date_finn"><br />';
    echo'<label for="description">Déscription</label> : <input type="text" name="description" id="description" required><br />';
    
    echo'</p><p><input type="submit" value="Enregistrer un stage"></p></form>';
    echo'<p><a id="back" href="index.php">Retour</a></P>';
}
catch(PDOException $e){
    print "Error!: " .$e->getMessage() . "<br />";
    die();
}
?> 
</body>
</html>
<?php

try
{
    $etu = $_POST['ref_etudiant'];
    $deb = $_POST['date_deb'];
    $fin = $_POST['date_finn'];
    $tut = $_POST['ref_tutent'];
    $ent = $_POST['ref_entreprise'];
    $desc = $_POST['description'];

    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
    $new_stage = 'INSERT INTO Stage (ref_etudiant, date_debut, date_fin, ref_tutent, ref_entreprise, descrition) VALUES(?, ?, ?, ?, ?, ?)';
    $query = $bdd->prepare($new_stage);
    $query->execute(array($etu, $deb, $fin, $tut, $ent, $desc));
}
catch(PDOException $e){
    print "Error!: " .$e->getMessage() . "<br />";
    die();
}

?>
