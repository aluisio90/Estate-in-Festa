<!doctype html>
<html class="no-js" lang="it">

  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicando | Login</title>
    <link rel="stylesheet" href="assets/foundation.css">
  </head>

  <body>
      <!-- Start Top Bar -->
      <div class="top-bar">
        <div class="top-bar-left">
          <ul class="menu">
            <li class="menu-text">Associazione Culturale Musicando</li>
          </ul>
        </div>
        <div class="top-bar-right">
          <ul class="menu">
            <li><a href="https://estateinmusica.altervista.org/">Home</a></li>
        <li><a href="https://estateinmusica.altervista.org/negozio/">Negozio</a></li>
        <li><a href="https://estateinmusica.altervista.org/contatti/">Contatti</a></li>
        <li><a href="https://estateinmusica.altervista.org/login/">Login</a></li>
          </ul>
        </div>
      </div>
  <!-- End Top Bar -->

    <!-- Grid Example -->
    <div class="medium-7 large-6 columns">
      <h1>Login</h1>
      <p class="subheader">I tuoi Biglietti</p>
    </div>
          <?php

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

              /*Validation input data*/

              if (  filter_var($username, FILTER_VALIDATE_EMAIL)  ) {
                  echo "Error, data insert is not valid.... try again";
                  get_out();
                  mysqli_close($_db);
                  die();

              }
              if ( ( isset($_SESSION['password']) || empty($_SESSION['password'] ) ) &&  (isset($_SESSION['username']) || empty($_SESSION['username'])  ) ) {

              $_SESSION['password'] = $_POST[password];
              $_SESSION['username'] = $_POST[username];
            }


              $check_user = "SELECT * FROM SPETTATORI WHERE ID = '{$_SESSION[password]}' AND Email = '{$_SESSION[username]}';";
              if (  mysqli_num_rows(mysqli_query($_db, $check_user ) ) == 0 ){
                echo "<h1> ERRORE, Utente non riconosciuto</h1>";
                echo '<hr>';
                get_out();
                mysqli_close($_db);
                die();
              }



            /*set queries*/
              $query = " SELECT *
              FROM
              SPETTATORI,
              ACQUISTANO,
              CONCERTI,
              PRENOTATE,
              SALE_CONCERTI

              WHERE
              ACQUISTANO.ID = SPETTATORI.ID AND ACQUISTANO.Codice_Concerto = CONCERTI.Codice_Concerto AND
              PRENOTATE.Codice_Concerto = CONCERTI.Codice_Concerto AND PRENOTATE.Codice_Sala = SALE_CONCERTI.Codice_Sala AND
              SPETTATORI.ID = '{$_SESSION[password]}' AND SPETTATORI.Email = '{$_SESSION[username]}';

              ";

            /*submit querires to database*/
            if( !$risultati = mysqli_query($_db, $query) ){
              echo "<h1>Internal Error</h1>";
              get_out();
            }
            mysqli_close($_db);


            /*
            *
            *
            *
            */

              echo "
              <table style= \"border: 1px solid grey; background-color: #ddd;\">
                <caption>
                </caption>
                <thead>
                  <tr><th>Evento</th><th>Data Evento</th><th>Descrizione</th><th>Prezzo Pagato</th><th>Tipo Biglietto</th><th>Indrizzo</th></tr>
                </thead>
                <tbody>

              ";
      				/*print result to queries*/
      				while( $row = mysqli_fetch_assoc($risultati) ){
      				echo "
                <form action= 'delete.php' method= 'POST'>
                  <tr><td>{$row['Titolo']}</td><td>{$row['Data_Prenotazione']}</td><td>{$row['Descrizione']}</td><td>{$row['Prezzo']}</td><td>{$row['Tipo']}</td><td>{$row['Indirizzo']}</td><td><button type= 'submit'><div style= 'color: red'>Elimina</button></td></tr>
                    <input type= 'hidden' value = '{$row[Matricola]}' name= 'matricola'>
                </form>";
      				}



            ?>
  </body>
</html>
