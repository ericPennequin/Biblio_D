<?php

include 'inc/pdo.php';

class Catalog
{
    public $catalogue;

    public function __construct()
    {
        $this->catalogue;
    }

    public function getCatalog($n) {
        $this->getCatalogList($n);
    }

    private function getCatalogList($n) {
        global $dbh;

        $sql = 'SELECT `livre`.*
                FROM `livre`
                ORDER BY `livre`.`id` DESC
                LIMIT '.$n;

        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $livres = array();

        while ($livre = $stmt->fetch()) {
            $book = new Book($livre['id']);
            $book->getBookDetails();
            $livres[] = $book;
        }


        $this->catalogue = $livres;
    }
}