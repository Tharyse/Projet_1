<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <title>Suivi de stages</title>
  <link rel="stylesheet" href="css.css" />
  <h1>Gérer les Tuteurs</h1>
</head> 
<body>

<form action="new_tut.php" method="post">   
    <p>    
        <label for="prenom_tut"></label><input  placeholder="Prénom Tuteur" type="text" name="prenom_tut" id="prenom_tut" required><br />
        <label for="nom_tut"></label><input  placeholder="Nom Tuteur" type="text" name="nom_tut" id="nom_tut" required><br />
        <label for="mail_tut"></label><input  placeholder="Email Tuteur" type="mail" name="mail_tut" id="mail_tut" required><br />
        <label for="id_tut"></label><input placeholder="ID tuteur" type="number" name="id_tut" id="id_tut" required><br />  
        
        <input type="submit" value="Enregister">   
    </p>
</form>
<p>
    <a id="back" href="index.php">Retour</a>  
</P>

<?php
try
{
    $id = $_POST['id_tut'];
    $nom = $_POST['nom_tut'];
    $prenom = $_POST['prenom_tut'];
    $mail = $_POST['mail_tut'];

    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
    $new_tutent = 'INSERT INTO Tutent (id_tutent, nom_tutent, prenom_tutent, mail_tutent) VALUES(?, ?, ?, ?)';
    $query = $bdd->prepare($new_tutent);
    $query->execute(array($id, $nom, $prenom, $mail));
}
catch(PDOException $e)
{
    print "Error!: " .$e->getMessage() . "<br />";
    die();
}
?>

</body>
</html>