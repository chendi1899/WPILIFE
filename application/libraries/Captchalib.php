<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captchalib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
		$this->CI->load->helper('captcha');
	}

	// http://ellislab.com/codeigniter/user-guide/helpers/captcha_helper.html
	public function generateCaptchaCode() 
	{
		$randInt = rand ( 1000 , 9999 );
		$vals = array(
			'word'		 => $randInt,
			'img_path'	 => './captcha/',
			'img_url'	 => base_url().'captcha/',
			'font_path'	 => '/usr/share/fonts/truetype/ttf-dejavu/DejaVuSans-Bold.ttf',
			'img_width'	 => '127',
			'img_height' => 36,
			'expiration' => 600 // ten minutes
			);

		$cap = create_captcha($vals);
		
		return $cap;
	}
	
}
?>
