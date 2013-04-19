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
 * Add back end modules
 */
$GLOBALS['BE_MOD']['content']['cameraslideshow'] = array(
	'tables'       => array('tl_camera_shows', 'tl_camera_slides'),
	'icon'         => 'system/modules/cameraslideshow/assets/images/camera.png',
	'stylesheet'   => 'system/modules/cameraslideshow/assets/css/tl_camera_slides.css'
);

/**
 * Add front end modules
 */
$GLOBALS['FE_MOD']['cameraslideshow'] = array(
	'cameraslideshow_show'	=> 'ModuleCameraSlideshow'
);

/**
 * Content elements
 */
array_insert($GLOBALS['TL_CTE']['media'], 10, array
(
	'cameraslideshow_show' => 'ModuleCameraSlideshow',
));