<?php
try
{
    $bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'marien_delahaye');
}
catch (exception $e)
{
    die ('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO minichat (pseudo,message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

header('Location: minichat.php');
?>