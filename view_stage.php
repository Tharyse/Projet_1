<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
    echo "<table  class='table table-striped table-dark' width='100%' border='1' cellspacing='0'>";
    echo "<tr><th>ID Etudiant</th><th>Date de Début</th><th>Date de Fin</th><th>ID Tuteur</th><th>ID Entreprise</th><th>Description</th></tr>";
    foreach($bdd->query("SELECT * FROM Stage ORDER BY ref_etudiant") as $row){
        echo "<tr><td>" . $row['ref_etudiant'] . "</td>";
        echo "<td>" . $row['date_debut'] . "</td>";
        echo "<td>" . $row['date_fin'] . "</td>";
        echo "<td>" . $row['ref_tutent'] . "</td>";
        echo "<td>" . $row['ref_entreprise'] . "</td>";
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
