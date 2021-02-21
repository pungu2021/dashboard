<?php
session_start();
if(isset($_GET["login"])&& !empty($_GET["login"]) && isset($_GET["pass"])&& !empty($_GET["pass"])){
    $_SESSION["login_coding"]=$_GET["login"];
    $_SESSION["pass_coding"]=$_GET["pass"];
}
else if(isset($_COOKIE["login_coding"])&& isset($_COOKIE["pass_coding"])&& !empty($_COOKIE["login_coding"])&&  !empty($_COOKIE["pass_coding"])){
    $_SESSION["login_coding"]=$_COOKIE["login_coding"];
    $_SESSION["pass_coding"]=$_COOKIE["pass_coding"];
}
else{
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h1>accueil</h1>
</body>
</html>