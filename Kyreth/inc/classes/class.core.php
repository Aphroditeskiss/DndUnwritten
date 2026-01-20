<?php

class Core {
    protected $db;

    public function __construct() {
        $this->db = Database::instance();
    }
    
    public function renderTwig($twig, $template) {
        echo $twig->render(basename($_SERVER['REQUEST_URI']). '.twig', $template);
    }
}