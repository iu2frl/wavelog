<?php

defined('BASEPATH') OR exit('Non è permesso l\'accesso diretto allo script');

// Tiles
$lang['qso_title_qso_map'] = 'Mappa QSO';
$lang['qso_title_suggestions'] = 'Suggerimenti';
$lang['qso_title_previous_contacts'] = 'Contatti Precedenti';
$lang['qso_title_times_worked_before'] = "volte lavorato in precedenza";
$lang['qso_title_not_worked_before'] = "Non lavorato prima";
$lang['qso_title_image'] = 'Immagine Profilo';
$lang['qso_previous_max_shown'] = "Mostrati al massimo 5 contatti precedenti";

// Quicklog on Dashboard
$lang['qso_quicklog_enter_callsign'] = 'QUICKLOG Inserisci Callsign';

// Input Help Text on the /QSO Display
$lang['qso_transmit_power_helptext'] = 'Dare valore di potenza in Watt. Includere solo numeri nell input.';

$lang['qso_sota_ref_helptext'] = 'Per esempio: GM/NS-001.';
$lang['qso_wwff_ref_helptext'] = 'Per esempio: DLFF-0069.';
$lang['qso_pota_ref_helptext'] = 'Per esempio: PA-0150. Consentiti valori multipli.';

$lang['qso_sig_helptext'] = 'Per esempio: GMA';
$lang['qso_sig_info_helptext'] = 'Per esempio: DA/NW-357';

$lang['qso_dok_helptext'] = 'Per esempio: Q03';

$lang['qso_notes_helptext'] = 'Il contenuto della nota viene utilizzato solo all interno di Wavelog e non viene esportato in altri servizi.';
$lang['qsl_notes_helptext'] = 'Il contenuto di questa nota è esportato a servizi QSL come eqsl.cc.';

$lang['qso_eqsl_qslmsg_helptext'] = "Ottieni il messaggio predefinito per eQSL, per questa stazione.";

// error text //
$lang['qso_error_timeoff_less_timeon'] = "TimeOff è inferiore a TimeOn";

// Button Text on /qso Display

$lang['qso_btn_clear_qso'] = 'Cancella';
$lang['qso_btn_reset_to_default'] = 'Ripristina predefinito';
$lang['qso_btn_save_qso'] = 'Salva QSO';
$lang['qso_btn_edit_qso'] = 'Modifica QSO';
$lang['qso_delete_warning'] = "Attenzione! Sei sicuro di voler eliminare il QSO con ";

// QSO Details

$lang['qso_details'] = 'Dettagli QSO';

$lang['fav_add'] = 'Aggiungi Band/Modalità ai Preferiti';
$lang['qso_operator_callsign'] = 'Callsign dell\'operatore';

// Simple FLE (FastLogEntry)

$lang['qso_simplefle_info'] = "Cosa è questo?";
$lang['qso_simplefle_info_ln1'] = "Inserimento rapido del log semplice (FLE)";
$lang['qso_simplefle_info_ln2'] = "'Fast Log Entry', o semplicemente 'FLE' è un sistema per registrare QSO in modo molto rapido ed efficiente. Grazie alla sua sintassi, è richiesto solo un input minimo per registrare molti QSO con il minor sforzo possibile.";
$lang['qso_simplefle_info_ln3'] = "FLE è stato originariamente sviluppato da DF3CB. Offre un programma per Windows sul suo sito web. Simple FLE è stato scritto da OK2CQR basandosi su FLE di DF3CB e fornisce un'interfaccia web per registrare QSO.";
$lang['qso_simplefle_info_ln4'] = "Un caso d'uso comune è importare i log cartacei da una sessione all'aperto e ora SimpleFLE è disponibile anche in Wavelog. Informazioni sulla sintassi e sul funzionamento di FLE possono essere trovate <a href='https://df3cb.com/fle/documentation/' target='_blank'>qui</a>.";
$lang['qso_simplefle_qso_data'] = "Dati QSO";
$lang['qso_simplefle_qso_date_hint'] = "Se non scegli una data, verrà utilizzata la data odierna.";
$lang['qso_simplefle_qso_list'] = "Elenco QSO";
$lang['qso_simplefle_qso_list_total'] = "Totale";
$lang['qso_simplefle_qso_date'] = "Data QSO";
$lang['qso_simplefle_operator'] = "Operatore";
$lang['qso_simplefle_operator_hint'] = "es. OK2CQR";
$lang['qso_simplefle_station_call_location'] = "Chiamata Stazione/Località";
$lang['qso_simplefle_station_call_location_hint'] = "Se hai operato da una nuova località, crea prima una nuova <a href=". site_url('station') . ">Località Stazione</a>";
$lang['qso_simplefle_utc_time'] = "Ora UTC corrente";
$lang['qso_simplefle_enter_the_data'] = "Inserisci i dati";
$lang['qso_simplefle_syntax_help_close_w_sample'] = "Chiudi e Carica dati di esempio";
$lang['qso_simplefle_reload'] = "Ricarica Elenco QSO";
$lang['qso_simplefle_save'] = "Salva in Wavelog";
$lang['qso_simplefle_clear'] = "Cancella Sessione di Registrazione";
$lang['qso_simplefle_refs_hint'] = "I riferimenti possono essere <u>S</u>OTA, <u>I</u>OTA, <u>P</u>OTA o <u>W</u>WFF";

$lang['qso_simplefle_error_band'] = "Manca la banda!";
$lang['qso_simplefle_error_mode'] = "Manca la modalità!";
$lang['qso_simplefle_error_time'] = "L'orario non è impostato!";
$lang['qso_simplefle_error_stationcall'] = "Chiamata stazione non selezionata";
$lang['qso_simplefle_error_operator'] = "Campo 'Operatore' è vuoto";
$lang['qso_simplefle_warning_reset'] = "Attenzione! Vuoi davvero ripristinare tutto?";
$lang['qso_simplefle_warning_missing_band_mode'] = "Attenzione! Non puoi registrare l'elenco QSO perché alcuni QSO non hanno la banda e/o la modalità definite!";
$lang['qso_simplefle_warning_missing_time'] = "Attenzione! Non puoi registrare l'elenco QSO perché alcuni QSO non hanno un'ora definita!";
$lang['qso_simplefle_warning_example_data'] = "Attenzione! Il campo dei dati contiene dati di esempio. Prima Cancella la Sessione di Registrazione!";
$lang['qso_simplefle_confirm_save_to_log'] = "Sei sicuro di voler aggiungere questi QSO al log e cancellare la sessione?";
$lang['qso_simplefle_success_save_to_log_header'] = "QSO Registrato!";
$lang['qso_simplefle_success_save_to_log'] = "I QSO sono stati registrati con successo nel log!";
$lang['qso_simplefle_error_date'] = "Data non valida";

$lang['qso_simplefle_syntax_help_button'] = "Guida alla sintassi";
$lang['qso_simplefle_syntax_help_title'] = "Sintassi per FLE";
$lang['qso_simplefle_syntax_help_ln1'] = "Prima di iniziare a registrare un QSO, prendi nota delle regole di base.";
$lang['qso_simplefle_syntax_help_ln2'] = "- Ogni nuovo QSO dovrebbe essere su una nuova riga.";
$lang['qso_simplefle_syntax_help_ln3'] = "- Su ogni nuova riga, scrivi solo i dati che sono cambiati rispetto al QSO precedente.";
$lang['qso_simplefle_syntax_help_ln4'] = "Per iniziare, assicurati di aver già compilato il modulo a sinistra con la data, la chiamata della stazione e la chiamata dell'operatore. I dati principali includono la banda (o la QRG in MHz, ad esempio '7.145'), la modalità e l'ora. Dopo l'ora, fornisci il primo QSO, che è essenzialmente il nominativo.";
$lang['qso_simplefle_syntax_help_ln5'] = "Ad esempio, un QSO iniziato alle 21:34 (UTC) con 4W7EST su 20m SSB.";
$lang['qso_simplefle_syntax_help_ln6'] = "Se non fornisci informazioni RST, la sintassi userà 59 (599 per i dati). Il nostro prossimo QSO non era 59 su entrambi i lati, quindi forniamo le informazioni con il RST inviato per primo. È stato 2 minuti dopo il primo QSO.";
$lang['qso_simplefle_syntax_help_ln7'] = "Il primo QSO è stato alle 21:34 e il secondo 2 minuti dopo alle 21:36. Scriviamo 6 perché questo è l'unico dato che è cambiato qui. Le informazioni su banda e modalità non sono cambiate, quindi questi dati sono omessi.";
$lang['qso_simplefle_syntax_help_ln8'] = "Per il nostro prossimo QSO alle 21:40 del 14 maggio 2021, abbiamo cambiato la banda a 40m ma sempre in SSB. Se non vengono fornite informazioni RST, la sintassi userà 59 per ogni nuovo QSO. Pertanto, possiamo aggiungere un altro QSO che si è verificato alla stessa ora due giorni dopo. La data deve essere nel formato AAAA-MM-GG.";
$lang['qso_simplefle_syntax_help_ln9'] = "Un riepilogo completo di tutti i comandi e la sintassi necessaria possono essere trovati in <a href='https://github.com/wavelog/wavelog/wiki/SimpleFLE' target='_blank'>questo articolo</a> del nostro Wiki.";

$lang['qso_simplefle_options'] = 'Opzioni';
