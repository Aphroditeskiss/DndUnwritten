<?php
function renderTwig($twig, $template) {
    echo $twig->render(basename($_SERVER['REQUEST_URI']). '.twig', $template);
}