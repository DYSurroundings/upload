<?php

/* 
 * Contrôleur de notre application
 */

/*
 * Dépendances
 */
require_once 'm/UploadFichier.php';

// si on n'envoie pas de fichier
if(empty($_FILES)){
// rendu de la vue
echo $twig->render('formulaire.html.twig');
// fichier envoyé
}else{
    $u = UploadFichier::Upload($_FILES['monfichier']);
    if($u===true){
        echo "Fichier envoyé!";
    }
}