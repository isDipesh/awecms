<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class thumbnalize extends fbgallery
{
	//here we set parameters to be used when create the thumbnails from new uploaded pictures
	public function thumb()
	{
		Yii::import('fbgallery.drivers.Image');

		$quality =  $this->conf->quality;
		$sharpen =  $this->conf->sharpen;
		$imgWidth = $this->conf->imgWidth;
		$thWidth =  $this->conf->thWidth;

		//create an array with filenames of files uploaded in tmp folder
		$arrFiles = MyFiles::filesFromDir($this->path->tmp);

		//select the type of resizing
		switch($this->conf->thumbStyle){
			case 'square':
				self::square($arrFiles, $quality, $sharpen, $imgWidth, $thWidth);
			break;
			case 'landscape':
				self::landscape($arrFiles, $quality, $sharpen, $imgWidth, $thWidth);
			break;
			case 'portrait':
				self::portrait($arrFiles, $quality, $sharpen, $imgWidth, $thWidth);
			break;
		}
		
		//after successful create thumbnail, we go to add new pictures filename in database 
		operations::addImagesToDB($arrFiles);
	}

	//create square thumbnails
	public function square($arrFiles, $quality, $sharpen, $imgWidth, $thWidth)
	{
		foreach($arrFiles as $file)
		{
			$image = new Image($this->path->tmp.$file);
			$imageWidth = $image->width;
			$imageHeight = $image->height;
			$thHeight = $thWidth;

			//save pop-up image
			//resize only if image width is bigger than pop-up width;  
			if($imageWidth > $imgWidth)//if width is bigger than pop-up width will resize it
				$image->resize($imgWidth,  NULL)->quality($quality)->sharpen($sharpen);
			$image->save($this->path->images.$file, 0666, false);
			
			//save thumbnail
			if($imageWidth > $thWidth || $imageHeight > $thHeight)
			{
				//landscape
				if($imageWidth > $imageHeight)
					$image->resize($thWidth, $thHeight, Image::HEIGHT)->crop($thWidth, $thHeight, 'center')->quality($quality)->sharpen($sharpen);
				//potrait or square
				else 
					$image->resize($thWidth, $thHeight, Image::WIDTH)->crop($thWidth, $thHeight, 'center')->quality($quality)->sharpen($sharpen);
			}

			$image->save($this->path->thumbnails.$file, 0666, false);
		}
	}

	//create landscape thumbnails
	public function landscape($arrFiles, $quality, $sharpen, $imgWidth, $thWidth)
	{
		foreach($arrFiles as $file)
		{
			$image = new Image($this->path->tmp.$file);

			$imageWidth = $image->width;
			$imageHeight = $image->height;

			//set maximum height of thumbnail
			$thHeight = $thWidth*$this->conf->ratioThumb;

			if($imageWidth < $thWidth)//image  width is smaller than thumbnail width
				$thWidth = $imageWidth;//will use image  width as thumbnail width
			if($imageWidth < $imgWidth)//image  width is smaller than pop-up image width
				$imgWidth = $imageWidth;//will use image  width as pop-up width

			//create pop-up image
			//if image width is smaller than thumbnail width we don't resize it
			//image width is bigger than pop-up image width, need resize
			if($imageWidth > $imgWidth)
				$image->resize($imgWidth,  NULL)->quality($quality)->sharpen($sharpen);
			//save pop-up image
			$image->save($this->path->images.$file, 0666, false);

			//create thumbnail
			//if image width and height is smaller than thumbnail width and height we don't resize it
			//image width or height is bigger than thumbnail width or height
			if(($imageWidth > $thWidth) || ($imageHeight > $thHeight))
			{
				//landscape image
				if($imageWidth > $imageHeight)
					$image->resize($thWidth, $thHeight, Image::HEIGHT)->crop($thWidth, $thHeight, 'center')->quality($quality)->sharpen($sharpen);
				//portrait or square image
				if($imageWidth <= $imageHeight)
					$image->resize($thWidth, $thHeight, Image::WIDTH)->crop($thWidth, $thHeight, 'top')->quality($quality)->sharpen($sharpen);
			}

			//save thumbnail
			$image->save($this->path->thumbnails.$file, 0666, false);
		}
	}

	//create portrait thumbnails
	public function portrait($arrFiles, $quality, $sharpen, $imgWidth, $thWidth)
	{
		foreach($arrFiles as $file)
		{
			$image = new Image($this->path->tmp.$file);

			$imageWidth = $image->width;
			$imageHeight = $image->height;

			//set maximum height of thumbnail
			$thHeight = $thWidth/$this->conf->ratioThumb;

			if($imageWidth < $thWidth)//image  width is smaller than thumbnail width
				$thWidth = $imageWidth;//will use image  width as thumbnail width
			if($imageWidth < $imgWidth)//image  width is smaller than pop-up image width
				$imgWidth = $imageWidth;//will use image  width as pop-up width

			//create pop-up image
			//if image width is smaller than thumbnail width we don't resize it
			//image width is bigger than pop-up image width, need resize
			if($imageWidth > $imgWidth)
				$image->resize($imgWidth,  NULL)->quality($quality)->sharpen($sharpen);
			//save pop-up image
			$image->save($this->path->images.$file, 0666, false);

			//create thumbnail
			//if image width and height is smaller than thumbnail width and height we don't resize it
			//image width or height is bigger than thumbnail width or height
			if(($imageWidth > $thWidth) || ($imageHeight > $thHeight))
			{
// 				if($imageWidth >= $imageHeight)//landscape or square image
// 					$image->resize($thWidth, $thHeight, Image::HEIGHT);
// 				//portrait
// 				if($imageWidth < $imageHeight)
				$image->resize($thWidth, $thHeight, Image::HEIGHT);
				$image->crop($thWidth, $thHeight, 'center')->quality($quality)->sharpen($sharpen);

			}

			//save thumbnail
			$image->save($this->path->thumbnails.$file, 0666, false);
		}
	}


}

?>