<?php
  include 'includes/fonctions.php';
  include 'includes/db.php';
  if (isset($_POST['rechercher'])) {
    $tel = $_POST['tel'];
    rechercher($tel);
}

else {
  header("Location : index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Date</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
                  $trouver = $db->query("SELECT * FROM reservation WHERE tel = '$tel'");
                  while ($donnees = $trouver->fetch())
                    { 
                    ?>
                    <h2>Réservation du : <?php echo $donnees['date']; ?></h2>
                    <p>Par : 
                    <?php echo $donnees['prenom']; echo " "; echo $donnees['nom']; ?></p>
                    <p><em>Réservé le : <?php echo $donnees['reservations']; ?></em></p>
                    <a href="delete-rdv.php?id=<?php echo $donnees['id']; ?>"><i class="fa fa-trash"></i> Supprimer</a>
                    <?php 
                      if ($donnees['date'] < date('Y-m-d H:i:s')) {
                        echo "délais dépassé";
                      }
                      else if ($donnees['date'] == date('Y-m-d H:i:s')) {
                        echo "Le rendez-vous est maintenant";
                      }
                      else {
                        echo "Rendez-vous prochainement";
                      }
                    ?>
 <?php
                        }
                        $trouver->closeCursor(); // Termine le traitement de la requête
                    ?>

                    
</body>
</html>