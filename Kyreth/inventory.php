<?php
require __DIR__ . '/inc/bootstrap.php';


<<<<<<< Updated upstream
<<<<<<< Updated upstream
$template['inv'] = $Db->query("SELECT * FROM Kyreth_inventory")->fetchAll();

$Core->renderTwig($twig, $template);
=======

renderTwig($twig, $template);
>>>>>>> Stashed changes
=======

renderTwig($twig, $template);
>>>>>>> Stashed changes
