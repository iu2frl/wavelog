<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
___________________________________________________________________________________________
Station Logbooks
___________________________________________________________________________________________
*/

$lang['station_logbooks'] = "Logbook Stazione";
$lang['station_logbooks_description_header'] = "Cos'è un Logbook Stazione";
$lang['station_logbooks_description_text'] = "I Logbook Stazione ti permettono di raggruppare le Località Stazione, così da poter visualizzare tutte le località in una sessione, dalle aree del logbook alle analisi. Ideale quando operi in più località appartenenti allo stesso DXCC o cerchio VUCC.";
$lang['station_logbooks_create'] = "Crea Logbook Stazione";
$lang['station_logbooks_status'] = "Stato";
$lang['station_logbooks_link'] = "Link";
$lang['station_logbooks_public_search'] = "Ricerca Pubblica";
$lang['station_logbooks_set_active'] = "Imposta come Logbook Attivo";
$lang['station_logbooks_active_logbook'] = "Logbook Attivo";
$lang['station_logbooks_edit_logbook'] = "Modifica Logbook Stazione";    // Full sentence will be generated 'Modifica Logbook Stazione: [Nome Logbook]'
$lang['station_logbooks_confirm_delete'] = "Sei sicuro di voler eliminare il seguente logbook stazione? È necessario collegare nuovamente tutte le località collegate a un altro logbook: ";
$lang['station_logbooks_view_public'] = "Visualizza Pagina Pubblica per il Logbook: ";
$lang['station_logbooks_create_name'] = "Nome Logbook Stazione";
$lang['station_logbooks_create_name_hint'] = "Puoi chiamare un logbook stazione con qualsiasi nome.";
$lang['station_logbooks_edit_name_hint'] = "Nome breve per il logbook stazione. Ad esempio: Casa (HM54ip)";
$lang['station_logbooks_edit_name_update'] = "Aggiorna Nome Logbook Stazione";
$lang['station_logbooks_public_slug'] = "Slug Pubblico";
$lang['station_logbooks_public_slug_hint'] = "Impostando uno slug pubblico puoi condividere il tuo logbook con chiunque tramite un indirizzo web personalizzato, lo slug può contenere solo lettere e numeri.";
$lang['station_logbooks_public_slug_format1'] = "In seguito assomiglierà a questo:";
$lang['station_logbooks_public_slug_format2'] = "[tuo slug]";
$lang['station_logbooks_public_slug_input'] = "Inserisci scelta Slug Pubblico";
$lang['station_logbooks_public_slug_visit'] = "Visita Pagina Pubblica";
$lang['station_logbooks_public_search_hint'] = "Abilitando la funzione di ricerca pubblica si ottiene una casella di input di ricerca sulla pagina pubblica del logbook accessibile tramite lo slug pubblico. La ricerca copre solo questo logbook.";
$lang['station_logbooks_public_search_enabled'] = "Ricerca pubblica abilitata";
$lang['station_logbooks_select_avail_loc'] = "Seleziona Località Stazione Disponibili";
$lang['station_logbooks_link_loc'] = "Collega Località";
$lang['station_logbooks_linked_loc'] = "Località Collegate";
$lang['station_logbooks_no_linked_loc'] = "Nessuna Località Collegata";
$lang['station_logbooks_unlink_station_location'] = "Scollega Località Stazione";

/*
___________________________________________________________________________________________
Station Locations
___________________________________________________________________________________________
*/

$lang['station_location'] = 'Località Stazione';
$lang['station_location_plural'] = "Località Stazione";
$lang['station_location_header_ln1'] = 'Le Località Stazione definiscono le località operative, come il tuo QTH, quello di un amico o una stazione portatile.';
$lang['station_location_header_ln2'] = 'Come i logbook, un profilo stazione tiene insieme un insieme di QSO.';
$lang['station_location_header_ln3'] = 'Può esserci una sola stazione attiva alla volta. Nella tabella sottostante ciò è indicato con il distintivo -Stazione Attiva-.';
$lang['station_location_create_header'] = 'Crea Località Stazione';
$lang['station_location_create'] = 'Crea una Località Stazione';
$lang['station_location_edit'] = 'Modifica Località Stazione: ';
$lang['station_location_updated_suff'] = ' Aggiornato.';
$lang['station_location_warning'] = 'Attenzione: è necessario impostare una località stazione attiva. Vai a Callsign->Località Stazione per selezionarne una.';
$lang['station_location_reassign_at'] = 'Si prega di riassegnarli a ';
$lang['station_location_warning_reassign'] = 'A causa di modifiche recenti all interno di Wavelog, è necessario riassegnare i QSO ai tuoi profili stazione.';
$lang['station_location_id'] = 'ID';
$lang['station_location_name'] = 'Nome Profilo';
$lang['station_location_name_hint'] = 'Nome breve per la località stazione. Ad esempio: Casa (HM54ip)';
$lang['station_location_callsign'] = 'Indicativo Stazione';
$lang['station_location_callsign_hint'] = 'Indicativo della stazione. Ad esempio: 4W7EST/P';
$lang['station_location_power'] = 'Potenza Stazione (W)';
$lang['station_location_power_hint'] = 'Potenza predefinita della stazione in Watt. Sovrascritta da CAT.';
$lang['station_location_emptylog'] = 'Log Vuoto';
$lang['station_location_confirm_active'] = 'Sei sicuro di voler rendere attiva la seguente stazione: ';
$lang['station_location_set_active'] = 'Imposta Attiva';
$lang['station_location_active'] = 'Stazione Attiva';
$lang['station_location_claim_ownership'] = 'Rivendica Proprietà';
$lang['station_location_confirm_del_qso'] = 'Sei sicuro di voler eliminare tutti i QSO all interno di questo profilo stazione?';
$lang['station_location_confirm_del_stationlocation'] = 'Sei sicuro di voler eliminare il profilo stazione ';
$lang['station_location_confirm_del_stationlocation_qso'] = 'Questo eliminerà tutti i QSO all interno di questo profilo stazione?';
$lang['station_location_dxcc'] = 'Entità DXCC Stazione';
$lang['station_location_dxcc_hint'] = 'Entità DXCC della stazione. Ad esempio: Scozia';
$lang['station_location_dxcc_warning'] = "Fermati un momento. Il DXCC che hai scelto è obsoleto e non più valido. Verifica quale DXCC è corretto per questa particolare località. Se sei sicuro, ignora questo avviso.";
$lang['station_location_city'] = 'Città Stazione';
$lang['station_location_city_hint'] = 'Città della stazione. Ad esempio: Inverness';
$lang['station_location_state'] = 'Stato Stazione';
$lang['station_location_state_hint'] = 'Stato della stazione. Si applica solo a determinati paesi. Lascia vuoto se non applicabile.';
$lang['station_location_county'] = 'Contea Stazione';
$lang['station_location_county_hint'] = 'Contea della stazione (usato solo per USA/Alaska/Hawaii).';
$lang['station_location_gridsquare'] = 'Griglia Quadrata Stazione';
$lang['station_location_gridsquare_hint_ln1'] = "Griglia quadrata della stazione. Ad esempio: HM54ip. Se non conosci la tua griglia quadrata, <a href='https://zone-check.eu/?m=loc' target='_blank'>clicca qui</a>!";
$lang['station_location_gridsquare_hint_ln2'] = "Se sei situato su una linea di griglia, inserisci più griglie separate da virgole. Ad esempio: IO77,IO78,IO87,IO88.";
$lang['station_location_iota_hint_ln1'] = "Riferimento IOTA della stazione. Ad esempio: EU-005";
$lang['station_location_iota_hint_ln2'] = "Puoi cercare i riferimenti IOTA sul sito web di <a target='_blank' href='https://www.iota-world.org/iota-directory/annex-f-short-title-iota-reference-number-list.html'>IOTA World</a>.";
$lang['station_location_sota_hint_ln1'] = "Riferimento SOTA della stazione. Puoi cercare i riferimenti SOTA sul sito web di <a target='_blank' href='https://www.sotamaps.org/'>SOTA Maps</a>.";
$lang['station_location_wwff_hint_ln1'] = "Riferimento WWFF della stazione. Puoi cercare i riferimenti WWFF sul sito web di <a target='_blank' href='https://www.cqgma.org/mvs/'>GMA Map</a>.";
$lang['station_location_pota_hint_ln1'] = "Riferimenti POTA della stazione. Consentiti valori multipli separati da virgole. Puoi cercare i riferimenti POTA sul sito web di <a target='_blank' href='https://pota.app/#/map/'>POTA Map</a>.";
$lang['station_location_signature'] = "Firma";
$lang['station_location_signature_name'] = "Nome Firma";
$lang['station_location_signature_name_hint'] = "Firma della stazione (ad es. GMA).";
$lang['station_location_signature_info'] = "Informazioni Firma";
$lang['station_location_signature_info_hint'] = "Informazioni sulla firma della stazione (ad es. DA/NW-357).";
$lang['station_location_eqsl_hint'] = 'Il soprannome QTH configurato nel tuo profilo eQSL';
$lang['station_location_eqsl_defaultqslmsg'] = "Messaggio QSL Predefinito";
$lang['station_location_eqsl_defaultqslmsg_hint'] = "Definisci un messaggio predefinito che verrà popolato e inviato per ogni QSO per questa località stazione.";
$lang['station_location_qrz_subscription'] = 'Abbonamento Necessario';
$lang['station_location_qrz_hint'] = "Trova la tua chiave API nella pagina delle impostazioni del logbook di <a href='https://logbook.qrz.com/logbook' target='_blank'>QRZ.com";
$lang['station_location_qrz_realtime_upload'] = 'Caricamento Logbook QRZ.com';
$lang['station_location_hrdlog_username'] = "Nome Utente HRDLog.net";
$lang['station_location_hrdlog_username_hint'] = "Il nome utente con cui sei registrato su HRDlog.net (solitamente il tuo indicativo).";
$lang['station_location_hrdlog_code'] = "Chiave API HRDLog.net";
$lang['station_location_hrdlog_realtime_upload'] = "Caricamento Logbook HRDLog.net in tempo reale";
$lang['station_location_hrdlog_code_hint'] = "Crea il tuo codice API su <a href='http://www.hrdlog.net/EditUser.aspx' target='_blank'>pagina del profilo utente HRDLog.net";
$lang['station_location_qo100_hint'] = "Crea la tua chiave API su <a href='https://qo100dx.club' target='_blank'>pagina del profilo QO-100 Dx Club";
$lang['station_location_qo100_realtime_upload'] = "Caricamento in tempo reale QO-100 Dx Club";
$lang['station_location_oqrs_enabled'] = "OQRS Abilitato";
$lang['station_location_oqrs_email_alert'] = "Avviso Email OQRS";
$lang['station_location_oqrs_email_hint'] = "Assicurati che l'email sia impostata sotto amministrazione e opzioni globali.";
$lang['station_location_oqrs_text'] = "Testo OQRS";
$lang['station_location_oqrs_text_hint'] = "Alcune informazioni che desideri aggiungere riguardo al QSL'ing.";
$lang['station_location_ignore'] = "Ignora Caricamento Clublog";
$lang['station_location_ignore_hint'] = "Se abilitato, i QSO effettuati da questa località non saranno caricati su Clublog. Se questo è disattivato da solo, verifica se il Call è configurato correttamente su Clublog.";
$lang['station_location_clublog_realtime_upload']='Caricamento ClubLog in tempo reale';
