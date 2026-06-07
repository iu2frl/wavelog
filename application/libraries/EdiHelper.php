<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EdiHelper {

	public function getEdiLine($qso) {
		$normalFields = array(
			'ADDRESS',
			'AGE',
			'A_INDEX',
			'ANT_AZ',
			'ANT_EL',
			'ANT_PATH',
			'ARRL_SECT',
			'AWARD_GRANTED',
			'AWARD_SUBMITTED',
			'BAND',
			'BAND_RX',
			'BIOGRAPHY',
			'CALL',
			'CHECK',
			'CLASS',
			'CLUBLOG_QSO_UPLOAD_STATUS',
			'CNTY',
			'COMMENT',
			'CONT',
			'CONTACTED_OP',
			'CONTEST_ID',
			'CQZ',
			'CREDIT_GRANTED',
			'CREDIT_SUBMITTED',
			'DARC_DOK',
			'DISTANCE',
			'DXCC',
			'EMAIL',
			'EQ_CALL',
			'EQSL_QSL_RCVD',
			'EQSL_QSL_SENT',
			'EQSL_STATUS',
			'EQSL_AG',
			'FISTS',
			'FISTS_CC',
			'FORCE_INIT',
			'GRIDSQUARE',
			'HEADING',
			'IOTA',
			'ITUZ',
			'K_INDEX',
			'LAT',
			'LON',
			'LOTW_QSL_RCVD',
			'LOTW_QSL_SENT',
			'LOTW_STATUS',
			'MAX_BURSTS',
			'MODE',
			'MS_SHOWER',
			'NAME',
			'NOTES',
			'NR_BURSTS',
			'NR_PINGS',
			'OPERATOR',
			'OWNER_CALLSIGN',
			'PFX',
			'PRECEDENCE',
			'PROP_MODE',
			'PUBLIC_KEY',
			'HRDLOG_QSO_UPLOAD_STATUS',
			'QRZCOM_QSO_UPLOAD_STATUS',
			'QSLMSG',
			'QSL_RCVD',
			'QSL_RCVD_VIA',
			'QSL_SENT',
			'QSL_SENT_VIA',
			'QSL_VIA',
			'QSO_COMPLETE',
			'QSO_RANDOM',
			'QTH',
			'REGION',
			'RIG',
			'RST_RCVD',
			'RST_SENT',
			'RX_PWR',
			'SAT_MODE',
			'SAT_NAME',
			'SFI',
			'SILENT_KEY',
			'SKCC',
			'SOTA_REF',
			'WWFF_REF',
			'POTA_REF',
			'SRX',
			'SRX_STRING',
			'STATE',
			'STX',
			'STX_STRING',
			'SUBMODE',
			'SWL',
			'TEN_TEN',
			'TX_PWR',
			'UKSMG',
			'USACA_COUNTIES',
			'VUCC_GRIDS',
			'WEB',
			'CNTY_ALT',
			'MY_CNTY_ALT',
			'MY_DARC_DOK',
			'MORSE_KEY_INFO',
			'MORSE_KEY_TYPE',
			'QSLMSG_RCVD',
			'DCL_QSL_RCVD',
			'DCL_QSL_SENT'
		);

		$dateFields = array(
			'EQSL_QSLRDATE',
			'EQSL_QSLSDATE',
			'LOTW_QSLRDATE',
			'LOTW_QSLSDATE',
			'QSLRDATE',
			'QSLSDATE',
			'CLUBLOG_QSO_UPLOAD_DATE',
			'HRDLOG_QSO_UPLOAD_DATE',
			'QRZCOM_QSO_UPLOAD_DATE',
			'DCL_QSLRDATE',
			'DCL_QSLSDATE'
		);

		// Build ADIF fields

		$line = "";
		foreach ($normalFields as $field) {
			$line .= $this->getEdiFieldLine($field, $qso->{'COL_' . $field});
		}

		foreach ($dateFields as $field) {
			if ($qso->{'COL_' . $field}) {
				$date = strtotime($qso->{'COL_' . $field});
				$date = date('Ymd', $date);
				$line .= $this->getEdiFieldLine($field, $date);
			}
		}

		if ($qso->COL_DXCC != 0) {
			$line .= $this->getEdiFieldLine("COUNTRY", $qso->COL_COUNTRY);
		}

		if ($qso->COL_FREQ != 0) {
			$freq_in_mhz = $qso->COL_FREQ / 1000000;
			$line .= $this->getEdiFieldLine("FREQ", $freq_in_mhz);
		}

		if ($qso->COL_FREQ_RX != 0) {
			$freq_rx_in_mhz = $qso->COL_FREQ_RX / 1000000;
			$line .= $this->getEdiFieldLine("FREQ_RX", $freq_rx_in_mhz);
		}

		if (isset($qso->COL_TIME_ON) && (date('YmdHis',strtotime($qso->COL_TIME_ON)) != '-00011130000000')) {
			$date_on = strtotime($qso->COL_TIME_ON);
			$date_on = date('Ymd', $date_on);
			$line .= $this->getEdiFieldLine("QSO_DATE", $date_on);

			$time_on = strtotime($qso->COL_TIME_ON);
			$time_on = date('His', $time_on);
			$line .= $this->getEdiFieldLine("TIME_ON", $time_on);
		} else {
			$line .= $this->getEdiFieldLine("QSO_DATE", '19700101');
			$line .= $this->getEdiFieldLine("TIME_ON", '000000');
		}

		if (isset($qso->COL_TIME_OFF) && (date('YmdHis',strtotime($qso->COL_TIME_OFF)) != '-00011130000000')) {
			$date_off = strtotime($qso->COL_TIME_OFF);
			$date_off = date('Ymd', $date_off);
			$line .= $this->getEdiFieldLine("QSO_DATE_OFF", $date_off);

			$time_off = strtotime($qso->COL_TIME_OFF);
			$time_off = date('His', $time_off);
			$line .= $this->getEdiFieldLine("TIME_OFF", $time_off);
		} else {
			$line .= $this->getEdiFieldLine("QSO_DATE_OFF", '19700101');
			$line .= $this->getEdiFieldLine("TIME_OFF", '000000');
		}

		// "MY" information
		$line .= $this->getEdiFieldLine("STATION_CALLSIGN", $qso->station_callsign);

		$line .= $this->getEdiFieldLine("MY_CITY", $qso->station_city);

		$line .= $this->getEdiFieldLine("MY_COUNTRY", $qso->station_country);

		$line .= $this->getEdiFieldLine("MY_DXCC", $qso->station_dxcc);

		if (strpos($qso->station_gridsquare, ',') !== false ) {
			$line .= $this->getEdiFieldLine("MY_VUCC_GRIDS", $qso->station_gridsquare);
		} else {
			$line .= $this->getEdiFieldLine("MY_GRIDSQUARE", $qso->station_gridsquare);
		}

		$line .= $this->getEdiFieldLine("MY_IOTA", $qso->station_iota);

		$line .= $this->getEdiFieldLine("MY_SOTA_REF", $qso->station_sota);

		$line .= $this->getEdiFieldLine("MY_WWFF_REF", $qso->station_wwff);

		$line .= $this->getEdiFieldLine("MY_POTA_REF", $qso->station_pota);

		$line .= $this->getEdiFieldLine("MY_CQ_ZONE", $qso->station_cq);

		$line .= $this->getEdiFieldLine("MY_ITU_ZONE", $qso->station_itu);

		$line .= $this->getEdiFieldLine("MY_STATE", $qso->state);

		// See: https://edi.org/314/ADIF_314.htm#Sponsor_Defined_Code_Format
		if ($qso->station_cnty) {
			switch ($qso->station_dxcc) {
			case '6':
			case '110':
			case '291':
				$county = trim($qso->state) . "," . trim($qso->station_cnty);
				break;
			default:
				$county = trim($qso->station_cnty);
				break;
			}
		} else {
			$county = '';
		}

		$line .= $this->getEdiFieldLine("MY_CNTY", $county);

		$line .= $this->getEdiFieldLine("MY_SIG", $qso->station_sig);
		$line .= $this->getEdiFieldLine("MY_SIG_INFO", $qso->station_sig_info);

		$line .= $this->getEdiFieldLine("SIG", $qso->{'COL_SIG'});
		$line .= $this->getEdiFieldLine("SIG_INFO", $qso->{'COL_SIG_INFO'});



		$line .= "<EOR>\r\n\r\n";

		return $line;
	}

	function getEdiHeader() {
		$edi_header = "[REG1TEST;1]\n"; // Identifier and file version
		$edi_header .= "TName=\n"; // Name of the contest in which the station partecipated
		$edi_header .= "TDate=\n"; // First and last date of the contest, separated by a semicolumn: YYYYMMDD;YYYYMMDD
		$edi_header .= "PCall=\n"; // Callsign used during the contest
		$edi_header .= "PWWLo=\n"; // Home locator of the station (6 characters)
        $edi_header .= "PExch=\n"; // Exchange sent during the contest, must be the same for all QSOs
        $edi_header .= "PAddr1=\n"; // Address line 1 of the station
        $edi_header .= "PAddr2=\n"; // Address line 2 of the station
        $edi_header .= "PSect=\n"; // Class, category, group or section in which the station partecipated
        $edi_header .= "PBand=\n"; // Band used during the contest
        $edi_header .= "PClub=\n"; // Radio club of the station
        $edi_header .= "RName=\n"; // First and last name of the station owner
        $edi_header .= "RCall=\n"; // Callsign of the station owner
        $edi_header .= "RAdr1=\n"; // Address line 1 of the station owner
        $edi_header .= "RAdr2=\n"; // Address line 2 of the station owner
        $edi_header .= "RPoCo=\n"; // Postal code of the station owner
        $edi_header .= "RCity=\n"; // City of the station owner
        $edi_header .= "RCoun=\n"; // Country of the station owner
        $edi_header .= "RPhon=\n"; // Phone number of the station owner
        $edi_header .= "RHBBS=\n"; // E-mail address of the station owner
        $edi_header .= "MOpe1=\n"; // List of the operators in the station, separated by a semicolumn
        $edi_header .= "MOpe2=\n"; // List of the operators in the station, separated by a semicolumn
        $edi_header .= "STXEq=\n"; // Transmitting equipment used during the contest
        $edi_header .= "SPowe=\n"; // Transmitting power in watts
        $edi_header .= "SRXEq=\n"; // Receiving equipment used during the contest
        $edi_header .= "SAnte=\n"; // Antenna used during the contest
        $edi_header .= "SAntH=\n"; // Height of the antenna above the ground level and sea level in meters
        $edi_header .= "CQSOs=\n"; // Total number of QSOs
        $edi_header .= "CQSOP=\n"; // Total points scored in the contest
        $edi_header .= "CWWLs=\n"; // Claimed number of WWLs worked, the number of bonus points claimed for each new WWL and the WWL multiplier
        $edi_header .= "CWWLB=\n"; // Claimed total number of WWL bonus points
        $edi_header .= "CExcs=\n"; // Claimed number of exchanges worked, the number of bonus points claimed for each new exchange and the exchange multiplier
        $edi_header .= "CExcB=\n"; // Claimed total number of exchange bonus points
        $edi_header .= "CDXCs=\n"; // Claimed number of DXCCs worked, the number of bonus points claimed for each new DXCC and the DXCC multiplier
        $edi_header .= "CDXCB=\n"; // Claimed total number of DXCC bonus points
        $edi_header .= "CToSc=\n"; // Claimed total score in the contest
        $edi_header .= "CODXC=\n"; // Claimed ODX contact call, WWL and distance in kilometers separated by a semicolumn
        $edi_header .= "[Remarks]\n"; // Undefined number of lines for additional remarks, header must be there but content is optional
        $edi_header .= "[QSORecords;x]\n"; // Header of the QSO records section, "x" is the number of QSOs in the file
		return $edi_header;
	}

    function getEdiFooter($app_name, $version)
    {
        $edi_footer = "[END;";
        $edi_footer .= "Created by $app_name $version";
        $edi_footer .= "]\n";
        return $edi_footer;
    }

    function getEdiFieldLine($edicolumn, $dbvalue) {
        if ($dbvalue !== "" && $dbvalue !== null && $dbvalue !== 0) {
            return "<" . $edicolumn . ":" . mb_strlen($dbvalue, "UTF-8") . ">" . $dbvalue . "\r\n";
        } else {
            return "";
        }
    }

	function getModeCode($mode) {
		/*
		Mode code	TX mode			RX mode
		0			non of below	non of below
		1			SSB				SSB
		2			CW				CW
		3			SSB				CW
		4			CW				SSB
		5			AM				AM
		6			FM				FM
		7			RTTY			RTTY
		8			SSTV			SSTV
		9			ATV				ATV
		*/
		return 0;
	}

	function getEdiBand($band)
	{
		/*
		Frequency			PBand
		50 - 54 MHz			50 MHz
		70 - 70,5 MHz		70 MHz
		144 - 148 MHz		144 MHz
		430 - 440 MHz		432 MHz
		1240 - 1300 MHz		1,3 GHz
		2300 - 2450 MHz		2,3 GHz
		3400 - 3600 MHz		3,4 GHz
		5650 - 5850 MHz		5,7 GHz
		10,0 - 10,5 GHz		10 GHz
		24,0 - 24,25 GHz	24 GHz
		47,0 - 47,2 GHz		47 GHz
		75,5 - 81 GHz		76 GHz
		120 - 120 GHz		120 GHz
		142 - 148 GHz		144 GHz
		241 - 250 GHz		248 GHz
		*/

		return "";
	}
}
