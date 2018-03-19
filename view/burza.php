<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/burza.css" />
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  </head>
  <?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['login'])){

        require_once 'profil.html';

      }
      if(isset($_POST['register'])){
         header("location: registracija.php");
      }
  }
   ?>
  <body>
    <h1 style="color: #00264d"> Dobrodošli!</h1>
    <form action="burza.php" method="post">
     <div class="prav">
           <label for="label_ime">Korisničko ime </label> <br>
           <input type="text" name="korisnik" id="korisnik" > <br/>
           <label for="label_sifra">  Lozinka </label> <br>
           <input type="password" name="sifra" id="sifra" > <br/>
           <button type="submit" class="button" name="login" id="login">Prijava</button>
           <button type="submit" class="button" name="register" id="register">Registracija</button> <br/>
           <br/>
     </div>
    </form>
  </body>
</html>
