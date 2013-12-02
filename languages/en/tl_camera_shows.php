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
 * Fields
 */

$GLOBALS['TL_LANG']['tl_camera_shows']['title'] = array('Title', 'Please, enter the slideshow title');
$GLOBALS['TL_LANG']['tl_camera_shows']['alias'] = array('Slideshow-Alias', 'The slideshow alias is a unique reference to assign the associated javascript');

// Randomplay
$GLOBALS['TL_LANG']['tl_camera_shows']['randomplay'] = array('Shuffle', 'Should the slideshow be played in random order?');

// Slideshow Layout
$GLOBALS['TL_LANG']['tl_camera_shows']['height'] = array('Height', 'The amount in % relative to the width of the images. (Example: Slideshow images 960px x 360px, the height = 360/960 * 100 = 37.5% -> "37.5%" field.)');
$GLOBALS['TL_LANG']['tl_camera_shows']['minHeight'] = array('Minimum height', 'Set the minimum height of the slideshow. (especially on mobile devices sense when the following option portrait is not set to true.)');
$GLOBALS['TL_LANG']['tl_camera_shows']['portrait'] = array('Fit images', 'Pictures are scaled to slideshow framework');
$GLOBALS['TL_LANG']['tl_camera_shows']['alignment'] = array('Orientation', 'Set the value of orientation. When images are greater than the slideshow.');
$GLOBALS['TL_LANG']['tl_camera_shows']['skin'] = array('Skin', 'Select a skin to change the color of the icons');
$GLOBALS['TL_LANG']['tl_camera_shows']['overlayer'] = array('Layer on the images', 'Sets a layer over the images and thus prevents direct access via \'right click -> Save Picture As \'.');

// Navigation Options
$GLOBALS['TL_LANG']['tl_camera_shows']['navigation'] = array('Navigation', 'Show navigation');
$GLOBALS['TL_LANG']['tl_camera_shows']['playPause'] = array('Play/Pause-Button', 'Show Play/Pause-Button');
$GLOBALS['TL_LANG']['tl_camera_shows']['navigationHover'] = array('Show navigation on hover', 'The navigation is displayed only when hovering over the slideshow.');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileNavHover'] = array('Navigation at hover Show (mobile)', 'The navigation is displayed only when hovering over the slideshow. (mobile)');
$GLOBALS['TL_LANG']['tl_camera_shows']['pauseOnClick'] = array('Pause on Click', 'Stops the slideshow on click');
$GLOBALS['TL_LANG']['tl_camera_shows']['pagination'] = array('Pagination', 'Show the additional navigation features');
$GLOBALS['TL_LANG']['tl_camera_shows']['thumbnails'] = array('Show thumbnails', 'When Pagination is set to false, the thumbnails appear below the slideshow, otherwise on mouse over the pagination');

// Animation Options
$GLOBALS['TL_LANG']['tl_camera_shows']['autoAdvance'] = array('Automatic', 'The slideshow starts automatically if true');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileAutoAdvance'] = array('Automatic (mobile)', 'The slideshow starts automatically if true');
$GLOBALS['TL_LANG']['tl_camera_shows']['fx'] = array('Transition effect', 'Setting the fade effect');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileFx'] = array('Transition effect (mobile)', 'Setting the fade effect for mobile devices');
$GLOBALS['TL_LANG']['tl_camera_shows']['easing'] = array('Behavior of the animation', 'Setting the behavior of the animation');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileEasing'] = array('Behavior of the animation (mobile)', 'Setting the behavior of the animation');
$GLOBALS['TL_LANG']['tl_camera_shows']['rows'] = array('Rows', 'Number of rows');
$GLOBALS['TL_LANG']['tl_camera_shows']['slicedCols'] = array('Columns', 'Number of columns in slice effect');
$GLOBALS['TL_LANG']['tl_camera_shows']['cols'] = array('Split', 'Number of columns');
$GLOBALS['TL_LANG']['tl_camera_shows']['slicedRows'] = array('Rows with slice effect', 'Number of rows in slice effect');
$GLOBALS['TL_LANG']['tl_camera_shows']['time'] = array('Duration of the view', 'Time how long the individual slides are displayed');
$GLOBALS['TL_LANG']['tl_camera_shows']['transPeriod'] = array('Duration of the transition', 'Duration of the transition in milliseconds');
$GLOBALS['TL_LANG']['tl_camera_shows']['gridDifference'] = array('Time separation of child animations', 'Time separation of child animation in milliseconds');
$GLOBALS['TL_LANG']['tl_camera_shows']['opacityOnGrid'] = array('Transparency of the child animations', 'Transparency effect of the individual blocks of the child animations');
$GLOBALS['TL_LANG']['tl_camera_shows']['hover'] = array('Pause on hover', 'Enable pause on hover. Not available for mobile devices.');
$GLOBALS['TL_LANG']['tl_camera_shows']['slideOn'] = array('Selection of animated image', 'Determine whether the current image (prev) or subsequent (next) gets the effect. (Beware of \'prev\' the animation flickers slightly.)');

// Loader Layout
$GLOBALS['TL_LANG']['tl_camera_shows']['loader'] = array('Loader', 'The shape of the loading bar');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderOpacity'] = array('Loader transparency', 'Set the transparency of the loading bar');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderColor'] = array('Loader Color', 'Set the color of the loading bar');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderBgColor'] = array('Loader background color', 'Set the background color of the loading bar');
$GLOBALS['TL_LANG']['tl_camera_shows']['pieDiameter'] = array('Diameter (pie)', 'Note: When PIE, the diameter must be at least twice the thickness of the pie.');
$GLOBALS['TL_LANG']['tl_camera_shows']['piePosition'] = array('Position (pie)', 'Set the position of the loading bar (pie).');
$GLOBALS['TL_LANG']['tl_camera_shows']['barDirection'] = array('Direction (bar)', 'Set the direction of the progress bar');
$GLOBALS['TL_LANG']['tl_camera_shows']['barPosition'] = array('Position (bar)', 'Set the position of the progress bar');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderPadding'] = array('Padding', 'Set the padding of the loading bar');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderStroke'] = array('Thickness', 'Note: When PIE, the thickness must be less than one half of the PIE diameter.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_camera_shows']['title_legend'] = 'Title';
$GLOBALS['TL_LANG']['tl_camera_shows']['camera_layout_legend'] = 'Appearance';
$GLOBALS['TL_LANG']['tl_camera_shows']['camera_playcontrol_legend'] = 'Play behavior';
$GLOBALS['TL_LANG']['tl_camera_shows']['loader_layout_legend'] = 'Loader appearance';
$GLOBALS['TL_LANG']['tl_camera_shows']['camera_animation_legend'] = 'Animation';
$GLOBALS['TL_LANG']['tl_camera_shows']['navigation_legend'] = 'Navigation elements';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_camera_shows']['new']    = array('New Camera Slideshow ', 'Create a new Camera Slideshow');
$GLOBALS['TL_LANG']['tl_camera_shows']['show']   = array('Details', 'Details of the Slide Show view ID %s');
$GLOBALS['TL_LANG']['tl_camera_shows']['edit']   = array('Edit Slideshow', 'Slideshow ID %s');
$GLOBALS['TL_LANG']['tl_camera_shows']['editheader']   = array('Edit Settings', 'Settings of the slideshow ID %s');
$GLOBALS['TL_LANG']['tl_camera_shows']['copy']   = array('Copy Slideshow', 'Duplicate ID %s');
$GLOBALS['TL_LANG']['tl_camera_shows']['delete'] = array('Delete Slideshow', 'Delete ID %s');