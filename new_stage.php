<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <title>Suivi de stages</title>
  <link rel="stylesheet" href="css.css" />
  <h1>Gérer les Stages</h1>
  
</head>
<body>

<form action="new_stage.php" method="post">

    <p>  
        <label for="ref_etudiant">Etudiant</label> : 
        <select name="ref_etudiant"> 

        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        $reponse = $bdd->query('SELECT * FROM Etudiant');
        echo '<option value="">--Choisir une étudiant--</option>';
        while ($donnees = $reponse->fetch())
        {
            echo '<option value="' .$donnees['id_etudiant']. '">' .$donnees['nom_etudiant']. " " .$donnees['prenom_etudiant'].'</option>';
        }
        ?>
        </select>

        <?php
        $reponse->closeCursor();
        ?> 
        <br />
        <label for="ref_tutent">Tuteur</label> : 
        <select name="ref_tutent" > 

        <?php

        $reponse = $bdd->query('SELECT * FROM Tutent');
        echo '<option value="">--Choisir un tuteur--</option>';
        while ($donnees = $reponse->fetch())
        {
            echo '<option value="' .$donnees['id_tutent']. '">' .$donnees['nom_tutent']. " " .$donnees['prenom_tutent'].'</option>'; 
        }
        ?>
        </select>

        <?php
        $reponse->closeCursor();
        ?> 
        <br />
        <label for="ref_entreprise">Enteprise</label> : 
        <select name="ref_entreprise" > 

        <?php

        $reponse = $bdd->query('SELECT * FROM Entreprise');
        echo '<option value="">--Choisir une entreprise--</option>';
        while ($donnees = $reponse->fetch())
        {
            echo '<option value="' .$donnees['id_entreprise']. '">' .$donnees['nom_entreprise']. " " .$donnees['prenom_entreprise'].'</option>';
         
        }
        ?>
        </select>

        <?php
        $reponse->closeCursor();
        ?> 
        <br />
        <label for="date_deb">Date de début</label> : <input type="date" name="date_deb" id="date_deb" required><br />
        <label for="date_finn">Date de fin</label> : <input type="date" name="date_finn" id="date_finn"><br />    
        <label for="description">Déscription</label> : <input type="text" name="description" id="description" required><br />
    </p>
    <p>
        <input type="submit" value="Enregistrer un stage">    
    </p>
</form>
        <p>
        <a id="back" href="index.php">Retour</a>  
    </P>
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