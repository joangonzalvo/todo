<?php
  session_start();
  include 'cabecera.php';//añade cabecera en el html.
  include 'con.php';//inclueix el fitxer de connexió a la base de dades.

  try{
  if(isset($_POST)&&
  !empty($_POST['name'])&&
  !empty($_POST['email'])&&
  !empty($_POST['user'])&&
  !empty($_POST['password'])&&
  !empty($_POST['password2'])&&
  $_POST['password']==$_POST['password2'])
  {
    $name=htmlspecialchars($_POST['name']);
    $email=htmlspecialchars($_POST['email']);
    $user=htmlspecialchars($_POST['user']);
    $password=htmlspecialchars($_POST['password']);

    $myInsert = ('INSERT INTO users (name, user, password, mail) VALUES ("'.$name.'","'.$user.'","'.$password.'","'.$email.'")');
    //$resultado = $con->query($myInsert);

    if (!$con->query($myInsert)) {
    //echo "Falló la creación del usuario: (" . $con->errno . ") " . $con->error;
    echo "Error a la creació d'usuari";
      }else{
          header('Location: ../index.php');
      }

  }
}catch(Exception $e){
  echo 'Error '.$e->getMessage();
}
 ?>
    <h2>Registre de nou usuari</h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
      <p>Nom: <input type="text" name="name"></p>
      <p>Email: <input type="email" name="email"></p>
      <p>Usuari: <input type="text" name="user"></p>
      <p>Pasword: <input type="password" name="password"></p>
      <p>Repeat password: <input type="password" name="password2"></p>
      <input type="submit" name="" value="Registra't!">
    </form>
    <form action="../index.php" method="post">
      <input type="submit" name="" value="Tornar a index">
    </form>
<?php include 'pie.php';//añade el pie
 ?>
