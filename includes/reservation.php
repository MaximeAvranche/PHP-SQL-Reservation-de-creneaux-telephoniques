<?php 
	function reserver($date, $etat, $nom, $prenom, $tel, $mail, $etat_cli, $idURL) {
		// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=prestarvor;charset=utf8', 'root', '');

// Update de la réservation pour le client
$update = $bdd->prepare("UPDATE reservation SET reservations='$date', etat='$etat', nom='$nom', prenom='$prenom', tel='$tel', mail='$mail', etat_client='$etat_cli' WHERE id='$idURL'");
$update->execute(array(
	'reservations' => date('Y-m-d H:i:s'),
    'etat' => $etat,
	'nom' => $nom,
	'prenom' => $prenom,
	'tel' => $tel,
	'mail' => $mail,
	'etat_client' => $etat_cli));
}
?> 
