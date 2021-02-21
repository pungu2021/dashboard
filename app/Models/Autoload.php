<?php

namespace app\Models;
class Autoload{
   static function auto($class){
       /*ici nous remplacons le namespace courant par de vide pour avoir le chemin sur nos classe
        ou fichiers qui contient nos classe */
    $class= str_replace(__NAMESPACE__.'\\','',$class);
    /*
    ici nous remplacons les anti-slaches par des slaches pour avoir un chemin logique 
     */ 
    $class= str_replace('\\','/',$class).'.php';
      // ici nous avons inclure  le fichier qui contient notre classe ou nos classes
      require $class;
    }
    /**
     * rechargement autoload des classes 
     *
     * @return void
     */
   static function Chargement_classe(){
       /*appellation de la fonction php spl_autoload_register nous avons passer en paramettre constant magic 
       __CLASS__ et la fonction qu'elle va appeler auto */  
       spl_autoload_register([__CLASS__,'auto']) ;
   } 
}