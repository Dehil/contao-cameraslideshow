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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['cameraslideshow_show']    = '{title_legend},name,headline,type;{config_legend},camera_shows;{template_legend:hide},camera_template;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['camera_shows'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['camera_shows'],
	'exclude'                 => true,
	'inputType'               => 'radio',
	'options_callback'        => array('tl_module_camera', 'getCameraShows'),
	'eval'                    => array('mandatory'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['camera_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['camera_template'],
	'default'                 => 'news_latest',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_camera', 'getCameraTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(32) NOT NULL default ''"
);

class tl_module_camera extends Backend
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


	/**
	 * Return all news templates as array
	 * @return array
	 */
	public function getCameraTemplates()
	{
		return $this->getTemplateGroup('mod_camera');
	}
}
