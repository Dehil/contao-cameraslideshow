<?php

/**
 * Camera Slideshow Module
 *
 * Copyright (C) 2005-2013 Dennis Hilpmann
 *
 * @package   CameraSlideshow
 * @author    Dennis Hilpmann
 * @license   GNU/LGPL
 * @copyright Dennis Hilpmann 2013
 */


/**
 * Namespace
 */
namespace CameraSlideshow;


/**
 * Class ModuleCameraSlideshow
 *
 * @copyright  Dennis Hilpmann 2013
 * @author     Dennis Hilpmann
 * @package    Devtools
 */
class ModuleCameraSlideshow extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_camera_slideshow';


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		// define stuff
		$slideshowSettings = $this->Database->prepare("SELECT * FROM tl_camera_shows WHERE id=?")->execute($this->camera_shows);
		$allSlides = $this->Database->prepare("SELECT * FROM tl_camera_slides WHERE pid=? ORDER BY sorting ASC")->execute($this->camera_shows);
		$images = $this->Database->prepare("SELECT tl_files.id, tl_files.path FROM tl_files, tl_camera_shows, tl_camera_slides WHERE tl_files.id = tl_camera_slides.imageId OR tl_files.id = tl_camera_slides.videoimageId  AND tl_camera_shows.id = tl_camera_slides.pid AND tl_camera_shows.id = ?")->execute($this->camera_shows);
		$thumbnails = $this->Database->prepare("SELECT tl_files.id, tl_files.path FROM tl_files, tl_camera_shows, tl_camera_slides WHERE tl_files.id = tl_camera_slides.thumbnailId AND tl_camera_shows.id = tl_camera_slides.pid AND tl_camera_shows.id = ?")->execute($this->camera_shows);
		$noOptions = array('id', 'tstamp', 'title', 'alias', 'skin', 'randomplay');

		// create array with all slideshow options
		if($slideshowSettings->numRows)
		{
			$allSlideshowSettings = $slideshowSettings->fetchAllAssoc();
		}

		// create array with all published slides
		while($allSlides->next())
		{
			$current = $allSlides->row();
			if($current['published'] != 0){
				$start = ($current['start'] ?: time());
				$stop = ($current['stop'] ?: time());
				if ($start <= ($now = time()) && $now <= $stop)
				{
					$slidesToShow[] = $current;
				}
			}
		}

		// create array with all images containing to the slideshow
		if($images->numRows)
		{
			$allImages = $images->fetchAllAssoc();
		}

		// create array with all thumbnails containing to the slideshow
		if($thumbnails->numRows)
		{
			$allThumbnails = $thumbnails->fetchAllAssoc();
		}

		// send the camera id to template
		$this->Template->cameraId = $this->camera_shows;

		// send the skin to template
		$this->Template->skin = $slideshowSettings->skin;

		// send the height to template
		$this->Template->height = $slideshowSettings->height;

		// send the height to template
		$this->Template->minHeight = $slideshowSettings->minHeight;

		// create a slidearray and send to template
		for($i = 0; $i < count($slidesToShow); $i++)
		{
			// send type to template
			$slides[$i]['type'] = $slidesToShow[$i]['type'];

			// cache the image and returns the path
			$imageSize = unserialize($slidesToShow[$i]['imagesize']);
			$currentImageId = ($slidesToShow[$i]['type'] == 'image' ? $currentImageId = $slidesToShow[$i]['imageId'] : $currentImageId = $slidesToShow[$i]['videoimageId']);
			$imagePath = array_filter($allImages, function ($value) use ($currentImageId) {
				return $currentImageId == $value['id'];
			});
			sort($imagePath);
			$slides[$i]['image'] = $this->getImage($imagePath[0]['path'], $imageSize[0], $imageSize[1], $imageSize[2]);

			// cache the thumbnail and returns the path
			if($slidesToShow[$i]['addthumbnail'])
			{
				$thumbSize = unserialize($slidesToShow[$i]['thumbsize']);
				$currentThumbId = $slidesToShow[$i]['thumbnailId'];
				$thumbPath = array_filter($allThumbnails, function ($value) use ($currentThumbId) {
					return $currentThumbId == $value['id'];
				});
				sort($thumbPath);
				$slides[$i]['thumbnail'] = $this->getImage($thumbPath[0]['path'], $thumbSize[0], $thumbSize[1], $thumbSize[2]);
			}
			if($slidesToShow[$i]['addcaption'])
			{
				$slides[$i]['caption'] = $slidesToShow[$i]['caption'];
				$slides[$i]['captioneffect'] = $slidesToShow[$i]['captioneffect'];
			}
			if($slidesToShow[$i]['addhtml'])
			{
				$slides[$i]['html'] = $slidesToShow[$i]['html'];
				if($slidesToShow[$i]['htmlfadein'])
				{
					$slides[$i]['htmlclass'] .= 'fadeIn ';
				}
				if($slidesToShow[$i]['htmlcameraeffected'])
				{
					$slides[$i]['htmlclass'] .= 'camera_effected ';
				}
				$slides[$i]['htmlclass'] .= $slidesToShow[$i]['alias']. ' camera_html';
			}
			if($slidesToShow[$i]['addlink'])
			{
				$slides[$i]['url'] = $slidesToShow[$i]['url'];
				if($slidesToShow[$i]['target'])
				{
					$slides[$i]['target'] = $slidesToShow[$i]['target'];
				}
			}
			if($slidesToShow[$i]['videourl'])
			{
				$slides[$i]['videourl'] = $slidesToShow[$i]['videourl'];
			}
			if($slidesToShow[$i]['videohide'])
			{
				$slides[$i]['videohide'] = true;
			}
		}

		// set randomplay
		if($slideshowSettings->randomplay === 'true')
		{
			shuffle($slides);
		}
		$this->Template->slides = $slides;

		// build js-block with the slideshow options and send to template
		$this->Template->javascript .= 'jQuery(function(){jQuery(\'#camera_wrap_' . $this->camera_shows . '\').camera({';
		$keys = array_keys($allSlideshowSettings[0]);
		$j = 1;
		for($i = 0; $i < count($allSlideshowSettings[0]); $i++)
		{
			$currentKey = $keys[$i];
			if (!in_array($currentKey, $noOptions))
			{
				if($allSlideshowSettings[0][$keys[$i]] != 'true' && $allSlideshowSettings[0][$keys[$i]] != 'false' && !is_numeric($allSlideshowSettings[0][$keys[$i]])){

					if($currentKey === 'loaderBgColor' || $currentKey === 'loaderColor')
					{
						$this->Template->javascript .= $keys[$i] . ':\'#' . $allSlideshowSettings[0][$keys[$i]] . '\', ';
					} else {
						$this->Template->javascript .= $keys[$i] . ':\'' . html_entity_decode($allSlideshowSettings[0][$keys[$i]]) . '\', ';
					}
				} else {
					$this->Template->javascript .= $currentOption = $keys[$i] . ':' . $allSlideshowSettings[0][$keys[$i]] . ', ';
				}
			}
		}
		$this->Template->javascript .= 'imagePath:\'system/modules/cameraslideshow/assets/images/\'';
		$this->Template->javascript .= '});});';
	}
}
