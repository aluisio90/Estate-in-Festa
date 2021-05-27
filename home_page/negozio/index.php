<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Musicando | Negozio</title>
  <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>

<body>

  <!-- Navigation -->
  <div class="top-bar">
    <div class="top-bar-left">
      <ul class="menu">
        <li class="menu-text">Musicando Corp.</li>
      </ul>
    </div>
    <div class="top-bar-right">
      <ul class="menu">
        <li><a href="https://estateinmusica.altervista.org/">Home</a></li>
        <li><a href="https://estateinmusica.altervista.org/negozio">Negozio</a></li>
        <li><a href="https://estateinmusica.altervista.org/spettacoli">Spettacoli</a></li>
        <li><a href="https://estateinmusica.altervista.org/contatti">Contatti</a></li>
        <li><a href="https://estateinmusica.altervista.org/login">Login</a></li>
      </ul>
    </div>
  </div>
  <!-- /Navigation -->

  <br>

  <div class="row">

    <div class="medium-7 large-6 columns">
      <h1>I nostri fantastici concerti</h1>
      <p class="subheader">Scopri i migliori concerti dell'estate, forza è il momento di dare il via allo spettacolo!</p>
    </div>

    <div class="show-for-large large-3 columns">
      <img src="https://placehold.it/400x370&text=PSR1257 + 12 C" alt="picture of space">
    </div>
  </div>

  <div class="row column">
    <hr>
  </div>

  <div class="row column">
    <p class="lead">Gli Spettacoli</p>
  </div>

  <div class="row small-up-1 medium-up-2 large-up-3">
    <!-- inizio box informativo-->
    <?php
          function get_out(){
            echo "<button name= 'out' onclick= location.href= 'https://estateinmusica.altervista.org/negozio'>return Negozio</button>";
          }

        $_db = mysqli_connect('my_estateinmusica');

        if ( mysqli_connect_error($_db) ) {
          get_out();
          die("<h1> impossible started connection</h1>");
        }

        /*Select usefull database*/
        mysqli_select_db($_db, 'my_estateinmusica');

        /*setting query SQL to submit*/
          /*GETTING EVENTI*/$query = "
            SELECT
          PRENOTATE.Data_Prenotazione,
          SALE_CONCERTI.Numero_Posti,
          SALE_CONCERTI.Nome,
          SALE_CONCERTI.Indirizzo,
          CONCERTI.Titolo,
          CONCERTI.Descrizione,
          CONCERTI.Prezzo,
          CONCERTI.Codice_Concerto

          FROM
          PRENOTATE,
          SALE_CONCERTI,
          CONCERTI

          WHERE
          PRENOTATE.Codice_Sala = SALE_CONCERTI.Codice_Sala AND
          PRENOTATE.Codice_Concerto = CONCERTI.Codice_Concerto;
          ";

          /*GETTING NUMERI DI TELFONO*/

          /*TODO $query_v = "

          SELECT TELEFONI.Tipologia, TELEFONI.Numero FROM TELEFONI, SALE_CONCERTI, PRENOTATE, CONCERTI
          WHERE TELEFONI.Codice_Sala = SALE_CONCERTI.Codice_Sala AND PRENOTATE.Codice_Concerto = CONCERTI.Codice_Concerto AND
          PRENOTATE.Codice_Sala = SALE_CONCERTI.Codice_Sala;";
          */

          /*Submit querys to MySQL database and check results */

          if( ! $_r = mysqli_query($_db, $query) ) {
            echo "Internal error, plese try again";
            get_out();

          }
          mysqli_close($_db);




	/* TODO$numero = mysqli_fetch_assoc($rubrica);*/
  /*geting single row from result table*/
    while( $row = mysqli_fetch_assoc($_r) ){
      echo "

      <div class='column'>
        <div class='callout'>

          <form action= 'buy.php' method= 'GET'>
            <p>Data dell'evento</p>
            <p> <input type= 'date' value= '{$row['Data_Prenotazione']}' name= 'date' readonly= 'readonly'> </p>

            <p>POSTI DISPONIBILI: <input type='text' value= '{$row['Numero_Posti']}' name='posti' readonly= 'readonly'></p>

            <p>Nome dello spettacolo</p>
            <p class='lead'><input type= 'text' value='{$row['Titolo']}' name= 'titolo' readonly= 'readonly'></p>

            <p class='subheader'>Nome Sala</p>
            <input type= 'text' name= 'sala' value= '{$row['Nome']}' readonly= 'readonly'>

            <p class='subheader'>Indirizzo</p>
            <input type= 'text' value= '{$row['Indirizzo']}' name= 'indirizzo' readonly= 'readonly'>

            <p class='subheader'>Contatti Telefonici</p>
            <!--<input type= 'text' value= '' name= 'numero'><br>-->
            <p>Descrizione dell'evento</p>
            <p>
            <textarea rows='4' cols='50' name= 'descrizione' readonly= 'readonly'>'{$row['Descrizione']}'</textarea>
            </p>

            Prezzo del Biglietto(€) <input type= 'text' value= '{$row['Prezzo']}' name='prezzo' readonly= 'readonly'>
            <input type= 'submit' value= 'Scopri il programma'>
            <input type= 'hidden' name= 'codice' value= '{$row['Codice_Concerto']}'>
            <a href= 'buy.php'> <input type= 'button' value= 'Compra Adesso' readonly= 'readonly'></a>
          </form>

      </div>
    </div>


      ";

    }


    ?>
    <!-- fine box-->
  </div>
  <footer>
    <div class="row expanded callout secondary">
    <div class="row">
      <div class="medium-6 columns">
        <ul class="menu float-right">
          <li class="menu-text">Copyright</li>
        </ul>
      </div>
    </div>

  </footer>

  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>
