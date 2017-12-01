<?php

include 'class/Book.php';

/* Variables temporaires pour le dev */
if (isset($_GET['livre']) && !empty($_GET['livre']))
    $idLivre = $_GET['livre'];
else
    $idLivre = 1;

$details = new Book($idLivre);
$details->getBookDetails();

if (isset($details->id) || !empty($details->id))
    echo "ok";
else
    echo "erreur";

?>


<!-- À supprimer -->
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/details.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/popper.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
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

<button class="reservation btn btn-primary" data-book="<?= $details->id?>" id="reserver" data-toggle="modal" data-target="#modal-reservation" type="button">Réserver</button>

<!-- Modal de réservation -->
<div class="modal fade" id="modal-reservation" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Réservation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Réserver</button>
                <button type="button" class="btn btn-lg btn-default-outline" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</body>
</html>