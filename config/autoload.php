<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package Cameraslideshow
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'CameraSlideshow',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'CameraSlideshow\ModuleCameraSlideshow' => 'system/modules/cameraslideshow/modules/ModuleCameraSlideshow.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_camera_slideshow' => 'system/modules/cameraslideshow/templates',
));
