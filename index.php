<?php 
      include 'includes/config.php';
      include 'includes/db.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title><?= $nomsite; ?> - Rendez-vous téléphoniques</title>
    <META NAME="TITLE" CONTENT="Prestarvor - Réservations téléphoniques">
    <META NAME="DESCRIPTION" CONTENT="Ce site web permet de prendre vos rendez-vous téléphoniques pour contacter un membre de Prestarvor.">
    <META NAME="AUTHOR" CONTENT="PRESTARVOR">
    <META NAME="REPLY-TO" CONTENT="contact@prestarvor.com">
    <META NAME="LANGUAGE" CONTENT="FR">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Fichiers CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- Fichier ICONS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="header">
  <h1><i class="fa fa-phone"></i> Rendez-vous téléphoniques</h1>
  <p><em><?php
date_default_timezone_set('Europe/Paris');
// --- La setlocale() fonctionnne pour strftime mais pas pour DateTime->format()
setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK
// strftime("jourEnLettres jour moisEnLettres annee") de la date courante
echo "Aujourd'hui nous sommes le ", strftime("%A %d %B %Y"), '.';
?></em></p>
</div>

<div class="row">
  <div class="side">
    <h2>Mes réservations</h2>
      <form method="POST" action="trouver.php">
        <legend>Votre numéro de téléphone</legend>
        <input type="text" name="tel" placeholder="0123456789">
        <button class="fa fa-search button" id="button1" name="rechercher">Trouver ma réservation</button>
      </form>
  </div>
  <div class="main">
    <h2>Créneaux disponibles </h2>
      <div style="overflow-x:auto;">
        <table>
              <tr>
                <th><i class="fa fa-calendar"></i> Dates</th>
                <th><i class="fa fa-check-square-o"></i> Action</th>
              </tr>
               <?php
                  $affichage = $db->query('SELECT * FROM reservation WHERE etat=1');
                  while ($donnees = $affichage->fetch())
                    { 
                      $idD = $donnees['id'];
                                          ?>
              <tr>
                <td><?php echo $donnees['date']; ?></td>
                <td><a href="reserver.php?id=<?php echo $idD; ?>">Réserver</a></td>
              </tr>
              <?php
                        }
                        $affichage->closeCursor(); // Termine le traitement de la requête
                    ?>
        </table>
      </div>
  </div>
</div>

<div class="about-section">
  <h1><i class="fa fa-info-circle"></i> INFORMATIONS</h1>
  <p>Les créneaux horaires proposés durent 30 minutes chacun.</p>
</div>


<div class="footer">
  <h2>Footer</h2>
</div>

</body>
</html>