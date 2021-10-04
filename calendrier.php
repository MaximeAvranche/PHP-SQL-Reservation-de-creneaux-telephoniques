<?php
  include 'includes/db.php';
  $compte = $db->query('SELECT COUNT(*) AS id FROM reservation WHERE etat=1');
  while ($res = $compte->fetch()) {
    $oki = $res['id'];
  }


    if (isset($_POST['rechercher'])) {
      $tel = $_POST['tel'];
    }

    if ($oki < 1) {
        $message = "<em>Aucun créneau disponible pour le moment.</em>";
    }
    else if ($oki >= 1) {
      $message = NULL;
    }


?>
<!DOCTYPE html>
<html>
<head>
  <title>Date</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <h1><i class="fa fa-phone"></i> Rendez-vous téléphonique</h1>
                    <h4>Créneaux disponibles :</h4>
                    <?php echo $message; ?>
  <?php
                  $affichage = $db->query('SELECT * FROM reservation WHERE etat=1');
                  while ($donnees = $affichage->fetch())
                    { 
                      $idD = $donnees['id'];
                                          ?>
<i class="fa fa-calendar"></i> <?php echo $donnees['date']; ?> - <a href="reserver.php?id=<?php echo $idD; ?>">Réserver</a><br /><br />
<?php
                        }
                        $affichage->closeCursor(); // Termine le traitement de la requête
                    ?>
<hr />
<form method="POST" action="trouver.php">
  <legend>Votre numéro de téléphone</legend>
  <input type="text" name="tel" placeholder="0123456789">
  <button class="fa fa-search" name="rechercher">Trouver ma réservation</button>
</form>
<i class="fa fa-info-circle"></i> Tous les créneaux sont de 30 minutes.
</body>
</html>