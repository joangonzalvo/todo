<?php
  session_start();
    //no s'afegeix include de capçalera per poder definir bé la css.
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>TODO LIST</title>
    <link href="lib/style/estil.css" rel="stylesheet">
  </head>
  <body>
    <h1>TO-DO LIST!</h1>
    <ul>
      <li><a href="lib/login.php">Log in</a></li>
      <li><a href="lib/registre.php">Registre usuari</a></li>
    </ul>
<?php include 'lib/pie.php';//añade el pie
 ?>
