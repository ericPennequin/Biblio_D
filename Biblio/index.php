<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 29/11/2017
 * Time: 14:16
 */

include "inc/pdo.php";  
include "header.php";
?>
   
    <div class="container page">

        <div class="col-md lastadd">
            <div class="row">
                <span>Derniers ajouts</span>
            </div>

             <!-- juste les gabarits
            <table class="table">
                <tbody>
                    <tr>
                        <th class="col2">
                            <img src="img/spongebob.jpg" alt="" style="border-style: double">
                        </th>
                        <td class="col-2">
                            <div class="row">
                                Titre : Livre
                            </div>
                            <div class="row">
                                Tags : Lorem, Lorem, Lorem
                            </div>
                            <div class="row">
                                Auteur: Lorem
                            </div>
                            <div class="row">
                                Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut vulputate lorem. Vestibulum sollicitudin
                                eros rutrum nunc ultricies, eget venenatis nisl imperdiet. Aenean tortor orci, bibendum et
                                ultrices nec, ornare id libero. Nullam pretium volutpat.
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table">
                <tbody>
                    <tr>
                        <th class="col2">
                            <img src="img/spongebob.jpg" alt="" style="border-style: double">
                        </th>
                        <td class="col-2">
                            <div class="row">
                                Titre : Magazine
                            </div>
                            <div class="row">
                                Tags :Lorem
                            </div>
                            <div class="row">
                                Parution: 01-01-17
                            </div>
                            <div class="row">
                                Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut vulputate lorem. Vestibulum sollicitudin
                                eros rutrum nunc ultricies, eget venenatis nisl imperdiet. Aenean tortor orci, bibendum et
                                ultrices nec, ornare id libero. Nullam pretium volutpat.
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            -->



            <?php
            //fonction qui récupère les x ($x) derniers livres et les infos correspondantes et les affiches:
                
                $nbre_livre = 3; // nombre de livres à afficher

                // on boucle autant de fois qu'on veut de livres
                for ($i = 0; $i < $nbre_livre ; $i++)
                {

                    // on va chercher les informations qui nous interesse dans la base
                    global $dbh;

                    $sql = 'SELECT L.titre, L.auteur, L.description, L.image, L.parution, L.type from livre as L ORDER BY id DESC LIMIT '.$i.',1';    
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute();
        
                    $livre = $stmt->fetch();

                    // on boucle dans le tableau de résultat pour assigner les infos dans les variables correspondantes
                    foreach ($livre as $key => $value)
                    {
                        if ($key == "titre")
                        {
                            $titre = $value;
                        }
                        else if ($key == "auteur")
                        {
                            $auteur = $value;
                        }
                        else if ($key == "description")
                        {
                            $description = $value;
                        }
                        else if ($key == "image")
                        {
                            $image= $value;
                        }
                        else if ($key == "parution")
                        {
                            $parution = $value;
                        }
                        else if ($key = "type")
                        {
                            $type = $value;
                        }
                    }

                    // idem précédemment mais on récupère seulement la catégorie
                    global $dbh;
                    
                    $sql = 'SELECT C.categorie FROM categories AS C JOIN categoriesLivre as CL ON C.id = CL.idCat WHERE CL.idCat = (SELECT CL.idCat from categoriesLivre as CL JOIN livre as L ON CL.idLivre = L.id where CL.idlivre = (SELECT L.id from livre as L ORDER BY L.id DESC LIMIT '.$i.',1)) LIMIT 1';    
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute();
        
                    $res = $stmt->fetch();
                    $categorie = $res[0];
                    
                    // on affiche les infos dans le container en fonction de si c'est une revue ou un livre 
                    if ($type == "revue")
                    {
                        echo "<table class='table'>";
                        echo "    <tbody>";
                        echo "        <tr>";
                        echo "            <th class='col2'>";
                        echo "                <img src='img/".$image."' width='100'>";
                        echo "            </th>";
                        echo "            <td class='col-2'>";
                        echo "                <div class='row'>";
                        echo "                    Titre : ". $titre;
                        echo "                </div>";
                        echo "                <div class='row'>";
                        echo "                    Tags : ". $categorie;
                        echo "                </div>";
                        echo "                <div class='row'>";
                        echo "                    Parution: ".$parution;
                        echo "                </div>";
                        echo "                <div class='row'>";
                        echo "                    Description : ". $description;
                        echo "                </div>";
                        echo "            </td>";
                        echo "        </tr>";
                        echo "    </tbody>";
                        echo "</table>";
                    }
                    else if ($type == "livre")
                    {
                        echo "<table class='table'>";
                        echo "    <tbody>";
                        echo "        <tr>";
                        echo "            <th class='col2'>";
                        echo "                <img src='img/".$image."'>";
                        echo "            </th>";
                        echo "            <td class='col-2'>";
                        echo "                <div class='row'>";
                        echo "                    Titre : ". $titre;
                        echo "                </div>";
                        echo "                <div class='row'>";
                        echo "                    Tags : ".$categorie;
                        echo "                </div>";
                        echo "                <div class='row'>";
                        echo "                    Auteur: ".$auteur;
                        echo "                </div>";
                        echo "                <div class='row'>";
                        echo "                    Description : ". $description;
                        echo "                </div>";
                        echo "            </td>";
                        echo "        </tr>";
                        echo "    </tbody>";
                        echo "</table>";
                    }
            
                
                }
                


                
            ?>


        </div>




    </div>






    <?php
include "footer.php";
?>