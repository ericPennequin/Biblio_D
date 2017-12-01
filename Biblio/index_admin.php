<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 29/11/2017
 * Time: 14:16
 */
$title ="accueil";
include "header.php";
?>
<div class="container page">
    <div class="container evenement">
        <div class="row">
            <table class="table table-striped table-bordered table-hover evenement">
            <caption>Evênements Livres</caption>
            <thead>
                <tr>
                <th class="col-md-3">Titre</th>
                <th class="col-md-3">Auteur</th>
                <th class="col-md-2">Emprunteur</th>
                <th class="col-md-2">Disponible dans</th>
                <th class="col-md-2">Retour</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>###</td>
                <td>###</td>
                <td>###</td>
                <td>###</td>
                <td class="bg-dark"><button class="btn btn-primary">Déclarer retour</button></td>
                </tr>
                <tr>
                <td>###</td>
                <td>###</td>
                <td>###</td>
                <td>###</td>
                <td class="bg-dark"><button class="btn btn-primary">Déclarer retour</button></td>
                </tr>
            </tbody>
            </table>
        </div>

    </div>
</div>



<?php
include "footer.php";
?>