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
 * Add palette to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['cameraslideshow_show'] = '{type_legend},type,headline;{camera_legend},camera_shows';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['camera_shows'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['camera_shows'],
	'exclude'                 => true,
	'inputType'               => 'radio',
	'options_callback'        => array('tl_cte_camera', 'getCameraShows'),
	'eval'                    => array('mandatory'=>true),
	'sql'                     => "blob NULL"
);

class tl_cte_camera extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}


	/**
	 * Get all news archives and return them as array
	 * @return array
	 */
	public function getCameraShows()
	{
		if (!$this->User->isAdmin && !is_array($this->User->cameraslideshow))
		{
			return array();
		}

		$arrCameraShows = array();
		$objCameraShows = $this->Database->execute("SELECT id, title FROM tl_camera_shows ORDER BY title");

		while ($objCameraShows->next())
		{
			if ($this->User->isAdmin || $this->User->hasAccess($objCameraShows->id, 'cameraslideshow'))
			{
				$arrCameraShows[$objCameraShows->id] = $objCameraShows->title;
			}
		}

		return $arrCameraShows;
	}
}