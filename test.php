<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <title>Suivi de stages</title>
</head>
<body>

<form action="test.php" method="post">   
    <p>    
        <label for="nom_ent"></label><input  placeholder="Nom Entreprise" type="text" name="nom_ent" id="nom_ent" require><br />
        <label for="id_ent"></label><input placeholder="ID Entreprise" type="number" name="id_ent" id="id_ent" required><br />  
        
        <input type="submit" value="Enregister">   
    </p>
</form>

<?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', 't', 't');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$if_verif = "SELECT Entrerpise id_entrerpise WHERE id=".$_POST['id_ent']."";

if ($id_verif){
    
    

}else{
    echo "ID déja existant";
}
?>


</body>
</html>
