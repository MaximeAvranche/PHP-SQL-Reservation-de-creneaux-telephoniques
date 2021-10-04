<?php
include 'includes/reservation.php';
	if (isset($_POST['reserve'])) {
        $etat = 2;
        $etat_cli = 2;
        $date = date('Y-m-d H:i:s');
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];
        $idURL = $_GET['id'];
    reserver($date, $etat, $nom, $prenom, $tel, $mail, $etat_cli, $idURL);
 }
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Date</title>
</head>
<body>
<form method="POST" action="">
	<legend>Prénom : </legend>
  <input type="text" name="prenom" required="">
  	<legend>Nom : </legend>
  <input type="text" name="nom" required="">
  	<legend>Numéro de téléphone : </legend>
  <input type="text" name="tel" required="">
  	<legend>Adresse mail : </legend>
  <input type="mail" name="mail" required="">
  <br />
  <button type="submit" name="reserve">Réserver</button>
</form>
</body>
</html>