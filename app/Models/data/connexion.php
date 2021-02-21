<?php
/**
 * nous avons creer une fonction getpdo pour nous retourner l'objet pdo 
 *
 * @return PDO
 */
function getPdo(){
     /**
      * gestion d'erreur avec catch , il est bon losque vous faite une connexion avec votre base de données 
      *veuillez  toujours utiliser une gestion d'erreur
      */
     try{
        $pdo=new PDO("mysql:host=localhost;dbname=compte","root",""); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
     }
     catch(PDOException $e){
        //message d'erreur au cas  ou la base de données n'a pas marcher
         die("erreur de la connexion de base de données".$e->getMessage());
     }
   return $pdo;
}