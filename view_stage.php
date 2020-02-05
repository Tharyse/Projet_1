<link rel="stylesheet" href="css.css" />
<h1>Stage</h1>
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
    echo "<table class='table table-striped table-dark' width='100%' border='1' cellspacing='0'>";
    echo "<tr><th>Nom Etudiant</th><th>Date de Début</th><th>Date de Fin</th><th>Nom Tuteur</th><th>Nom Entreprise</th><th>Description</th></tr>";
    foreach($bdd->query(
    "SELECT 
        *, 
        Etudiant.nom_etudiant, Etudiant.id_etudiant, 
        Tutent.nom_tutent, Tutent.id_tutent,
        Entreprise.nom_entreprise, Entreprise.id_entreprise 
    FROM 
        Stage 
    INNER JOIN 
        Etudiant ON Stage.ref_etudiant=Etudiant.id_etudiant
    INNER JOIN 
        Tutent ON Stage.ref_tutent=Tutent.id_tutent
    INNER JOIN 
        Entreprise ON Stage.ref_entreprise=Entreprise.id_entreprise"
    )as $row){
        echo "<tr><td>" . $row['nom_etudiant'].' '.$row['prenom_etudiant'] . "</td>";
        echo "<td>" . $row['date_debut'] . "</td>";
        echo "<td>" . $row['date_fin'] . "</td>";
        echo "<td>" . $row['nom_tutent'].' '.$row['prenom_tutent'] . "</td>";
        echo "<td>" . $row['nom_entreprise'] . "</td>";
        echo "<td>" . $row['descrition'] . "</td></tr>";
    }
    echo "</table>";
    echo "<p><a id='back' href='index.php'>Retour</a>  </P>";
    $reponse->closeCursor();
} catch(PDOException $e){
    print "Error!: " .$e->getMessage() . "<br />";
    die();
}
?>
