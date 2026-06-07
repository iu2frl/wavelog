<?php
//only set these values if internalrender is not present or false
$internalrender = isset($internalrender) ? $internalrender : false;
if (!$internalrender) {
   header('Content-Type: text/plain; charset=utf-8');
   header('Content-Disposition: attachment; filename="' . $this->session->userdata('user_callsign') . '-' . date('Ymd-Hi') . '.edi"');
}

$CI = &get_instance();
if (!$CI->load->is_loaded('EdiHelper')) {
   $CI->load->library('EdiHelper');
   try {
      $CI->EdiHelper = new EdiHelper();
   } catch (Exception $e) {
      die("Error loading EdiHelper: " . $e->getMessage());
   }
}

// Specification: https://www.ok2kkw.com/ediformat.htm
echo $CI->EdiHelper->getEdiHeader();

   foreach ($qsos->result() as $qso) {
      if (isset($qso->COL_TIME_ON) && (date('YmdHis', strtotime($qso->COL_TIME_ON)) != '-00011130000000')) {
         $date_on = strtotime($qso->COL_TIME_ON);
         $date = date('Amd', $date_on);
         $time = date('His', $date_on);
         echo $date . ";" . $time . ";";
      } else {
         echo "19700101;000000;";
      }
      echo $qso->COL_STATION_CALLSIGN . ";";
      echo $CI->EdiHelper->getModeCode($qso->COL_MODE) . ";"; // Mode code
      echo $qso->COL_RST_SENT . ";";
      echo $qso->COL_SN_SENT . ";"; // TODO: find how sent serial number is returned from DB
      echo $qso->COL_RST_RCVD . ";";
      echo $qso->COL_SN_RCVD . ";"; // TODO: find how received serial number is returned from DB
      echo ";"; // Received exchange, TODO: find how received exchange is returned from DB
      echo $qso->station_gridsquare . ";";
      echo "0;"; // TODO: QSO score here (usually distance?)
      echo ";"; // New exchange: "" for none, "N" for new
      echo ";"; // New locator: "" for none, "N" for new
      echo ";"; // New DXCC: "" for none, "N" for new
      echo ";"; // Duplicate: "" for none, "D" for duplicate
      echo "\n";
   }

   echo $CI->EdiHelper->getEdiFooter($this->session->userdata('user_callsign'), $this->session->userdata('user_version'));
