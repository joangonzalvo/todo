<?php
    session_start();
    include 'cabecera.php';
    include 'con.php';//inclueix el fitxer de connexió a la base de dades.

    $myuser=$_SESSION['usuari']['user'];
    try{
    if(isset($_POST)&&
    !empty($_POST['taskname'])&&
    !empty($_POST['description']))
    {
      $taskname=htmlspecialchars($_POST['taskname']);
      $description=htmlspecialchars($_POST['description']);
      //Afegeix el nom de la tasca i descripció

      $myInsert = ('INSERT INTO mylist (user, taskname, description, completed) VALUES ("'.$myuser.'","'.$taskname.'","'.$description.'","0")');
      //Inserta en la llista el usuari (el que está utilizant l'aplicació), la tasca i descripcio que s'han definit al formulari i per defecte que la tasca no esta completada.


      if (!$con->query($myInsert)) {
      echo "Error a la creació de tasca";
      //Si falla mostrará aquest error
        }else{
            header('Location: mylist.php');
            //Si s'ha creat, es tornará a la llista todo, on mostrará també la nova tasca.
        }

    }
  }catch(Exception $e){
    echo 'Error '.$e->getMessage();
  }
   ?>
      <h2>Registre de nou usuari</h2>
      <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <p>Task name: <input type="text" name="taskname"></p>
        <p>Description: <input type="text" name="description"></p>
        <input type="submit" name="" value="Register new task">
      </form>
  <?php include 'pie.php';//añade el pie
   ?>
