<?php
    /*Import external module: mailPHP*/
    include "mailphp.php";


    $mail = $_POST['email'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $conto = $_POST['conto'];
    $telefono = $_POST['telefono'];
    $concerto = $_POST['codice'];

    /*start conncection*/
    $_db = mysqli_connect('my_estateinmusica');

        if (mysqli_connect_error($_db) ) {

          echo("<h1> Errore interno 0</h1>");
          echo "<a href= https://estateinmusica.altervista.org>Ritorna alla home page</a>";
        }

        /*sel db*/
        mysqli_select_db($_db, 'my_estateinmusica');



    /*check if new user is just recording*/
    $check = "SELECT * FROM SPETTATORI WHERE Email = '{$mail}';";

    $_r = mysqli_fetch_assoc (mysqli_query($_db, $check) );
    if ( $_r['Email'] == '' ) {
      /*sumbit queries to recording a new user*/

      /*set qeuries*/
      $new_user = " INSERT INTO SPETTATORI (Nome, Cognome, Email, Telefono) VALUES
                  ('{$nome}','{$cognome}','{$mail}','{$telefono}');";

      if( !mysqli_query($_db, $new_user) ){
        echo "Error impossible to recording new user, please try latter";
        echo "<a href= https://estateinmusica.altervista.org>Ritorna alla home page</a>";
        mysqli_close($_db);

        die();

      }

      echo "<script>alert(\"Registrato\");</script>";

    }


    /*if not wrong...*/

    /*sumbit queries for getting a new ID USER*/

    /*EMAIL is candatate key(UNIQUE)*/
    $get_user_id = "SELECT ID FROM SPETTATORI WHERE '{$mail}' = Email;";
    if( ! $obj_user = mysqli_query($_db, $get_user_id) ){
      echo "Internal Error... :( ";
      echo "<a href= https://estateinmusica.altervista.org>Ritorna alla home page</a>";
      mysqli_close($_db);

      die();
    }
    /*getting assoc. array user['ID'] */
    $user = mysqli_fetch_assoc( $obj_user );


    $create_tiket = "INSERT INTO ACQUISTANO ( ID, Codice_Concerto) VALUES ('{$user[ID]}', '{$concerto}');";
    /*fixed one seat*/
    mysqli_query("UPDATE SALE_CONCERTI SET Numero_Posti = (Numero_Posti-1) WHERE Codice_Concerto = {$concerto};");

    /*sumbit queries to create a new tiket*/
    if( !mysqli_query($_db, $create_tiket) ){
      echo "Impossibile emettere il biglietto.... possibilità di server sovraccarico riprovare più tardi.";
    }
    else
    {

      $get_user ="
      SELECT
      SPETTATORI.Nome AS nomespettatore,
      SPETTATORI.Cognome AS cognomespettatore,
      CONCERTI.Titolo AS titolospettacolo,
      ACQUISTANO.Matricola AS matricolabiglietto,
      SALE_CONCERTI.Nome AS nomesalaconcerti,
      SALE_CONCERTI.Indirizzo AS indirizzsaleconcerti,
      SPETTATORI.Email,
      PRENOTATE.Data_Prenotazione AS dataprenotazione,
      SPETTATORI.ID,
      SPETTATORI.Telefono

      FROM SPETTATORI,
      ACQUISTANO,
      CONCERTI,
      PRENOTATE,
      SALE_CONCERTI

      WHERE
      SPETTATORI.ID = '{$user['ID']}' AND
      CONCERTI.Codice_Concerto = '{$concerto}' AND
      SPETTATORI.ID = ACQUISTANO.ID AND
      CONCERTI.Codice_Concerto = ACQUISTANO.Codice_Concerto AND
      CONCERTI.Codice_Concerto = PRENOTATE.Codice_Concerto AND
      SALE_CONCERTI.Codice_Sala = PRENOTATE.Codice_Sala;";
      //echo $get_user;
      $user = mysqli_query($_db , $get_user);
      mailPHP( $user );
      echo "<hr><h1>Emissione del biglietto avvenuta con successo!</h1>
            <h3><i>Via allo spettacolo<i></h3>

              <p>
                Il tuo biglietto è stato spedito via email all'indirizzo {$mail} (troverai sull'email anche le credenziali per accedere alla tua area riservata
                da cui puoi vedere tutti i tuoi biglietti, divertiti ;)
              </p>
             ";
    }
    echo "<a href= https://estateinmusica.altervista.org>Ritorna alla home page</a>";
    mysqli_close($_db);





?>
