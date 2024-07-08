<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$lang['options_wavelog_options'] = 'Opzioni Wavelog';
$lang['options_message1'] = 'Le Opzioni Wavelog sono impostazioni globali utilizzate per tutti gli utenti dell\'installazione, che vengono sovrascritte se c\'è un\'impostazione a livello utente.';

$lang['options_appearance'] = 'Aspetto';
$lang['options_theme'] = 'Tema';
$lang['options_saved'] = "Opzioni salvate";
$lang['options_global_theme_choice_this_is_used_when_users_arent_logged_in'] = 'Scelta del Tema Globale, utilizzato quando gli utenti non sono loggati.';
$lang['options_public_search_bar'] = 'Barra di Ricerca Pubblica';
$lang['options_this_allows_non_logged_in_users_to_access_the_search_functions'] = 'Questo consente agli utenti non loggati di accedere alle funzioni di ricerca.';
$lang['options_dashboard_notification_banner'] = 'Banner di Notifica Dashboard';
$lang['options_this_allows_to_disable_the_global_notification_banner_on_the_dashboard'] = 'Questo consente di disabilitare il banner di notifica globale sulla dashboard.';
$lang['options_dashboard_map'] = 'Mappa Dashboard';
$lang['options_this_allows_the_map_on_the_dashboard_to_be_disabled_or_placed_on_the_right'] = 'Questo consente di disabilitare la mappa sulla dashboard o di posizionarla a destra.';
$lang['options_logbook_map'] = 'Mappa Logbook';
$lang['options_this_allows_to_disable_the_map_in_the_logbook'] = 'Questo consente di disabilitare la mappa nel logbook.';
$lang['options_public_maps'] = "Mappe Pubbliche";
$lang['options_this_allows_to_disable_all_maps_in_the_public_view'] = "Questo consente di disabilitare tutte le mappe nella visualizzazione pubblica. Questo influisce sulla mappa principale e sulla mappa dei gridsquares.";

$lang['options_radios'] = 'Radio';
$lang['options_radio_settings'] = 'Impostazioni Radio';
$lang['options_radio_timeout_warning'] = 'Avviso Timeout Radio';
$lang['options_the_radio_timeout_warning_is_used_on_the_qso_entry_panel_to_alert_you_to_radio_interface_disconnects'] = 'L\'avviso di timeout della radio è utilizzato nel pannello di inserimento QSO per avvisarti sugli scollegamenti dell\'interfaccia radio.';
$lang['options_this_number_is_in_seconds'] = 'Questo numero è in secondi.';
$lang['options_radio_timeout_warning_changed_to'] = 'Timeout avviso radio cambiato a ';

$lang['options_email'] = 'Email';
$lang['options_outgoing_protocol'] = 'Protocollo di Invio';
$lang['options_smtp_encryption'] = 'Crittografia SMTP';
$lang['options_email_address'] = 'Indirizzo Email';
$lang['options_email_sender_name'] = 'Nome Mittente Email';
$lang['options_smtp_host'] = 'Host SMTP';
$lang['options_smtp_port'] = 'Porta SMTP';
$lang['options_smtp_username'] = 'Nome Utente SMTP';
$lang['options_smtp_password'] = 'Password SMTP';
$lang['options_mail_settings_saved'] = "Le impostazioni sono state salvate correttamente.";
$lang['options_mail_settings_failed'] = "Qualcosa è andato storto nel salvataggio delle impostazioni. Riprova.";
$lang['options_outgoing_protocol_hint'] = "Il protocollo che verrà utilizzato per inviare le email.";
$lang['options_smtp_encryption_hint'] = "Scegli se le email devono essere inviate con TLS o SSL.";
$lang['options_email_address_hint'] = "L'indirizzo email da cui vengono inviate le email, ad esempio 'wavelog@example.com'";
$lang['options_email_sender_name_hint'] = "Il nome del mittente dell'email, ad esempio 'Wavelog'";
$lang['options_smtp_host_hint'] = "Il nome host del server di posta, ad esempio 'mail.example.com' (senza 'ssl://' o 'tls://')";
$lang['options_smtp_port_hint'] = "La porta SMTP del server di posta, ad esempio se viene utilizzato TLS -> '587', se viene utilizzato SSL -> '465'";
$lang['options_smtp_username_hint'] = "Il nome utente per accedere al server di posta, di solito è l'indirizzo email utilizzato.";
$lang['options_smtp_password_hint'] = "La password per accedere al server di posta.";
$lang['options_send_testmail'] = "Invia Email di Test";
$lang['options_send_testmail_hint'] = "L'email sarà inviata all'indirizzo definito nelle impostazioni del tuo account.";
$lang['options_send_testmail_failed'] = "Invio dell'email di test non riuscito. Si è verificato un problema.";
$lang['options_send_testmail_success'] = "Email di test inviata. Le impostazioni dell'email sembrano essere corrette.";

$lang['options_oqrs'] = 'Opzioni OQRS';
$lang['options_global_text'] = 'Testo Globale';
$lang['options_this_text_is_an_optional_text_that_can_be_displayed_on_top_of_the_oqrs_page'] = 'Questo testo è facoltativo e può essere visualizzato nella parte superiore della pagina OQRS.';
$lang['options_grouped_search'] = 'Ricerca Raggruppata';
$lang['options_when_this_is_on_all_station_locations_with_oqrs_active_will_be_searched_at_once'] = 'Quando questa opzione è attiva, tutte le località delle stazioni con OQRS attivo saranno cercate contemporaneamente.';
$lang['options_grouped_search_show_station_name'] = "Mostra nome della località della stazione nei risultati della ricerca raggruppata";
$lang['options_grouped_search_show_station_name_hint'] = "Se la ricerca raggruppata è attiva, puoi decidere se mostrare il nome della località della stazione nella tabella dei risultati.";
$lang['options_oqrs_options_have_been_saved'] = 'Le opzioni OQRS sono state salvate.';

$lang['options_dxcluster'] = 'DXCluster';
$lang['options_dxcluster_provider'] = 'Fornitore del DXClusterCache';
$lang['options_dxcluster_longtext'] = 'Il fornitore della cache DXCluster. Puoi configurare la tua Cache con <a href="https://github.com/int2001/DXClusterAPI">DXClusterAPI</a> o usarne una pubblica';
$lang['options_dxcluster_hint'] = 'URL della cache DXCluster, ad esempio https://dxc.jo30.de/dxcache';
$lang['options_dxcluster_settings'] = 'DXCluster';
$lang['options_dxcache_url_changed_to'] = 'URL della cache DXCluster cambiato in ';
$lang['options_dxcluster_maxage'] = 'Età massima degli spot gestiti';
$lang['options_dxcluster_maxage_hint'] = 'L\'età in minuti degli spot che saranno gestiti nel bandplan/lookup';
$lang['options_dxcluster_decont'] = 'Mostra spot che provengono dal seguente continente';
$lang['options_dxcluster_maxage_changed_to']='Età massima degli spot cambiata a ';
$lang['options_dxcluster_decont_changed_to']='de continente cambiato a ';
$lang['options_dxcluster_decont_hint']='Vengono mostrati solo spot effettuati da entità provenienti da questo continente';

$lang['options_version_dialog'] = "Informazioni sulla Versione";
$lang['options_version_dialog_close'] = "Chiudi";
$lang['options_version_dialog_dismiss'] = "Non mostrare più";
$lang['options_version_dialog_settings'] = "Impostazioni Informazioni sulla Versione";
$lang['options_version_dialog_header'] = "Intestazione Informazioni sulla Versione";
$lang['options_version_dialog_header_hint'] = "Puoi cambiare l'intestazione del dialogo delle informazioni sulla versione.";
$lang['options_version_dialog_header_changed_to'] = "Intestazione Informazioni sulla Versione cambiata in";
$lang['options_version_dialog_mode'] = "Modalità Informazioni sulla Versione";
$lang['options_version_dialog_mode_release_notes'] = "Solo Note di Rilascio";
$lang['options_version_dialog_mode_custom_text'] = "Solo Testo Personalizzato";
$lang['options_version_dialog_mode_both'] = "Note di Rilascio e Testo Personalizzato";
$lang['options_version_dialog_mode_disabled'] = "Disabilitato";
$lang['options_version_dialog_mode_hint'] = "Le Informazioni sulla Versione sono mostrate a tutti gli utenti. L'utente ha l'opzione di ignorare il dialogo dopo averlo letto. Seleziona se mostrare solo le note di rilascio (ottenute da GitHub), solo il testo personalizzato o entrambi.";
$lang['options_version_dialog_custom_text'] = "Testo Personalizzato Informazioni sulla Versione";
$lang['options_version_dialog_custom_text_hint'] = "Questo è il testo personalizzato che viene mostrato nel dialogo.";
$lang['options_version_dialog_mode_changed_to'] = "Modalità Informazioni sulla Versione cambiata in";
$lang['options_version_dialog_custom_text_saved'] = "Testo Personalizzato Informazioni sulla Versione salvato!";
$lang['options_version_dialog_success_show_all'] = "Le Informazioni sulla Versione saranno mostrate nuovamente a tutti gli utenti";
$lang['options_version_dialog_success_hide_all'] = "Le Informazioni sulla Versione non saranno più mostrate a nessun utente";
$lang['options_version_dialog_show_hide'] = "Mostra/Nascondi Dialogo Informazioni sulla Versione per tutti gli Utenti";
$lang['options_version_dialog_show_all'] = "Mostra per tutti gli Utenti";
$lang['options_version_dialog_hide_all'] = "Nascondi per tutti gli Utenti";
$lang['options_version_dialog_show_all_hint'] = "Questo mostrerà automaticamente il dialogo della versione a tutti gli utenti al loro prossimo caricamento della pagina.";
$lang['options_version_dialog_hide_all_hint'] = "Questo disabiliterà il popup automatico del dialogo della versione per tutti gli utenti.";

$lang['options_save'] = 'Salva';

// Bands

$lang['options_bands'] = "Bande";
$lang['options_bands_text_ln1'] = "Utilizzando l'elenco delle bande puoi controllare quali bande vengono mostrate durante la creazione di un nuovo QSO.";
$lang['options_bands_text_ln2'] = "Le bande attive verranno visualizzate nel menu a discesa 'Banda' del QSO, mentre le bande inattive saranno nascoste e non potranno essere selezionate.";
$lang['options_bands_create'] = "Crea una banda";
$lang['options_bands_edit'] = "Modifica Banda";
$lang['options_bands_activate_all'] = "Attiva tutte";
$lang['options_bands_activateall_warning'] = "Attenzione! Sei sicuro di voler attivare tutte le bande?";
$lang['options_bands_deactivate_all'] = "Disattiva tutte";
$lang['options_bands_deactivateall_warning'] = "Attenzione! Sei sicuro di voler disattivare tutte le bande?";
$lang['options_bands_ssb_qrg'] = "Frequenza SSB";
$lang['options_bands_ssb_qrg_hint'] = "Frequenza per la modalità SSB nella banda (deve essere in Hz)";
$lang['options_bands_data_qrg'] = "Frequenza DATA";
$lang['options_bands_data_qrg_hint'] = "Frequenza per la modalità DATA nella banda (deve essere in Hz)";
$lang['options_bands_cw_qrg'] = "Frequenza CW";
$lang['options_bands_cw_qrg_hint'] = "Frequenza per la modalità CW nella banda (deve essere in Hz)";

$lang['options_bands_name_band'] = "Nome della Banda (E.g. 20m)";
$lang['options_bands_name_bandgroup'] = "Nome del gruppo di bande (E.g. hf, vhf, uhf, shf)";
$lang['options_bands_delete_warning'] = "Attenzione! Sei sicuro di voler eliminare la seguente banda: ";
