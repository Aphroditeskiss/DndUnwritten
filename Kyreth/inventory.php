<?php
require __DIR__ . '/inc/bootstrap.php';


$template['inv'] = $Db->query("SELECT * FROM Kyreth_inventory")->fetchAll();

<<<<<<< Updated upstream
$Core->renderTwig($twig, $template);
=======
$Core->renderTwig($twig, $template);
>>>>>>> Stashed changes
