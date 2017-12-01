<?php

include 'inc/pdo.php';
include 'class/Book.php';

/* Variables temporaires pour le dev */
if (isset($_GET['livre']) && !empty($_GET['livre']))
    $idLivre = $_GET['livre'];
else
    $idLivre = 1;

$details = new Book($idLivre);
$details->getBookData();

if (isset($details->id) || !empty($details->id))
    echo "ok";
else
    echo "erreur";

?>


<!-- À supprimer -->
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/details.css">
</head>
<body>

<img style="width: 100px;" src="img/<?= $details->image ?>"/>
<pre>
<? //$details->rawDisplay(); ?>
</pre>


id : <?= $details->id ?><br/>
type : <?= $details->type ?><br/>
titre : <?= $details->titre ?><br/>
auteur : <?= $details->auteur ?><br/>
edition : <?= $details->edition ?><br/>
description : <?= $details->description ?><br/>
image : <?= $details->image ?><br/>
parution : <?= $details->parution ?><br/>
categories : <?
foreach ($details->categories as $categorie)
    echo $categorie['nom'] . ' (' . $categorie['id'] . '), ';
?><br/>
commentaires (<?= count($details->commentaires) ?>) : <br/><?
$nbNotes = count($details->commentaires);
$total = 0;
$moyenne = 0;
if ($nbNotes > 0) {
    $moyenne = $total / $nbNotes;
    foreach ($details->commentaires as $commentaire) {
        $total += $commentaire['note'];
        echo '- (' . $commentaire['id'] . ') ' . $commentaire['prenom'] . ' ' . $commentaire['nom']
            . ' (' . $commentaire['promotion'] . ') : ' . $commentaire['commentaire']
            . ' (' . $commentaire['note'] . '/5) - ' . $commentaire['valide'] . '<br/>';
    }
}
?>
réservations (<?= count($details->reservations) ?>) : <br/><?
if (count($details->reservations) > 0) {
    foreach ($details->reservations as $reservation)
        echo '- du ' . $reservation['debut'] . ' au ' . $reservation['fin']
            . ' (statut : ' . $reservation['statut'] . ')<br/>';
}
?>
note globale : <?= $moyenne ?>

<button class="reservation" data-book="<?= $details->id?>" id="reserver">Réserver</button>
</body>
</html>