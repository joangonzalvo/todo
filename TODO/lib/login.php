<?php
    session_start();
    include 'cabecera.php';
    include 'con.php';//inclueix el fitxer de connexió a la base de dades.

    try{
    if(isset($_POST)&&
    !empty($_POST['user'])&&
    !empty($_POST['password']))
    {
      $pass=$_POST['password'];
      $user=$_POST['user'];

      $resultado = $con->query('SELECT * FROM users');
      $cont=0;
      $arrayUsers=array();
      while($array_data = $resultado->fetch_array()){
        //var_dump($array_data);
        /*L'arrayUsers guarda els valors de l'array_data, es fa perque
        el $array_data no guarda els valors, pero si que troba tots els
        usuaris, així que mentre els recorre, s'anirán guardan en un
        altre array, en aquests cas en $arrayUsers*/
        $arrayUsers[$cont]=$array_data;
        $cont++;
      }
      //echo "<br>";
      //echo $arrayUsers[1]['name'];
      //die; //^ comprobar que agafa bé les variables


      for ($i=0; $i < count($arrayUsers); $i++) {//revisa tots els usuaris guardats a l'array
        if($arrayUsers[$i]['user'] == $user){//si l'usuari revisat existeix
          if($arrayUsers[$i]['password'] == $pass){//i la seva password es correcte
            //guardem en la variable de sessio "usuari" l'user, es l'unic que necesito per mostrar la llista todo
            $_SESSION['usuari']['user']=$user;
            $flagUser=1;
          }
        }
      }
      if($flagUser==0){//En cas de que l'usuari NO s'hagi trobat o pass incorrecta
        echo 'User dont exists or password is wrong';
      }else{//en cas de que si s'hagi trobat usuari i la pass sigui correcta
        //redireccionar a llista
        header('Location: mylist.php');
      }

    }
    }catch(Exception $e){
    echo 'Error '.$e->getMessage();
    }


?>

<h2>Log in</h2>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
  <p>Usuari: <input type="text" name="user"></p>
  <p>Password: <input type="password" name="password"></p>
  <input type="submit" name="" value="Conecta">
</form>


<?php include 'pie.php';
?>
