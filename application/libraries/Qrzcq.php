<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Controls the interaction with the QRZcq.com Subscription based XML API.
*/


class Qrzcq {

	// Return session key
	public function session($username, $password) {
		// URL to the XML Source
		$ci = & get_instance();
		$xml_feed_url = 'https://ssl.qrzcq.com/xml/?username='.$username.';password='.urlencode($password).';agent=wavelog';

		// CURL Functions
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $xml_feed_url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Wavelog/'.$ci->optionslib->get_option('version'));
		$xml = curl_exec($ch);
		curl_close($ch);

		// Create XML object
		$xml = simplexml_load_string($xml);

		if (isset($xml->Session->Key)) {
			$result = array( 0, (string) $xml->Session->Key);
		} else if (isset($xml->Session->Error)) {
			$result = array( 1, (string) $xml->Session->Error);
		} else {
			$result = array( 2, 'Unknown error');
		}

		return $result;
	}

	// Set Session Key session.
	public function set_session($username, $password) {

		$ci = & get_instance();

		// URL to the XML Source
		$xml_feed_url = 'https://ssl.qrzcq.com/xml/?username='.$username.';password='.urlencode($password).';agent=wavelog';

		// CURL Functions
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $xml_feed_url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Wavelog/'.$ci->optionslib->get_option('version'));
		$xml = curl_exec($ch);
		curl_close($ch);

		// Create XML object
		$xml = simplexml_load_string($xml);

		$key = (string) $xml->Session->Key;

		$ci->session->set_userdata('qrzcq_session_key', $key);

		return true;
	}

	// Get the image path from the scraped HTML
	private function get_scraped_image_url($xpath) {
		$imageNode = $xpath->query("//img[@id='user-first-pic']");
		if ($imageNode->length > 0) {
			$imgSrc = $imageNode->item(0)->getAttribute('src');
			if (strpos($imgSrc, 'nopic') === false) {
				return $imgSrc;
			}
		}
		return '';
	}

	// Get the DX data from the scraped HTML
	private function get_scraped_data($callsign, $reduced) {
		$data = null;
		$ci = &get_instance();

		// Perform a plain HTTP GET request to the QRZCQ callsign page
		$url = 'https://www.qrzcq.com/call/' . urlencode($callsign);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Wavelog/' . $ci->optionslib->get_option('version'));
		$html = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		if ($httpcode != 200) return $data['error'] = 'Problems with qrzcq.com communication'; // Exit function if no 200. If request fails, 0 is returned

		// Now parse the HTML to extract the required fields
		$dom = new DOMDocument();
		libxml_use_internal_errors(true); // Suppress HTML parsing warnings
		$dom->loadHTML($html);
		libxml_clear_errors();
		$xpath = new DOMXPath($dom);

		// Helper function to extract table row values
		$getTableValue = function ($label) use ($xpath) {
			$nodes = $xpath->query("//td[b[text()='$label']]/following-sibling::td[1]");
			return $nodes->length > 0 ? trim($nodes->item(0)->nodeValue) : '';
		};

		// Extract callsign from the large font element
		$callNode = $xpath->query("//font[contains(@style, 'font-size: 36pt')]");
		$data['callsign'] = $callNode->length > 0 ? trim($callNode->item(0)->nodeValue) : '';

		// Extract name from haminfoaddress paragraph (bold text)
		$nameNodes = $xpath->query("//p[@class='haminfoaddress']/b");
		$data['name'] = $nameNodes->length > 0 ? trim($nameNodes->item(0)->nodeValue) : '';

		// Extract gridsquare from Locator field
		$unclean_gridsquare = $getTableValue('Locator:');
		$clean_gridsquare = strlen($unclean_gridsquare) > 8 ? substr($unclean_gridsquare, 0, 8) : $unclean_gridsquare;
		if ($reduced == false) {
			$data['gridsquare'] = $clean_gridsquare;

			// Extract city from haminfoaddress paragraph and format it
			$cityNodes = $xpath->query("//p[@class='haminfoaddress']");
			if ($cityNodes->length > 0) {
				$cityNode = $cityNodes->item(0);

				// Build innerHTML for the node (DOMDocument has no innerHTML helper)
				$innerHTML = '';
				foreach ($cityNode->childNodes as $child) {
					$innerHTML .= $dom->saveHTML($child);
				}

				// Remove the bold name portion (e.g. <b>...</b>) and any following whitespace
				$innerHTML = preg_replace('#<b[^>]*>.*?</b>\s*#is', '', $innerHTML);

				// Remove 'CQ-X' prefix if present
				$innerHTML = preg_replace('/^CQ-[A-Z0-9]+\s*/i', '', $innerHTML);

				// Replace <br> variants with a placeholder so existing commas remain untouched
				$placeholder = '%%%QRZCQ_BR%%%';
				$innerHTML = preg_replace('#<br\s*/?>#i', $placeholder, $innerHTML);

				// Strip any remaining HTML tags
				$stripped = strip_tags($innerHTML);

				// Split on the placeholder, trim parts and filter out empty ones
				$parts = array_filter(array_map('trim', explode($placeholder, $stripped)), function ($part) {
					return $part !== '';
				});

				// Join with comma+space and ensure no duplicate punctuation
				$cityText = implode(', ', $parts);
				$cityText = preg_replace('/\s+,\s+/', ', ', $cityText); // normalize spaces around commas
				$cityText = trim($cityText, " ,\t\n\r\0\x0B");

				$data['city'] = $cityText;
			} else {
				$data['city'] = '';
			}

			// Extract latitude
			$data['lat'] = $getTableValue('Latitude:');

			// Extract longitude
			$data['long'] = $getTableValue('Longitude:');

			// Extract DXCC Zone
			$data['dxcc'] = trim($getTableValue('DXCC Zone:'));

			// Extract state - may not be present in all entries
			$data['state'] = $getTableValue('State:');

			// Extract IOTA - may not be present
			$data['iota'] = $getTableValue('IOTA:');

			// Extract image URL from user-first-pic
			$data['image'] = $this->get_scraped_image_url($xpath);

			// Extract county - may not be present
			$data['county'] = $getTableValue('County:');

			// US County logic
			if (!empty($data['state']) && strpos($data['state'], 'US') !== false) {
				$data['us_county'] = $data['county'];
			} else {
				$data['us_county'] = null;
			}

			// Extract ITU zone
			$data['ituz'] = $getTableValue('ITU Zone:');

			// Extract CQ zone
			$data['cqz'] = $getTableValue('CQ Zone:');

			// Extract continent from the div with class 'continent'
			$continentNode = $xpath->query("//div[@class='continent']");
			$data['continent'] = $continentNode->length > 0 ? trim($continentNode->item(0)->nodeValue) : '';
		} else {
			// Reduced mode - only return name and image
			$data['image'] = $this->get_scraped_image_url($xpath);

			$data['gridsquare'] = '';
			$data['city'] 	= '';
			$data['lat'] 	= '';
			$data['long'] 	= '';
			$data['dxcc'] 	= '';
			$data['state'] 	= '';
			$data['iota'] 	= '';
			$data['county'] = '';
			$data['us_county'] = '';
			$data['ituz'] = '';
			$data['cqz'] = '';
			$data['continent'] = '';
		}

		return $data;
	}

	// Get the DX data from the XML API
	private function get_xml_data($callsign, $key, $reduced) {
		$data = null;
		$ci = & get_instance();

		// URL to the XML Source
		$xml_feed_url = 'https://ssl.qrzcq.com/xml/?s=' . $key . ';callsign=' . $callsign . '';

		// CURL Functions
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $xml_feed_url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Wavelog/'.$ci->optionslib->get_option('version'));
		$xml = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if ($httpcode != 200) return $data['error'] = 'Problems with qrzcq.com communication'; // Exit function if no 200. If request fails, 0 is returned

		// Create XML object
		$xml = simplexml_load_string($xml);
		if (!empty($xml->Session->Error)) {
			return $data['error'] = $xml->Session->Error;
		}

		// Return Required Fields
		$data['callsign'] = (string)$xml->Callsign->call;

		$data['name'] = (string)$xml->Callsign->name;

		// we always give back the name, no matter if reduced data or not
		$data['name'] = trim($data['name']);

		// Sanitize gridsquare to allow only up to 8 characters
		$unclean_gridsquare = (string)$xml->Callsign->locator; // Get the gridsquare from QRZ convert to string
		$clean_gridsquare = strlen($unclean_gridsquare) > 8 ? substr($unclean_gridsquare,0,8) : $unclean_gridsquare; // Trim gridsquare to 8 characters max

		if ($reduced == false) {

			$data['gridsquare'] = $clean_gridsquare;
			$data['city'] 		= (string)$xml->Callsign->city;
			$data['lat'] 		= (string)$xml->Callsign->latitude;
			$data['long'] 		= (string)$xml->Callsign->longitude;
			$data['dxcc'] 		= (string)$xml->Callsign->dxcc;
			$data['state'] 		= (string)$xml->Callsign->state;
			$data['iota'] 		= (string)$xml->Callsign->iota;
			$data['image'] 		= (string)$xml->Callsign->qslpic;
			$data['ituz'] 		= (string)$xml->Callsign->itu;
			$data['cqz'] 		= (string)$xml->Callsign->cq;
			$data['continent'] 	= (string)$xml->Callsign->continent;

			if ($xml->Callsign->country == "United States") {
				$data['us_county'] = (string)$xml->Callsign->county;
			} else {
				$data['us_county'] = null;
				$data['county']    = (string)$xml->Callsign->county;
			}

		} else {

			$data['gridsquare'] = '';
			$data['city'] 	= '';
			$data['lat'] 	= '';
			$data['long'] 	= '';
			$data['dxcc'] 	= '';
			$data['state'] 	= '';
			$data['iota'] 	= '';
			$data['image'] = (string)$xml->Callsign->qslpic;
			$data['county'] = '';
			$data['us_county'] = '';
			$data['ituz'] = '';
			$data['cqz'] = '';

		}

		return $data;
	}

	// Search for callsign data using either the scraper or the XML API
	public function search($callsign, $key, $reduced = false, $scraper_mode = false)
	{
		$data = null;

		try {
			if ($scraper_mode == true) {
				$data = $this->get_scraped_data($callsign, $reduced);
			} else {
				$data = $this->get_xml_data($callsign, $key, $reduced);
			}
		} finally {
			log_message('debug', 'QRZcq data from ' . ($scraper_mode ? 'Scraper' : 'API') . ' Data: ' . print_r($data, true));
			return $data;
		}
	}
}
