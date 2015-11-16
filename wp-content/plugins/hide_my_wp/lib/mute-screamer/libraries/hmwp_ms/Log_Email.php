<?php  if ( ! defined( 'ABSPATH' ) ) exit;
/*
 * Mute Screamer
 *
 * PHPIDS for Wordpress
 */

require_once 'IDS/Log/Email.php';

/**
 * Log Email
 *
 * Log reports via email
 */
class HMWP_MS_Log_Email extends IDS_Log_Email {

	/**
	* Prepares data
	*
	* Converts given data into a format that can be read in an email.
	* You might edit this method to your requirements.
	*
	* @param mixed $data the report data
	* @return string
	*/
	protected function prepareData( $data ) {
        global $user_ID;
		$format  =  "The following potential attack has been detected by HMWP IDS\n\n. If it's done by you please Exclude it from Intrusions Log page or increase Notify Threshold from IDS settings.\n\n";
		$format .=  "IP: %s \n" ;
        $format .= "User ID: %s\n";

        $format .=  "Date: %s \n";
		$format .=  "Total Impact: %d \n";
		$format .= "Affected tags: %s \n\n";
        //hassan


		$attackedParameters = '';
		foreach ( $data as $event ) {
			$attackedParameters .= $event->getName() . '=' .
				( ( ! isset( $this->urlencode ) || $this->urlencode )
				? urlencode( $event->getValue() )
				: $event->getValue() ) . ', ';
		}

		$format .=  "Affected parameters: %s \n\n";
		$format .=  "Request URI: %s \n";
		$format .=  "Origin: %s \n";

		return sprintf( $format,
			$this->ip,
            $user_ID,
			date( 'c' ),
			$data->getImpact(),
			join( ' ', $data->getTags() ),
			trim( $attackedParameters ),
			htmlspecialchars( $_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8' ),
			$_SERVER['SERVER_ADDR']
		);
	}

	/**
	* Sends an email
	*
	* @param string $address  email address
	* @param string $data     the report data
	* @param string $headers  the mail headers
	* @param string $envelope the optional envelope string
	* @return boolean
	*/
	protected function send( $address, $data, $headers, $envelope = null ) {
		return wp_mail( $address, $this->subject, $data );

	}
}
