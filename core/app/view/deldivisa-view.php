<?php

$divisa = Divisadata::getById($_GET["id"]);
$divisa->del();
Core::redir("./index.php?view=divisas");


?>