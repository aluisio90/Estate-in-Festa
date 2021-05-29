<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Musicando | acquisto biglietto</title>
  <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
  <body>

    <h3>Programma dello spettacolo</h3>
    <!--START SHOW PROGRAM-->
    <table style= "border: 1px solid grey; background-color: #ddd;">
			<caption>
			</caption>
			<thead>
				<tr><th>Ordine di Esecuzione</th><th>Titolo</th><th>Nome Autore</th><th>Cognome Autore</th><th>Esecutore</th><th>Descrizione</th></tr>
			</thead>
			<tbody>
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

		/*set queries*/
			$query = "
			SELECT BRANI.Titolo, PROGRAMMATI.Ordine, BRANI.Descrizione, ESECUTORI.Nome AS `nome-esecutore`, AUTORI.Nome AS `nome-autore`, AUTORI.Cognome AS `nome-autore` FROM BRANI, SCRIVONO, AUTORI, SUONANO, ESECUTORI, PROGRAMMATI, CONCERTI WHERE BRANI.Codice_Brano = SCRIVONO.Codice_Brano AND AUTORI.Codice_Autore = SCRIVONO.Codice_Autore AND BRANI.Codice_Brano = SUONANO.Codice_Brano AND ESECUTORI.Matricola = SUONANO.Matricola AND PROGRAMMATI.Codice_Brano = BRANI.Codice_Brano AND PROGRAMMATI.Codice_Concerto = CONCERTI.Codice_Concerto AND CONCERTI.Codice_Concerto = '{$_GET['codice']}';";

		/*submit querires to database*/
		if( !$risultati = mysqli_query($_db, $query) ){
			echo "<h1>Internal Error</h1>";
			get_out();
		}
		mysqli_close($_db);
				/*print result to queries*/
				while( $row = mysqli_fetch_assoc($risultati) ){
				echo "<tr><td>{$row['Ordine']}</td><td>{$row['Titolo']}</td><td>{$row['nome-autore']}</td><td>{$row['cognome-autore']}</td><td>{$row['nome-esecutore']}</td><td>{$row['Descrizione']}</td></tr>";
				}

			?>


			</tbody>
		</table>
    <!--END SHOW PROGRAM-->

    <br><br>
    <div class="testbox">
      <form action="update.php" method="POST">
        <div class="banner" align= 'center'>
          <div class="top-bar">
      			<ul class="menu">
       			 <li class="menu-text">Inserire dati per emissione biglietto </li>
      			</ul>
   			 </div>
          <hr>
        </div>
        <div class="item">
          <script>alert("!!!ATTENZIONE!!!\n Quest'area del sito e' in fase sperimentale e solo a scopo dimostrativo per il commitente, per tanto Non e' garantita nel modo piu' assoluto la riservatezza dei dati inseriti.\n 'Lo staff'")</script>
          <!--USING PHP AND HTML CODE-->
          <p>Data dell'evento</p>
          <?php
            echo  "
                <input type='datetime' name='data' value= '{$_GET['date']}' readonly= 'readonly'/>
                ";
          ?>
        </div>

        <div class="item">
          <p>Titolo dello Spetacolo</p>
            <?= "<input type= 'text' name= 'spettacolo' value= '{$_GET['titolo']}' readonly= 'readonly' " ?>
        </div>
        <div class="item">
          <p>Descrizione</p>
          <?= "<textarea rows='4' cols='50' name= 'descrizione' readonly= 'readonly'>{$_GET['descrizione']}</textarea> " ?>
        </div>
        <div class="item">
          <p>Nome Sala Concerti</p>
          <?= "<input type='text' name='sala' value= '{$_GET['sala']}' readonly= 'readonly'/>" ?>
        </div>
        <div class="item">
          <br>
          <p>PREZZO INTERO:</p> <?= "<input type='text' name='prezzo' value= '{$_GET['prezzo']}' readonly= 'readonly'>" ?>

        </div>
        <div class="item">
          <p>Indirizzo</p>
           <?= "<input type='text' name='indirizzo' value= '{$_GET['indirizzo']}' readonly= 'readonly'" ?>
          </div>
        </div>
          <p> Email</p>
          <input type="text" name="email"/>
        </div>

        <p>Codice Conto</p>
          <input type="text" name="conto"/>

          <p>Numero di Telefono</p>
          <input type="text" name="telefono" placeholder="se gia' inserito inprecedenza non e' necessario reinserirlo"/>

        <p>Nome</p>
          <input type="text" name="nome"/>
		<p>Cognome</p>
          <input type="text" name="cognome"/>
        </div>

        <input type= 'hidden' name= 'codice' value = '<?php echo $_GET['codice']; ?>' >

        <div align= 'center'>
          <button type="submit" class="success button">Conferma</button>

        </div>
      </form>

      <div align= 'center'>
      <button class="alert button" onclick= "location.href= 'http://estateinmusica.altervista.org/negozio/index.php' ">Annulla</button>
      </div>
    </div>
    <div class="large-4 medium-4 cell">
          <div class="callout">
            <h5>Associazione Culurale Musicando</h5>
            <p>
              tutti i diritti riservati, leggi la nostra normativa sulla privacy a questo link: <a href='http://estateinmusica.altervista.org/resurce/protocollo.html' target= '_blank'>INFORMATIVA</a>
            </p>
            </div>
        </div>
  </body>
</html>
