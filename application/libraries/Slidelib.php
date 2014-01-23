<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Slidelib
{

	public $CI = NULL;
	public function __construct(){	
		$this->CI =& get_instance();
	}


	function getSlides(){

		$imageType = array("jpg", "png", "gif");
		$htmlOutput = '';

		$din = $_SERVER['DOCUMENT_ROOT'].'/images/slides/';

		if ($handle = opendir($din)) {

			// loop over the directory. 
			while (false !== ($file = readdir($handle))) {
				if ($file[0] != "." ) {
					
					$ext = strtolower(array_pop(explode('.',$file)));
					$txtFile = str_replace($ext,'txt',$file);
					if(in_array($ext, $imageType)){
						$htmlOutput .= '<article class="ls-layer" style="slidedelay: 7000;">';
						$htmlOutput .= '<img src="images/slides/'.$file.'" class="ls-bg" alt="">';
						if(file_exists($din.$txtFile)){
							$txt = file_get_contents($din.$txtFile,NULL, NULL, 0, 40);
							if($txt){
								if(rand(1, 77) % 2 == 1) $left = 40 ; else  $left = 756;
								$htmlOutput .= '<h3 class="ls-s1 caption-transparent" style="top:200px; left:'.$left.'px;">'.$txt.'</h3>';
							}
						}
						$htmlOutput .= '</article>';
					} else {
						
					}
					
					
				}
				
			}
			closedir($handle);
			return $htmlOutput;

		} else 	{
			return false;
		}
	
	}
	
}
?>
