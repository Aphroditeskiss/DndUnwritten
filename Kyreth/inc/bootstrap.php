<?php
SESSION_START();

require_once __DIR__ . '/classes.inc.php';
require_once __DIR__ . '/functions.php';

// twig setup
require_once __DIR__ . '/../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Load templates directory
$loader = new FilesystemLoader(__DIR__ . '/../templates');

// Create Twig instance
$twig = new Environment($loader, [
    'cache' => false, // change to a path in production
]);

// Global template variables
$template = [
    'page' => basename($_SERVER['REQUEST_URI']),
];