<?php
  /*Keeping ID tiket*/
  $matricola = $_POST['matricola'];

  function get_out(){
    echo "<button name= 'out' onclick= location.href= 'https://estateinmusica.altervista.org/negozio'>return Negozio</button>";
  }

  /*Started the connection to Database*/
  $_db = mysqli_connect('my_estateinmusica');

        if (mysqli_connect_error($_db) ) {
          get_out();
          die("<h1> impossible start connection</h1>");
        }
    /*Select usefull database*/
    mysqli_select_db($_db, 'my_estateinmusica');

    $delete = "DELETE FROM ACQUISTANO WHERE Matricola = '{$matricola}';";

    if (  mysqli_query($_db, $delete )  == false ){
      echo "<h1> ERRORE, Impossibile trovare il biglietto, eliminazione non avvenuta</h1>";
      echo '<hr>';
      get_out();
      mysqli_close($_db);
      die();
    }
    else {
      echo "<script> alert('Eliminazione del biglietto avvenuta con successo \n nessun rimborso emesso, OGNI FUNZIOANLITA' FINANZIARA E' DISABILITATA);</script>";
      header("Location:{$_SERVER['HTTP_REFERER']}" );
    }



?>
