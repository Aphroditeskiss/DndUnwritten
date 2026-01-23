<?php

class Core {
<<<<<<< Updated upstream
    protected $db;

    public function __construct() {
        $this->db = Database::instance();
    }
    
    public function renderTwig($twig, $template) {
        echo $twig->render(basename($_SERVER['REQUEST_URI']). '.twig', $template);
=======
    protected static $instance;

    public function __construct() {
        
    }

    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function render() {
        echo $twig->render(basename($_SERVER['REQUEST_URI']). '.twig', $template)
>>>>>>> Stashed changes
    }
}