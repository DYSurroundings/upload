<?php

/*
 * Contrôleur frontal
 */


// chargement des bibliothèques externes (chargées par composer) pour twig
require_once 'vendor/autoload.php';

// création du loader twig
$loader = new Twig_Loader_Filesystem('v');
$twig = new Twig_Environment($loader, array(
    'cache' => 'cache',
));

// rendu de la vue
echo $twig->render('base.html.twig');