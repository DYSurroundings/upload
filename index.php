<?php

/*
 * Contrôleur frontal
 */


// chargement des bibliothèques externes (chargées par composer) pour twig
require_once 'vendor/autoload.php';

// création du loader twig
$loader = new Twig_Loader_Filesystem('v');
$twig = new Twig_Environment($loader/*, array(
    'cache' => 'cache',
)*/);

// appel du contrôleur
require_once 'c/uploadController.php';

