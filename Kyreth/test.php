<?php
require_once __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Tell Twig where templates live
$loader = new FilesystemLoader(__DIR__ . '/templates');

// Create Twig environment
$twig = new Environment($loader, [
    'cache' => false, // set to a cache directory in production
]);

// Render the template
echo $twig->render('test.twig', [
    'title' => 'Hello World',
    'name'  => 'Twig',
]);