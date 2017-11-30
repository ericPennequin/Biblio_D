<?php

$host = '54.36.182.179';
$dbname = 'groupe_D';
$username = 'cdi';
$passwd = 'cdi2017';

try {
    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $username, $passwd);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$sql = 'SELECT * FROM Livre';

foreach ($dbh->query($sql) as $row) {
    echo '<pre>' . $row . '</pre>';
}


?>

<div>oh</div>
