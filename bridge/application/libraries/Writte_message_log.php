<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Writte_message_log Save Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Logging
 * @author		elddenmedio
 */
 
class Writte_message_log {

	protected $_log_path;
	protected $_threshold	= 1;
	protected $_date_fmt	= 'Y-m-d H:i:s';
	protected $_enabled		= TRUE;

	/**
	 * Constructor
	 */
	public function __construct(){
		$config =& get_config();

		$this->_log_path = APPPATH . 'logs/audit/';

		$this->_date_fmt = $config['log_date_format'];
		
		log_message('DEBUG', 'Write File');
	}

	/**
	 * Write Log File
	 *
	 * @param	string	level
	 * @param	string	message
	 * @param	bool	whether the error is a native PHP error
	 * @return	bool
	 */	 
	public function escribe_archivo( $level = 'error', $msg = NULL ){
		$level = strtoupper($level);

		$filepath = $this->_log_path . 'log_' . date('Y-m-d') . '.txt';
		$message  = '';

		if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE)){
			return FALSE;
		}

		if( $level == 'INFO' || $level == 'ERROR' ){
			$message .= '[' . $level . ']' . "\t\t" . '[' . date($this->_date_fmt) . ']' . "\t" .  $msg . "\n";
		}
		else{
			$message .= '[' . $level . ']' . "\t" . '[' . date($this->_date_fmt) . ']' . "\t" . $msg . "\n";
		}

		flock($fp, LOCK_EX);
		fwrite($fp, $message);
		flock($fp, LOCK_UN);
		fclose($fp);

		@chmod($filepath, FILE_WRITE_MODE);
		return TRUE;
	}
}

// END Writte Message Log Class

/* End of file Writte_message_log.php */
/* Location: ./aplication/libraries/writte_message_log.php */