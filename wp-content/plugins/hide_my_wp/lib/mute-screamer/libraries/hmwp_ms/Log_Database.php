<?php  if ( ! defined( 'ABSPATH' ) ) exit;
/*
 * Mute Screamer
 *
 * PHPIDS for Wordpress
 */

require_once 'IDS/Log/Interface.php';

/**
 * Log Database
 *
 * Log reports using the wpdb class
 */
class HMWP_MS_Log_Database implements IDS_Log_Interface {

    /**
     * Holds current remote address
     *
     * @var string
     */
    private $ip = '0.0.0.0';

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		$this->ip = HMWP_MS_Utils::ip_address();
	}

	/**
	* Inserts detected attacks into the database
	*
	* @param object
	* @return boolean
	*/
	public function execute( IDS_Report $report_data ) {
		global $wpdb, $current_user ;

        if (!$current_user)
            $user_id = 0;
        else
            $user_id = $current_user->ID;

		if ( ! isset( $_SERVER['REQUEST_URI'] ) ) {
			$_SERVER['REQUEST_URI'] = substr( $_SERVER['PHP_SELF'], 1 );
			if ( isset( $_SERVER['QUERY_STRING'] ) && $_SERVER['QUERY_STRING'] ) {
				$_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
			}
		}

		foreach ( $report_data as $event ) {
			$data['name']    = $event->getName();
			$data['value']   = stripslashes( $event->getValue() );
			$data['page']    = isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '';
			$data['tags']    = implode( ', ', $event->getTags() );
			$data['ip']      = $this->ip;
            $data['user_id']  = $user_id; //hassan
			$data['impact']  = $event->getImpact();
            $data['total_impact']  =  $report_data->getImpact(); //hassan
			$data['origin']  = $_SERVER['SERVER_ADDR'];
			$data['created'] = date( 'Y-m-d H:i:s', time() );

			if ( false === $wpdb->insert( $wpdb->hmwp_ms_intrusions, $data ) ) {
				return false;
			}
		}

		return true;
	}
}
