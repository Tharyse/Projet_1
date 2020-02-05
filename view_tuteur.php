<link rel="stylesheet" href="css.css" />
<h1>Tuteur</h1>
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
    echo "<table class='table table-striped table-dark' width='100%' border='1' cellspacing='0'>";
    echo "<tr><th>ID Tuteur</th><th>Nom</th><th>Prénom</th><th>Adresse eMail</th></tr>";
    foreach($bdd->query("SELECT * FROM Tutent ORDER BY id_tutent") as $row){
        echo "<tr><td>" . $row['id_tutent'] . "</td>";
        echo "<td>" . $row['nom_tutent'] . "</td>";
        echo "<td>" . $row['prenom_tutent'] . "</td>";
        echo "<td>" . $row['mail_tutent'] . "</td></tr>";
    }
    echo "</table>";
    echo "<p><a id='back' href='index.php'>Retour</a>  </P>";
    $reponse->closeCursor();
} catch(PDOException $e){
    print "Error!: " .$e->getMessage() . "<br />";
    die();
}
?>
