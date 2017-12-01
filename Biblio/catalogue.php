<?php

include 'class/Catalog.php';
include 'class/Book.php';

$nbResults = 10;

$catalogue = new Catalog();
$catalogue->getCatalog($nbResults);

?>

<pre>
    <? print_r($catalogue->catalogue); ?>
</pre>
