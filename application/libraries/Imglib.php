<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Imglib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
		$this->CI->load->helper('security');
	}

	public function ImageUpload($sizeLimit = 3072,$widthLimit = 3000, $heightLimit =3000 )
	{
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/images/shop/';
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$config['max_size']	= $sizeLimit;
		$config['max_width']  = $widthLimit;
		$config['max_height']  = $heightLimit;

		$this->CI->load->library('upload', $config);
		$this->CI->upload->initialize($config);
		if ( ! $this->CI->upload->do_upload())
		{
			$data = array(
					'key' 	=> false,
					'data'  => $this->CI->upload->display_errors()
					);
			//echo $this->CI->upload->display_errors();
			return $data;
		}
		else
		{
			$data = array(
					'key'	=> true,
					'data'  => $this->CI->upload->data()
				);
			//print_r($this->CI->upload->data());
			return $data;
		}
	}

	function createThumb( $image, $path='/images/', $width=400, $height=325)
	{
		$newImages = substr_replace($image, '_small', -4, 0);
		$ResizedImage = substr_replace($image, '_resize', -4, 0);
		
		$pathToImages = $_SERVER['DOCUMENT_ROOT'].$path.$image;
		$pathToNewImages = $_SERVER['DOCUMENT_ROOT'].$path.$newImages;
		$pathToResizedImage = $_SERVER['DOCUMENT_ROOT'].$path.$ResizedImage;
		
		list($originalWidth, $originalHeight) = getimagesize($pathToImages);
		$ratio = $width/$height;
		$orginalRatio = $originalWidth/$originalHeight;
		if($orginalRatio < $ratio)
		{
			$resizeWidth = $width;
			$resizeHeight = $width/$orginalRatio;
			$cropX = 0;
			$cropY = ($resizeHeight - $height)/2;
		}
		else
		{
			$resizeHeight = $height;
			$resizeWidth = $height*$orginalRatio;
			$cropX = ($resizeWidth - $width)/2;
			$cropY = 0;
		}
		//echo $originalWidth."-111-". $originalHeight."-222-";
		//die($ratio);
		//die($pathToImages);

		//RESIZE
		$config = array(
	        'image_library' 	=> 'gd2',
	        'quality' 			=> '100%',
	        'source_image' 		=>  $pathToImages,
	        'maintain_ratio' 	=> false,
	        'new_image' 		=> $pathToResizedImage,
	        'create_thumb' 		=> false,
	        'width' 			=> $resizeWidth,
	        'height' 			=> $resizeHeight
	    );     

		
		$this->CI->load->library('image_lib', $config); 
		$this->CI->image_lib->initialize($config);
		if($this->CI->image_lib->resize())
		{
			$this->CI->image_lib->clear();
		}
		else
		{
			return false;
		}
		
		//CROP
		$config = array(
	        'image_library' 	=> 'gd2',
	        'quality' 			=> '100%',
	        'source_image' 		=> $pathToResizedImage,
	        'x_axis' 			=> $cropX,
	        'y_axis' 			=> $cropY,
	        'new_image' 		=> $pathToNewImages,
	        'maintain_ratio' 	=> false,
	        'create_thumb' 		=> false,
	        'width' 			=> $width,
	        'height' 			=> $height
	    );     

		
		$this->CI->load->library('image_lib', $config); 
		$this->CI->image_lib->initialize($config);
		if($this->CI->image_lib->crop())
		{
			unlink($pathToResizedImage);
			$this->CI->image_lib->clear();
			return $newImages;
		}
		else
		{
			 return false;
		}
		
	}
	
	function addWaterMarking($imagePath, $waterMarkingPath)
	{
		$config['source_image']	= $imagePath;
		$config['wm_overlay_path'] = $waterMarkingPath;
		$config['wm_type'] = 'overlay';
		$config['wm_opacity'] = 50;
		$config['wm_x_transp']	= 4;
		$config['wm_y_transp'] = 4;
		$config['wm_vrt_alignment'] = 'bottom';
		$config['wm_hor_alignment'] = 'right';
		$config['wm_padding'] = '20';

		$this->image_lib->initialize($config); 

		$this->image_lib->watermark();

	}

	function getImagesFromFolder()
	{
		$imageList = array();
		if ($handle = opendir($_SERVER['DOCUMENT_ROOT'].'/elfinder/files/')) 
		{
			/* This is the correct way to loop over the directory. */
			while (false !== ($folder = readdir($handle))) 
			{
				if ($folder[0] != "." ) 
				{
					echo "$folder<br/>";
					//$imageList
					if($dir = opendir($_SERVER['DOCUMENT_ROOT'].'/elfinder/files/'.$folder))
					while (false !== ($img = readdir($dir))) 
					{
						if ($img[0] != "." ) 
						{
							echo "$img<br/>";
						}
						
					}
					closedir($dir);

				}
				
			}
			closedir($handle);
		}
	}
}
?>
