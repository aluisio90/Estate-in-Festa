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


	/*
	*
	*
	*
	*/

?>

<HTML>
	<HEAD>
		<TITLE>Programma</TITLE>

		<style>
			th, td {border: 1px solid grey;}
		</style>
	</HEAD>
	<BODY>

		<table style= "border: 1px solid grey; background-color: #ddd;">
			<caption>
			</caption>
			<thead>
				<tr><th>Ordine di Esecuzione</th><th>Titolo</th><th>Nome Autore</th><th>Cognome Autore</th><th>Esecutore</th><th>Descrizione</th></tr>
			</thead>
			<tbody>
			<?php
				/*print result to queries*/
				while( $row = mysqli_fetch_assoc($risultati) ){
				echo "<tr><td>{$row['Ordine']}</td><td>{$row['Titolo']}</td><td>{$row['nome-autore']}</td><td>{$row['cognome-autore']}</td><td>{$row['nome-esecutore']}</td><td>{$row['Descrizione']}</td></tr>";
				}

			?>


			</tbody>
		</table>
		<a href= '.'><button>INDIETRO</button></a>
	</BODY>
</HTML>
