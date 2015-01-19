<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
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

	// Models
	'CameraSlidesModel'                     => 'system/modules/cameraslideshow/models/CameraSlidesModel.php',
	'CameraShowsModel'                      => 'system/modules/cameraslideshow/models/CameraShowsModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_camera_slideshow' => 'system/modules/cameraslideshow/templates',
));
