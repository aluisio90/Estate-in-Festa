<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Musicando | acquisto biglietto</title>
  <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
  <body>
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
          <!--USING PHP AND HTML CODE-->
          <p>Data dell'evento</p>
          <?php
            echo  "
                <input type='date' name='data' value= '{$_GET['date']}' readonly= 'readonly'/>
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
          <input type="text" name="telefono"/>

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
  </body>
</html>
