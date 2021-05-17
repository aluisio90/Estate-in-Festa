/* (1) */
/*Elencare per data degli eventi i biglietti acquistati da un utente(AREA RISERVATA)*/

SELECT

BIGLIETTI.Matricola,
CONCERTI.Titolo,
PRENOTATE.Data_Prenotazione,
SALE_CONCERTI.Indirizzo,
TELEFONI.Numero,
TELEFONI.Descrizione

FROM
BIGLIETTI,
TELEFONI,
CONCERTI,
SALE_CONCERTI,
PRENOTATE,
SPETTATORI

WHERE
['ID_UTENTE'] = SPETTATORI.ID AND
BIGLIETTI.Codice_Concerto = CONCERTI.Codice_Concerto AND
BIGLIETTI.ID = SPETTATORI.ID AND
CONCERTI.Codice_Concerto = PRENOTATE.Codice_Sala AND
SALE_CONCERTI.Codice_Sala = PRENOTATE.Codice_Sala AND
SALE_CONCERTI.Codice_Sale = TELEFONI.Codice_Sala
ORDER BY Data_Prenotazione

/* (2) */
/* Elencare in una scheda informativa il programma di un dato concerto elecando quindi:
   - La lista dei brani ordinata secondo l'ordine di esecuzione
   - Gli esecutori dei brani
*/

/*(3)*/

/*Disporre in una scheda informativa i dati di un dato musicista e/o orchestra*/
