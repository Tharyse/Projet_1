<link rel="stylesheet" href="css.css"/>
<h1>Entreprise</h1>
<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=Test', 't', 't');
    echo "<table class='table table-striped table-dark' width='100%' border='1' cellspacing='0'>";
    echo "<tr><td>ID Entreprise</td><td>Nom</td></tr>";
    foreach($bdd->query("SELECT * FROM Entreprise ORDER BY id_entreprise") as $row){
        echo "<tr><td>" . $row['id_entreprise'] . "</td>";
        echo "<td>" . $row['nom_entreprise'] . "</td></tr>";
    }
    echo "</tr></table>";
    echo "<p><a id='back' href='index.php'>Retour</a></P>";
    $reponse->closeCursor();
} catch(PDOException $e){
    print "Error!: " .$e->getMessage() . "<br />";
    die();
}
?>
