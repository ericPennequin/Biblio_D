<?php

include 'inc/pdo.php';

/* Variables temporaires pour le dev */
$PATH = 'http://54.36.182.179/groupe_D';
if (isset($_GET['livre']) && !empty($_GET['livre']))
    $idLivre = $_GET['livre'];
else
    $idLivre = 1;
$sql = '
  SELECT `Livre`.*, `Reservation`.*
  FROM `Livre`
  LEFT JOIN `Reservation` ON `Reservation`.`IdLivre` = `Livre`.`Id`
  WHERE `Livre`.`Id`= ?';
$stmt = $dbh->prepare($sql);
$stmt->execute(array($idLivre));
//$rep = $dbh->query($sql);
$livre = $stmt->fetch();

/* Contenu de la table livre :
- id (int)
- Titre
- Auteur
- Edition
- Description
- Image
- Parution
- Type (livre/revue)
*/

?>


<!-- À supprimer -->
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/details.css">
</head>
<body>

<img style="width: 100px;" src="<?= $PATH ?>/img/<?= $livre['Image'] ?>"/>
<pre>
<? print_r($livre); ?>
</pre>

</body>
</html>