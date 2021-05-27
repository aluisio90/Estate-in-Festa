<?php  
	
	#$_from = $_POST['from'];
	$_from = 'axx@null.net';
	$_to =  'pizziandrea9@gmail.com';
	$_message = "<p>Thank to buy the tikets, get it</p>";
	$_object = "Test email";
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=utf-8';
	

	if ( mail($_to,$_object,  $_message, implode("\r\n", $headers) ) ){
    	echo "<h1>Email inviata con sucesso</h1>";
    }
    else
    {
    	echo "<h1 color= 'red'>Invio non riuscito</h1>";
    }
    
    
    
	
?>
