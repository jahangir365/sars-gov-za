<?php
class UploadImage {
    public function upload($imageField, $imageFieldIndex = null, $strLargePath = null, $largeWidth = 0, $largeHeight = 0, $strThumbPath = null, $thumbWidth = 0, $thumbHeight = 0)
    {
        $noLarge = false;
        $noThumb = false;

	    if(empty($strLargePath)) {
            $noLarge = true;
        }
	
        if(empty($strThumbPath)) {
            $noThumb = true;
        }

	   $fileName = isset($imageFieldIndex) ? stripslashes($_FILES[$imageField]['name'][$imageFieldIndex]) : stripslashes($_FILES[$imageField]['name']);
       $fileTempName = isset($imageFieldIndex) ? $_FILES[$imageField]['tmp_name'][$imageFieldIndex] : $_FILES[$imageField]['tmp_name'];
		
	    $extension = $this->getExtension($fileName);
		
	    $imageName = time().$imageFieldIndex.'.'.$extension;

	    if($noLarge == false) {
            $this->resize($largeWidth, $largeHeight, $fileTempName, $imageName, $strLargePath);
        }

	    if($noThumb == false) {
            $this->resize($thumbWidth, $thumbHeight,$fileTempName, $imageName, $strThumbPath);
        }
	    return $imageName;
    }
		
    private function getExtension($strInput) 
    {
	    $i = strrpos($strInput,".");
	    if (!$i){return null;}
			
	    $j = strlen($strInput) - $i;
	    $output = substr($strInput, $i + 1, $j);
	    return $output;
    }
		
    private function resize($newWidth, $newHeight, $imageTempName, $imageName, $savePath) {
	    $image = new ResizeImage;
	    $image->newWidth = $newWidth;
	    $image->newHeight = $newHeight;
	
	    $image->imageTempName = $imageTempName; // Full Path to the file
		
	    $image->ratio = true; // Keep Aspect Ratio?
			
	    // Name of the new image (optional) - If it's not set a new will be added automatically
			
	    $image->imageName = substr($imageName, 0, strrpos($imageName, '.'));
			
	    /* Path where the new image should be saved. If it's not set the script will output the image without saving it */
	
	    $image->savePath = $savePath;
			
	    $process = $image->resize();
			
	    if($process['result'] && $image->savePath)
	    {
		    //echo 'The new image ('.$process['new_file_path'].') has been saved.';
	    }
    }
}

/*-------------------------------- Image resize Class -----------------------------------------*/
class ResizeImage {
	
	var $imageTempName;
	var $newWidth;
	var $newHeight;
	var $ratio;
	var $imageName;
	var $savePath;
	
	function resize(){
		if(!file_exists($this->imageTempName)){
		  exit("File ".$this->imageTempName." does not exist.");
		}
		
		$info = GetImageSize($this->imageTempName);
		
		if(empty($info)){
		  exit("The file ".$this->imageTempName." doesn't seem to be an image.");	
		}
		
		$width = $info[0];
		$height = $info[1];
		$mime = $info['mime'];
		
		/* Keep Aspect Ratio? */
		$this->ratio = true;
		if($this->ratio){
			$thumb = ($this->newWidth < $width && $this->newHeight < $height) ? true : false; // Thumbnail
			$largeImage = ($this->newWidth >= $width || $this->newHeight >= $height) ? true : false; // Large Image
			if($thumb){
				if($this->newWidth > $this->newHeight){
					$x = ($width / $this->newWidth);
					$this->newHeight = ($height / $x);
				}else {
					$x = ($height / $this->newHeight);
					$this->newWidth = ($width / $x);
				}
			}else if($largeImage){
				if($this->newWidth >= $width){
					$x = ($this->newWidth / $width);
					$this->newHeight = ($height * $x);
				}
				else if($this->newHeight >= $height){
					$x = ($this->newHeight / $height);
					$this->newWidth = ($width * $x);
				}
			}
		}
		
		// What sort of image?
		
		$type = substr(strrchr($mime, '/'), 1);
		
		switch ($type){
			case 'jpeg':
				$image_create_func = 'ImageCreateFromJPEG';
				$image_save_func = 'ImageJPEG';
				$newImageExt = 'jpg';
				break;
			
			case 'jpg':
				$image_create_func = 'ImageCreateFromJPEG';
				$image_save_func = 'ImageJPEG';
				$newImageExt = 'jpg';
				break;
				
			case 'png':
				$image_create_func = 'ImageCreateFromPNG';
				$image_save_func = 'ImagePNG';
				$newImageExt = 'png';
				break;
			
			case 'bmp':
				$image_create_func = 'ImageCreateFromBMP';
				$image_save_func = 'ImageBMP';
				$newImageExt = 'bmp';
				break;
			
			case 'gif':
				$image_create_func = 'ImageCreateFromGIF';
				$image_save_func = 'ImageGIF';
				$newImageExt = 'gif';
				break;
			
			case 'vnd.wap.wbmp':
				$image_create_func = 'ImageCreateFromWBMP';
				$image_save_func = 'ImageWBMP';
				$newImageExt = 'bmp';
				break;
			
			case 'xbm':
				$image_create_func = 'ImageCreateFromXBM';
				$image_save_func = 'ImageXBM';
				$newImageExt = 'xbm';
				break;
			
			default: 
				$image_create_func = 'ImageCreateFromJPEG';  
				$image_save_func = 'ImageJPEG';
				$newImageExt = 'jpg';
			}
			// New Image
			$image_c = imagecreatetruecolor($this->newWidth, $this->newHeight);
			$newImage = $image_create_func($this->imageTempName);
			imagealphablending($image_c, false);
			imagesavealpha($image_c,true);
			$transparent = imagecolorallocatealpha($image_c, 255, 255, 255, 127);
			imagefilledrectangle($image_c, 0, 0, $this->newWidth, $this->newHeight, $transparent);
			
			ImageCopyResampled($image_c, $newImage, 0, 0, 0, 0, $this->newWidth, $this->newHeight, $width, $height);

				if($this->savePath)
				{
				   if($this->imageName)
				   {
					$new_name = $this->imageName.'.'.$newImageExt;
				   }
				   else
				   {
					$new_name = $this->newImageName(basename($this->imageTempName)).'_resized.'.$newImageExt;
				   }
		
				$save_path = $this->savePath.$new_name;
				}
				else
				{
				/* Show the image without saving it to a folder */
				   header("Content-Type: ".$mime);
		
				   $image_save_func($image_c);
		
				   $save_path = '';
				}
		
				$process = $image_save_func($image_c, $save_path);
		
				return array('result' => $process, 'new_file_path' => $save_path);
		
			}
	
		function newImageName($filename)
		{
			$string = trim($filename);
			$string = strtolower($string);
			$string = trim(ereg_replace("[^ A-Za-z0-9_]", " ", $string));
			$string = ereg_replace("[ \t\n\r]+", "_", $string);
			$string = str_replace(" ", '_', $string);
			$string = ereg_replace("[ _]+", "_", $string);
	
			return $string;
		}
}
?>