<?php
require_once '../app/boot/prepare_DB.php';

if(isset($_POST['name'])){
 $_SESSION['name'] = $_POST['name'];
 $_SESSION['surname'] = $_POST['surname'];
 $_SESSION['username'] = $_POST['username'];

 $name2 = $_POST['name'];
 $surname2 = $_POST['surname'];
 $username2 = $_POST['username'];

 $t = 0;

//echo "$name2, $surname2, $username2";

 $sifra = password_hash($_POST['pass'], PASSWORD_DEFAULT);

 $sql = "SELECT * FROM dionicari";
 try {
     $stmt = $db->query($sql);
     $result = $stmt->setFetchMode(PDO::FETCH_NUM);
     while ($row = $stmt->fetch()) {
        if($username2 == $row[0]) {
        $_SESSION['message'] = 'Korisničko ime zauzeto, pokušajte ponovo.';
        $t = 1;
        }
      }
    if($t == 0) {
       $sql = "INSERT INTO dionicari (username, password, ime, prezime, kapital) "
           . "VALUES ('$username2','$sifra','$name2','$surname2', '10000')";
       if ( $db->query($sql) ){
          header("location: uspjeh.php");
       }
       else {
          $_SESSION['message'] = 'Registracija nije uspjela, molimo pokušajte ponovo.';
       }
    }
//echo "Ubacio korisnika u tablicu dionice.<br />";
}
catch (PDOException $e) {
  print $e->getMessage();
}
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href='css/registracija.css' />
    <title></title>
  </head>
  <body>
    <form action="registracija.php" method="post">
      <div class="reg_prav">
        <table>
            <tr>
               <td> <label for=""> Ime: </label> </td>
               <td> <input type="text" name="name" required/> </td>
            </tr>
            <tr>
                <td>  <label for=""> Prezime: </label> </td>
                <td> <input type="text" name="surname" required /> </td>
            </tr>
            <tr>
                <td> <label for=""> Korisničko ime: </label> </td>
                <td> <input type="text" name="username" required /> </td>
            </tr>
            <tr>
                <td> <label for=""> Lozinka: </label> </td>
                <td>  <input type="password" name="pass" required /> </td>
            </tr>
            <tr>
                <?php   if(isset($_SESSION['message']))   echo $_SESSION['message']; ?>
            </tr>
        </table>
            <button class ="button" type="submit" name="registracija" value="poslano">
            Potvrdi </button>

      </div>
    </form>
  </body>
</html>
