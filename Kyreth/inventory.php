<?php
require __DIR__ . '/inc/bootstrap.php';


$template['inv'] = $Db->query("SELECT * FROM Kyreth_inventory")->fetchAll();

$Core->renderTwig($twig, $template);