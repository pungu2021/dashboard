<?php
 namespace app\Models\data;
 require 'connexion.php';
 class Authentification {
    
        function verifiacation_compte_admin($login,$mot_passe,$remember=null){
           if(isset($login,$mot_passe) ){
               /**
                * verification des donnéeq envoyé par le formulaire , pour une meilleure facons de sécurisé 
                *nos données 
                */
               $login=htmlspecialchars(trim(strip_tags($login)));
               $mot_passe=htmlspecialchars(trim(strip_tags($mot_passe)));
               //ici nous avons fait appeller à la fonction getpdo() qui nous renvoi un objet pdo 
               $pdo=getPdo();
               $req=$pdo->prepare("SELECT * FROM Admin_compte WHERE login_admin=? and password_admin=?");
               $req->execute(array($login,$mot_passe));
               if($req->rowCount()!=0){
                      if($remember=="on" && !empty($remember)){
                          setcookie("login_coding",$login,time()+31*24*60*60, null,null,false, true);
                          setcookie("pass_coding",$mot_passe,time()+31*24*60*60, null,null,false, true);
                          header("location:Views/accueil.php");
                      }
                      else if(isset($_COOKIE["login_coding"])&& isset($_COOKIE["pass_coding"])&& !empty($_COOKIE["login_coding"])&&  !empty($_COOKIE["pass_coding"])){
                        header("location:Views/accueil.php");
                      }
                      else{
                     header("location:Views/accueil.php?login=$login&pass=$mot_passe");
                      }
               }
               else{
                   $req=$pdo->prepare("SELECT * FROM Admin_compte WHERE login_admin=? or password_admin=?");
                   $req->execute(array($login,$mot_passe));
                   if($req->rowCount()!=0){
                         $req=$pdo->prepare("SELECT * FROM Admin_compte WHERE login_admin=? ");
                         $req->execute(array($login));
                         if($req->rowCount()!=0){
                            return '<span class="error">votre  mot de passe n\'est pas correct </span>';
                       }
                       else{
                        return '<span class="error">votre login n\'est pas  correct </span>';
                       }
                   }
                   else{
                         return '<span class="error">Le compte que vous voulez acceder n\'existe pas </span>';
                   }
               }
           }
        }
    }