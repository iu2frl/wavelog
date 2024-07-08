<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
___________________________________________________________________________________________
Topbar
___________________________________________________________________________________________
*/

$lang['adif_import'] = "Importazione ADIF";
$lang['adif_export'] = "Esportazione ADIF";
$lang['darc_dcl'] = "DARC DCL";

/*
___________________________________________________________________________________________
ADIF Import
___________________________________________________________________________________________
*/

$lang['adif_alert_log_files_type'] = "I file di log devono avere estensione *.adi";

$lang['adif_select_stationlocation'] = "Seleziona la posizione della stazione";

$lang['adif_file_label'] = "File ADIF";

$lang['adif_hint_no_info_in_file'] = "Seleziona se l'ADIF importato non contiene queste informazioni.";

$lang['adif_import_dup'] = "Importa QSO duplicati";
$lang['adif_mark_imported_lotw'] = "Segna i QSO importati come caricati su LoTW";
$lang['adif_mark_imported_hrdlog'] = "Segna i QSO importati come caricati su HRDLog.net Logbook";
$lang['adif_mark_imported_qrz'] = "Segna i QSO importati come caricati su QRZ Logbook";
$lang['adif_mark_imported_clublog'] = "Segna i QSO importati come caricati su Clublog Logbook";

$lang['adif_dxcc_from_adif'] = "Usa le informazioni DXCC da ADIF";
$lang['adif_dxcc_from_adif_hint'] = "Se non selezionato, Wavelog tenterà di determinare automaticamente le informazioni DXCC.";

$lang['adif_always_use_login_call_as_op'] = "Usa sempre il nominativo di accesso come nome operatore durante l'importazione";

$lang['adif_ignore_station_call'] = "Ignora il nominativo della stazione durante l'importazione";
$lang['adif_ignore_station_call_hint'] = "Se selezionato, Wavelog tenterà di importare <b>tutti</b> i QSO dell'ADIF, indipendentemente se corrispondono alla posizione della stazione scelta.";

$lang['adif_upload'] = "Carica";

/*
___________________________________________________________________________________________
ADIF Export
___________________________________________________________________________________________
*/

$lang['adif_export_take_it_anywhere'] = "Porta il tuo file di log ovunque!";
$lang['adif_export_take_it_anywhere_hint'] = "Esportare gli ADIF consente di importare i contatti in applicazioni di terze parti come LoTW, Awards o semplicemente per mantenere un backup.";

$lang['adif_mark_exported_lotw'] = "Segna i QSO esportati come caricati su LoTW";
$lang['adif_mark_exported_no_lotw'] = "Esporta i QSO non caricati su LoTW";

$lang['adif_export_qso'] = "Esporta QSO";

$lang['adif_export_sat_only_qso'] = "Esporta solo i QSO via satellite";
$lang['adif_export_sat_only_qso_all'] = "Esporta tutti i QSO via satellite";
$lang['adif_export_sat_only_qso_lotw'] = "Esporta tutti i QSO via satellite confermati su LoTW";

/*
___________________________________________________________________________________________
Logbook of the World
___________________________________________________________________________________________
*/

$lang['adif_lotw_export_if_selected'] = "Se non viene selezionato un intervallo di date, tutti i QSO verranno contrassegnati!";
$lang['adif_mark_qso_as_exported_to_lotw'] = "Segna i QSO come esportati su LoTW";

$lang['adif_qso_marked'] = "QSO contrassegnati";
$lang['adif_yay_its_done'] = "Evviva, fatto!";
$lang['adif_qso_lotw_marked_confirm'] = "I QSO sono contrassegnati come esportati su LoTW.";

/*
___________________________________________________________________________________________
DARC DCL
___________________________________________________________________________________________
*/
$lang['adif_dcl_text_pre'] = "Vai a";
$lang['adif_dcl_text_post'] = "ed esporta il tuo log con i DOK confermati. Per velocizzare il processo puoi selezionare solo i QSO DL da scaricare (ad esempio inserendo \"DL\" nella lista dei prefissi). Il file ADIF scaricato può essere caricato qui per aggiornare i QSO con le informazioni DOK.";

$lang['only_confirmed_qsos'] = "Importa solo i dati DOK dai QSO confermati su DCL.";
$lang['only_confirmed_qsos_hint'] = "Deseleziona se vuoi aggiornare il DOK anche con i dati dai QSO non confermati su DCL.";

$lang['overwrite_by_dcl'] = "Sovrascrivi il DOK esistente nel log con quello di DCL (se diverso)";
$lang['overwrite_by_dcl_hint'] = "Se selezionato, Wavelog sovrascriverà forzatamente il DOK esistente con il DOK del log DCL.";

$lang['ignore_ambiguous'] = "Ignora i QSO che non possono essere abbinati";
$lang['ignore_ambiguous_hint'] = "Se non selezionato, verranno visualizzate informazioni sui QSO che non possono essere trovati in Wavelog.";

/*
___________________________________________________________________________________________
Import Success
___________________________________________________________________________________________
*/

$lang['adif_imported'] = "ADIF Importato";
$lang['adif_yay_its_imported'] = "Evviva, importato con successo!";
$lang['adif_import_confirm'] = "Il file ADIF è stato importato.";

$lang['adif_import_dupes_inserted'] = " <b>I duplicati sono stati inseriti!</b>";
$lang['adif_import_dupes_skipped'] = " I duplicati sono stati saltati.";

$lang['adif_import_errors'] = "Errori ADIF";
$lang['adif_import_errors_hint'] = "Hai errori nel file ADIF, i QSO sono stati comunque aggiunti ma alcuni campi non sono stati popolati.";

/*
___________________________________________________________________________________________
DCL Success
___________________________________________________________________________________________
*/

$lang['dcl_results'] = "Risultati dell'aggiornamento DCL DOK";
$lang['dcl_info_updated'] = "Le informazioni DCL per i DOK sono state aggiornate.";
$lang['dcl_qsos_updated'] = "QSO aggiornati";
$lang['dcl_qsos_ignored'] = "QSO ignorati";
$lang['dcl_qsos_unmatched'] = "QSO non abbinati";
$lang['dcl_no_qsos_updated'] = "Nessun QSO trovato che possa essere aggiornato.";
$lang['dcl_dok_errors'] = "Errori DOK";
$lang['dcl_dok_errors_details'] = "Ci sono dati diversi per DOK nel tuo log rispetto a DCL";
$lang['dcl_qsl_status'] = "Stato QSL DCL";
$lang['dcl_qsl_status_c'] = "confermato da LoTW/Clublog/eQSL/Contest";
$lang['dcl_qsl_status_mno'] = "confermato dal manager dell'award";
$lang['dcl_qsl_status_i'] = "confermato dal controllo incrociato dei dati DCL";
$lang['dcl_qsl_status_w'] = "conferma in sospeso";
$lang['dcl_qsl_status_x'] = "non confermato";
$lang['dcl_qsl_status_unknown'] = "sconosciuto";
$lang['dcl_no_match'] = "Il QSO non può essere abbinato";
