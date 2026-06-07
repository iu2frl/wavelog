<?php
	//only set these values if internalrender is not present or false
	$internalrender = isset($internalrender) ? $internalrender : false;
	if(!$internalrender) {
		header('Content-Type: text/plain; charset=utf-8');
		header('Content-Disposition: attachment; filename="'.$this->session->userdata('user_callsign').'-'.date('Ymd-Hi').'.adi"');
	}
$CI =& get_instance();
if (!$CI->load->is_loaded('EdiHelper')) {
	$CI->load->library('EdiHelper');
}

echo $CI->EdiHelper->getAdifHeader($CI->config->item('app_name'),$CI->optionslib->get_option('version'), $CI->optionslib->get_option('adif_version'));

if (isset($reverse) && $reverse === true) {
   foreach ($qsos->result() as $qso) {
      if (isset($qso->COL_TIME_ON) && (date('YmdHis',strtotime($qso->COL_TIME_ON)) != '-00011130000000')) {
         $date_on = strtotime($qso->COL_TIME_ON);
         $date_on = date('Ymd', $date_on);
         echo $CI->EdiHelper->getAdifFieldLine("QSO_DATE", $date_on);

         $time_on = date('His', $date_on);
         echo $CI->EdiHelper->getAdifFieldLine("TIME_ON", $time_on);
      }
      echo $CI->EdiHelper->getAdifFieldLine("CALL", $qso->COL_STATION_CALLSIGN);
      echo $CI->EdiHelper->getAdifFieldLine("MODE", $qso->COL_MODE);
      echo $CI->EdiHelper->getAdifFieldLine("BAND", $qso->COL_BAND);
      echo $CI->EdiHelper->getAdifFieldLine("RST_SENT", $qso->COL_RST_RCVD);
      echo $CI->EdiHelper->getAdifFieldLine("RST_RCVD", $qso->COL_RST_SENT);
      echo $CI->EdiHelper->getAdifFieldLine("SAT_NAME", $qso->COL_SAT_NAME);
      echo $CI->EdiHelper->getAdifFieldLine("PROP_MODE", $qso->COL_PROP_MODE);
      if (str_contains($qso->station_gridsquare, ',')) {
         echo $CI->EdiHelper->getAdifFieldLine("VUCC_GRIDS", $qso->station_gridsquare);
      } else {
         echo $CI->EdiHelper->getAdifFieldLine("GRIDSQUARE", $qso->station_gridsquare);
      }
      echo $CI->EdiHelper->getAdifFieldLine("SAT_MODE", $qso->COL_SAT_MODE);
      echo $CI->EdiHelper->getAdifFieldLine("BAND_RX", $qso->COL_BAND_RX);
      if ($qso->COL_FREQ != 0) {
         echo $CI->EdiHelper->getAdifFieldLine("FREQ", ($qso->COL_FREQ / 1000000));
      }
      if ($qso->COL_FREQ_RX != 0) {
         echo $CI->EdiHelper->getAdifFieldLine("FREQ_RX", ($qso->COL_FREQ_RX / 1000000));
      }
      echo "<EOR>\n\n";
   }
} else {
   foreach ($qsos->result() as $qso) {
       echo $CI->EdiHelper->getAdifLine($qso);
   }
}
?>
