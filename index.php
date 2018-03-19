<?php
require_once __DIR__.'/app/boot/prepare_DB.php';

session_start();
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./view/css/burza.css" />
    <title></title>
  </head>
  <?php
    header("location: ./view/burza.html");
   ?>
  <body>
	<?php if(isset($_SESSION['message']))   echo $_SESSION['message']; ?>
  </body>
</html>
