<?php
    session_start();
    include 'cabecera.php';
    include 'con.php';//inclueix el fitxer de connexió a la base de dades.

    $myuser=$_SESSION['usuari']['user'];
    //$myuser='brillaix';//Per comprobar que funciona amb usuari creat
    echo "<h2>List from: $myuser</h2>
    <form action='../index.php' method='post'>
      <input type='submit' name='' value='desconectar'>
    </form>";
    //formulari per tornar al index.

    $resultado = $con->query("SELECT * FROM mylist WHERE user='$myuser'"); // troba la llista del usuari
    $cont=0;
    $arrayTasks=array();//arayTask guarda totes les tasques que siguin de l'usuari que ha iniciat sessio
    while($array_data = $resultado->fetch_array()){
      $arrayTasks[$cont]=$array_data;
      $cont++;
    }
    //var_dump($arrayTasks);

    //CREACIÓ DE LA TAULA:
    echo "<table><tr><th>Task number</th><th>Task name</th><th>Description</th><th>Completed</th></tr>";
    echo "<tr><th>---</th><th>---</th><th>---</th><th>---</th></tr>";
    for ($i=0; $i < count($arrayTasks); $i++) {//revisa totes les tasques guardades a l'array
      $thisTask=$arrayTasks[$i]['taskname'];
      $thisDesc=$arrayTasks[$i]['description'];
      $thisComplet=$arrayTasks[$i]['completed'];
      if($thisComplet==0){
        $thisComplet="No";
      }else{$thisComplet="Yes";}
      echo "<tr><th>$i</th><th>$thisTask</th><th>$thisDesc</th><th>$thisComplet</th></tr>";
      //Imprimeix per pantalla les tasques.
    }
    echo "<tr><th></th>
    <th>
    <form action='newTask.php' method='post'>
      <input type='submit' name='' value='New Task'>
    </form>
    </th></tr>";
    echo "</table>";
    //Finalitza el formulari i afegeix un imput per poder crear noves tasques.

?>


<?php include 'pie.php';
?>
