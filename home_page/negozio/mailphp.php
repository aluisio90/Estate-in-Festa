<?php

	function mailPHP($obj) {
		/*getting user information from object result_query*/
		$user = mysqli_fetch_assoc($obj);
		/*user is associative array*/

		/* extract the values*/

		$mail = $user['Email'];
		$ID = $user['ID'];
		$telefono = $user['Telefono'];
		$nome = $user['Nome'];
		$cognome = $user['Cognome'];

		$_message = "
		<!doctype html>
		<html class=\"no-js\" lang=\"it\">

		<head>
			<meta charset=\"utf-8\" />
			<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
			<link rel=\"stylesheet\" href=\"https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css\">
		</head>
		<body>


			<div class=\"callout large primary\">
				<div class=\"row column text-center\">
					<h1>Ecco il tuo biglietto</h1>
					<h5><i>Associazione Culturale Musicando</i></h5>
				</div>
			</div>

			<div class=\"row\" id=\"content\">
				<div class=\"medium-8 columns\">
					<div class=\"blog-post\">
						<p>
							<div align= 'center'>
								<img src= halt='logo'>
							</div>

							Ciao {$user['nomespettatore']} {$user['cognomespettatore']}, <br><br>

							ecco qui il tuo biglietto per lo spettacolo \"{$user['titolospettacolo']}\"<br><br>

							<p>Dati del biglietto</p>
							<hr>
								<p>Codice del Biglietto {$user['matricolabiglietto']} </p>
								<p>Data dell'evento {$user['dataprenotazione']} </p>

								<br><br>

								<p>Descrizione dello spettacolo</p>
								<hr>

								<br><br>
								<p>{$user['Descrizione']}</p>

								<br><br>
							Dati anagrafici dell'utente<br>
							<hr>
									<p>Nome {$user['nomespettatore']}</p>
									<p>Cognome {$user['cognomespettatore']}</p>
									<p>Numero di Telefono {$user['Telefono']}</p>


							<p>
								<h2>Le tue credenziali per accedere all'area privata</h2>

								<p>
									username: {$user['Email']}<br>
									password: {$user['ID']}
								</p>
							</p>
							<br><br>





						</p>
						<div class=\"callout\">
							<p>Goditi lo spettacolo , lo staf <i>\"Associazione Musicale Musicando\"</i>, dove la musica e' per te</p>
						</div>
					</div>
		</body>

		</html>


		";
		/*Prepare contenent email*/
		$_message = wordwrap($_message, 70, "\r\n");

		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';
		//$headers[] = 'From: Birthday Reminder <unestateinmusica@Musicando.it>';
		//debug options echo $_message;
		$_object = 'Il Tuo biglietto';
		if ( mail($mail,$_object,  $_message, implode("\r\n", $headers) ) ){
				echo "<h1>Email inviata con sucesso</h1>";
			}
			else
			{
				echo "<h1 font-color= 'red'>Invio non riuscito</h1>";
			}
	}







?>
