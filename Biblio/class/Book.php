<?php

Class Book
{
    // Propriétés des livres
    public $id;
    public $type;
    public $titre;
    public $auteur;
    public $edition;
    public $description;
    public $image;
    public $parution;
    // Catégories
    public $categories;
    // Notes et commentaires
    public $commentaires;
    // Réservations
    public $reservations;


    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * récupération de toutes les informations du livre
     */
    public function getBookData()
    {
        $this->getBook();
        $this->getBookCategories();
        $this->getBookNotes();
        $this->getBookReservations();
    }

    /**
     * récupération des infos du livre
     */
    private function getBook()
    {
        global $dbh;

        $sql = 'SELECT *
                FROM `livre`
                WHERE `livre`.`id`= ?';
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($this->id));
        $livre = $stmt->fetch();

        $this->id = $livre['id'];
        $this->type = $livre['type'];
        $this->titre = $livre['titre'];
        $this->auteur = $livre['auteur'];
        $this->edition = $livre['edition'];
        $this->description = $livre['description'];
        $this->image = $livre['image'];
        $this->parution = $livre['parution'];
    }

    /**
     * récupération des catégories du livre
     */
    private function getBookCategories()
    {
        global $dbh;

        $sql = 'SELECT `categories`.`id`, `categories`.`categorie`
                FROM `livre`
                    LEFT JOIN `categoriesLivre` ON `categoriesLivre`.`idLivre` = `livre`.`id`
                    LEFT JOIN `categories` ON `categoriesLivre`.`idCat` = `categories`.`id`
                WHERE (`livre`.`id` =?)';
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($this->id));

        while ($cat = $stmt->fetch()) {
            $this->categories[] = array(
                'id' => $cat['id'],
                'nom' => $cat['categorie']
            );
        }

    }

    /**
     * récupération des notes et commentaires du livre
     */
    private function getBookNotes()
    {
        global $dbh;

        $sql = 'SELECT `notes`.*, `user`.`nom`, `user`.`prenom`, `user`.`promotion`
                FROM `user`
                    LEFT JOIN `notes` ON `notes`.`idUser` = `user`.`id`
                WHERE (`notes`.`idLivre` =?)';
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($this->id));

        while ($com = $stmt->fetch()) {
            $this->commentaires[] = array(
                'id' => $com['id'],
                'commentaire' => $com['commentaire'],
                'note' => $com['note'],
                'valide' => $com['valide'],
                'nom' => $com['nom'],
                'prenom' => $com['prenom'],
                'promotion' => $com['promotion']
            );
        }
    }

    /**
     * récupération des réservations du livre
     */
    private function getBookReservations()
    {
        global $dbh;

        $sql = 'SELECT *
                FROM `reservation`
                WHERE (`reservation`.`idLivre` =?)';
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($this->id));

        while ($resa = $stmt->fetch()) {
            $this->reservations[] = array(
                'id' => $resa['id'],
                'debut' => $resa['dateDebut'],
                'fin' => $resa['dateFin'],
                'statut' => $resa['statut']
            );
        }
    }

    public function rawDisplay()
    {
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }
}

/*


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