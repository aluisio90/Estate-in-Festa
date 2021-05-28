/* (1) */
/*Elencare per data degli eventi i biglietti acquistati da un utente(AREA RISERVATA)*/

SELECT *

FROM
SPETTATORI,
ACQUISTANO,
CONCERTI,
PRENOTATE,
SALE_CONCERTI

WHERE
ACQUISTANO.ID = SPETTATORI.ID AND ACQUISTANO.Codice_Concerto = CONCERTI.Codice_Concerto AND
PRENOTATE.Codice_Concerto = CONCERTI.Codice_Concerto AND PRENOTATE.Codice_Sala = SALE_CONCERTI.Codice_Sala AND
SPETTATORI.ID = ['Inserire ID'];

/* (2) */
/* Elencare in una scheda informativa il programma di un dato concerto elecando quindi:
   - La lista dei brani ordinata secondo l'ordine di esecuzione
   - Gli esecutori dei brani
*/
SELECT 

BRANI.Titolo, 
PROGRAMMATI.Ordine, 
BRANI.Descrizione, 
ESECUTORI.Nome AS nome_esecutore, 
AUTORI.Nome AS nome_autore,
AUTORI.Cognome AS cognome_autore 

FROM 
BRANI, 
SCRIVONO, 
AUTORI, 
SUONANO, 
ESECUTORI, 
PROGRAMMATI, 
CONCERTI 
WHERE 
BRANI.Codice_Brano = SCRIVONO.Codice_Brano AND AUTORI.Codice_Autore = SCRIVONO.Codice_Autore AND 
BRANI.Codice_Brano = SUONANO.Codice_Brano AND ESECUTORI.Matricola = SUONANO.Matricola AND
PROGRAMMATI.Codice_Brano = BRANI.Codice_Brano AND PROGRAMMATI.Codice_Concerto = CONCERTI.Codice_Concerto AND
CONCERTI.Codice_Concerto = ['Inserire codice_concerti'];

/*(3)*/

/*Disporre in una scheda informativa i dati di un dato musicista e/o orchestra*/
   SELECT * FROM ESECUTORE, ORCHESTRA, SOLISTA
   
   WHERE
   ESECUTORE.Matricola = ORCHESTRA.Matricola AND 
   ESECUTORE.Matricola = SOLISTA.Matricola AND 
   ESECUTORE.Matricola = ['inserire matricola'];

/*(4)*/
/*
Organizzare uno scheda informativa con i dati di tutti gli eventi programmati specificando:
   Data e ora dell'evento
   Luogo dell'evento e via
   uno o piu' numeri di riferimento
   una breve descrizione dell'evento (se disponibile)
   Numero di posti ancora disponibile (calcolato sulla base dei biglietti gia' venduti)
*/

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
          
