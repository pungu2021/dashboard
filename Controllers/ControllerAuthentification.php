<?php
use app\Models\Autoload;
use app\Models\data\Authentification;

//inclusion  de notre fichier Autoload qui contient une classe Autoload , qui va nous aider pour l'auto-chargement de claases 
require dirname(__DIR__).DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Autoload.php';
/**
 * ici nous appellons la fonction de chargement qui est la fonction static de la classe Autoload
 */
Autoload::Chargement_classe();
$objet=new Authentification();
/**
 * nous verifions les données s'il existe dans les cookie , si oui on le dirige vers le fichier accueil sans 
 * pourtant passer par la partie authentification
 */
if(isset($_COOKIE["login_coding"])&& isset($_COOKIE["pass_coding"])&& !empty($_COOKIE["login_coding"])&&  !empty($_COOKIE["pass_coding"])){
    $objet->verifiacation_compte_admin($_COOKIE["login_coding"],$_COOKIE["pass_coding"]);
}
$err=null;
$resultat=null;
if(isset($_POST["valide"])){
/**
 * nous verifions les données envoyer par le formulaire 
 */
  if(isset($_POST["login"],$_POST["pass"])&& !empty($_POST["login"])&& !empty($_POST["pass"])){
         if(isset($_POST["check"])&& !empty($_POST["check"])){
            $resultat= $objet->verifiacation_compte_admin($_POST["login"],$_POST["pass"],$_POST["check"]); 
         }
         else{
            $resultat= $objet->verifiacation_compte_admin($_POST["login"],$_POST["pass"]); 
         }
  }
  // s'il n 'a pas remplir tous les champs , il aura une erreur qui s'affiche en rouge qui dit veuillez remplic...
  else{
    $err='<span class="error1"> veuillez remplir ce champs</span>';
  }
}
 // sauvegarde des données du formulaire dans leurs meme champs de saisi 
 function save_data($val){
    if(isset($val)&& !empty($val))
     return $val; 
     else 
       return'';
 }