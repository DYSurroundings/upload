<?php

/**
 * Description of UploadFichier
 *
 * @author webform
 */
class UploadFichier {

    // Attributs
    private static $extensions = [".doc", ".odt", ".pdf", ".txt", ".jpg", ".gif", ".png"];
    private static $chemin = "v/upload/";
    private static $nouveauNomFichier;
    private static $taille;
    private static $extFichier;

    // Constantes
    const TAILLEMAX = 100000000; // +- 100 mio

    // méthodes

    public static function Upload(Array $fichier) {
        // si pas d'erreurs
        if ($fichier['error'] == 0) {
            // var_dump($fichier);
            // si extension valide    
            if (self::VerifExtend($fichier['name'])) {
                // si le fichier n'est pas trog grand 
                if (self::VerifTaille($fichier['size'])) {
                    // création du nouveau nom de fichier
                    self::$nouveauNomFichier = self::NouveauNom();
                    // on essaye d'envoyer physiquement le fichier
                    if(move_uploaded_file($fichier['tmp_name'], self::$chemin.self::$nouveauNomFichier)){
                        return true;
                    }else{
                        echo "Erreur inconnue lors du transfert";
                    }
                } else {
                    echo "fichier trop lourd! " . self::$taille . " sur " . self::TAILLEMAX . " autorisée!";
                }
            } else {
                echo "extension non valide";
            }
        } else {
            echo "Erreur inconnue lors du transfert";
        }
    }

    private static function VerifExtend($nomOrigine) {
        $string = strrchr($nomOrigine, "."); // on récupère l'extension avec le dernier .
        $ext = strtolower($string); // on met la chaine en minuscule
        // si l'extension est dans le tableau
        if (in_array($ext, self::$extensions)) {
            // on remplit l'attribut
            self::$extFichier = $ext;
            return true;
        } else {
            return false;
        }
    }

    private static function VerifTaille($taille) {
        self::$taille = $taille;
        if($taille>self::TAILLEMAX){
            return false;
        }else{
            return true;
        }
    }
    private static function NouveauNom() {
        $sortie = date("YmdHis"); // format datetime sans séparateur
        $hasard = mt_rand(10000, 99999);
        return $sortie."_".$hasard.self::$extFichier;
    }
    public static function AfficheDossier() {
        // doit renvoyer tout ce qu'il y a dans le dossier
        return "lala.jpg, lulu.gif";
    }

}
