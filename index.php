<?php
  require 'Controllers/ControllerAuthentification.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Views/css/bootstrap.min.css">
    <title>Authentification</title>
    <style>
    *{
          margin: 0;
          padding: 0;

    }
     .centre{
         width: 50%;
         margin: auto;
         background-color:rgba(128, 128, 128, 0.116);
         padding-left:2%;
         padding-right: 2%;
     }
     .vk{
         margin-top: 10px;
         margin-bottom: 20px;
     }
     .logo{
         width: 100px;
         height: 70px;
       margin-bottom: -15px;
       margin-top: 5px;
     }
     .centre figure , .centre p {
         text-align: center;
     }
     .top{
         margin-top: 25vh;
     }
     p{
         font-family: Arial, Helvetica, sans-serif;
         font-weight: bold;
         opacity: 0.7;
     }
     [for*="au"]{
        font-family: Arial, Helvetica, sans-serif;
         font-weight: bold;
         opacity: 0.7;
     }
     .error{
         color: red;
         font-variant: italic;
         text-align: center;
         display: block;
         font-family: Arial, Helvetica, sans-serif;
         font-weight: bold;
         opacity: 0.4;
     }
     .error1{
         color: red;
         font-variant: italic;
         text-align: left;
         display: block;
         font-family: Arial, Helvetica, sans-serif;
         font-weight: bold;
         opacity: 0.4;
     }
    </style>
</head>
<body>
      <div class="container">
            <div class="centre top">
               <figure>
                    <img src="Views/images/coding.png" alt="" class="logo">
               </figure>
             <p>CONNECTER-VOUS GRACE A VOTRE COMPTE</p>
              <p><?php if(!empty($resultat)) echo $resultat;?> </p>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>"method="post">
                    <label for="au">login</label>
                    <input type="text" name="login" id="" class="form-control" value=" <?php if(!empty($_POST["login"])) echo save_data($_POST["login"])?>">
                    <?php echo '<span>'.$err.'</span>'?? '';?>
                    <label for="au">Password</label>
                    <input type="password" name="pass" id="" class="form-control" value="<?php if(!empty($_POST["pass"])) echo save_data($_POST["pass"])?>">
                    <?php echo '<span>'.$err.'</span>'?? '';?>
                    <input type="checkbox" name="check" id=""> remember me <br>
                    <button class="btn btn-primary  vk" name="valide">Valider-compte</button>
                </form>
            </div>
      </div>
    
</body>
</html>