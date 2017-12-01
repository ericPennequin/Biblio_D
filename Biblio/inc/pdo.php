<?php
/* Connexion à la base de donnée */

$host = '54.36.182.179';
$dbname = 'groupe_D';
$username = 'cdi';
$passwd = 'cdi2017';

try {
    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $username, $passwd);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}