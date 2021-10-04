<?php 
	
	function rechercher($tel) {
		// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=prestarvor;charset=utf8', 'root', '');

$recherche = $bdd->prepare("SELECT tel FROM reservation WHERE tel = '$tel'");
	}

?> 
