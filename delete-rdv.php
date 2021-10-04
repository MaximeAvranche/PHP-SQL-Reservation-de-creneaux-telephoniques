<?php
include('includes/db.php');
    if(isset($_GET['id'])){
    	$get = $_GET['id'];

$del = $db->prepare("UPDATE reservation SET etat='1', tel=NULL, nom=NULL, prenom=NULL, mail=NULL, reservations=NULL WHERE id = '$get'");
$del->execute(array(
    'etat' => 1));



      header('Location: calendrier.php');
    }
    else
    {
      header('Location: calendrier.php');
    }

?>