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
 * Table tl_camera_shows
 */
$GLOBALS['TL_DCA']['tl_camera_shows'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'					  => array('tl_camera_slides'),
		'enableVersioning'            => true,
		'switchToEdit'                => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_camera_shows']['edit'],
				'href'                => 'table=tl_camera_slides',
				'icon'                => 'edit.gif',
				'attributes'          => 'class="contextmenu"'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_camera_shows']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif',
				'button_callback'     => array('tl_camera_shows', 'editHeader'),
				'attributes'          => 'class="edit-header"'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_camera_shows']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_camera_shows']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_camera_shows']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		//'__selector__'                => array(''),
		'default'                     => '{title_legend},title,alias;{camera_playcontrol_legend:hide},randomplay;{camera_layout_legend:hide},height,minHeight,portrait,alignment,skin,overlayer;{navigation_legend:hide},navigation,playPause,navigationHover,mobileNavHover,pagination,thumbnails,pauseOnClick;{camera_animation_legend:hide},autoAdvance,mobileAutoAdvance,fx,mobileFx,easing,mobileEasing,rows,slicedRows,cols,slicedCols,time,transPeriod,gridDifference,opacityOnGrid,hover,slideOn;{loader_layout_legend:hide},loader,loaderOpacity,loaderColor,loaderBgColor,pieDiameter,piePosition,barDirection,barPosition,loaderPadding,loaderStroke;'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_shows']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_shows']['alias'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alias', 'unique'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_camera_shows', 'generateAlias')
			),
			'sql'                     => "varbinary(128) NOT NULL default ''"
		),
		'alignment'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['alignment'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('topLeft', 'topCenter', 'topRight', 'centerLeft', 'center', 'centerRight', 'bottomLeft', 'bottomCenter', 'bottomRight'),
			'default'		=> 'center',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'center'"
		),
		'autoAdvance'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['autoAdvance'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true','false'),
			'default'		=> 'true',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'true'"
		),
		'mobileAutoAdvance'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['mobileAutoAdvance'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true','false'),
			'default'		=> 'true',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'true'"
		),
		'barDirection'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['barDirection'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'),
			'default'		=> 'leftToRight',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'leftToRight'"
		),
		'barPosition'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['barPosition'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('left', 'right', 'top', 'bottom'),
			'default'		=> 'bottom',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'bottom'"
		),
		'cols'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['cols'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '6',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "int(10) unsigned NOT NULL default '6'"
		),
		'easing'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['easing'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('linear', 'swing', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInSine', 'easeOutSine', 'easeInOutSine', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce'),
			'default'		=> 'easeInOutExpo',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'easeInOutExpo'"
		),
		'mobileEasing'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['mobileEasing'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('linear', 'swing', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInSine', 'easeOutSine', 'easeInOutSine', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce'),
			'default'		=> 'easeInOutExpo',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'easeInOutExpo'"
		),
		'fx'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['fx'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight', 'scrollLeft', 'scrollRight', 'scrollHorz', 'scrollBottom', 'scrollTop'),
			'default'		=> 'random',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'random'"
		),
		'mobileFx'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['mobileFx'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight', 'scrollLeft', 'scrollRight', 'scrollHorz', 'scrollBottom', 'scrollTop'),
			'default'		=> 'random',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'random'"
		),
		'gridDifference'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['gridDifference'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '250',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default '250'"
		),
		'height'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['height'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '50%',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default '50%'"
		),
		'hover'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['hover'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true', 'false'),
			'default'		=> 'true',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'true'"
		),
		'imagePath'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['imagePath'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> 'images/',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'images/'"
		),
		'loader'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['loader'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('pie', 'bar', 'none'),
			'default'		=> 'pie',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'pie'"
		),
		'loaderColor'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['loaderColor'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> 'eeeeee',
			'eval'                    => array('maxlength'=>6, 'multiple'=>false, 'size'=>1, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
			'sql'			=> "varchar(20) NOT NULL default 'eeeeee'"
		),
		'loaderBgColor'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['loaderBgColor'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '222222',
			'eval'                    => array('maxlength'=>6, 'multiple'=>false, 'size'=>1, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
			'sql'			=> "varchar(20) NOT NULL default '222222'"
		),
		'loaderOpacity'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['loaderOpacity'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('0', '.1', '.2', '.3', '.4', '.5', '.6', '.7', '.8', '.9', '1'),
			'default'		=> '.8',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default '.8'"
		),
		'loaderPadding'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['loaderPadding'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '2',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "int(10) unsigned NOT NULL default '2'"
		),
		'loaderStroke'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['loaderStroke'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '7',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "int(10) unsigned NOT NULL default '7'"
		),
		'minHeight'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['minHeight'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '200px',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default '200px'"
		),
		'navigation'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['navigation'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true','false'),
			'default'		=> 'true',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'true'"
		),
		'navigationHover'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['navigationHover'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true','false'),
			'default'		=> 'true',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'true'"
		),
		'mobileNavHover'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['mobileNavHover'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true','false'),
			'default'		=> 'true',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'true'"
		),
		'opacityOnGrid'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['opacityOnGrid'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true','false'),
			'default'		=> 'false',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'false'"
		),
		'overlayer'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['overlayer'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true','false'),
			'default'		=> 'true',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'true'"
		),
		'pagination'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['pagination'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true','false'),
			'default'		=> 'true',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'true'"
		),
		'playPause'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['playPause'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true','false'),
			'default'		=> 'true',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'true'"
		),
		'pauseOnClick'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['pauseOnClick'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true','false'),
			'default'		=> 'true',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'true'"
		),
		'pieDiameter'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['pieDiameter'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '38',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "int(10) unsigned NOT NULL default '38'"
		),
		'piePosition'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['piePosition'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('rightTop', 'leftTop', 'leftBottom', 'rightBottom'),
			'default'		=> 'rightTop',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'rightTop'"
		),
		'portrait'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['portrait'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('true','false'),
			'default'		=> 'false',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'false'"
		),
		'rows'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['rows'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '4',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "int(10) unsigned NOT NULL default '4'"
		),
		'slicedCols'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['slicedCols'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '12',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "int(10) unsigned NOT NULL default '12'"
		),
		'slicedRows'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['slicedRows'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '8',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "int(10) unsigned NOT NULL default '8'"
		),
		'slideOn'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['slideOn'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('next', 'prev', 'random'),
			'default'		=> 'random',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'next'"
		),
		'thumbnails'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['thumbnails'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('image','text', 'none'),
			'save_callback' => array(array('tl_camera_shows', 'setAddThumbnailOption')),
			'default'		=> 'false',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'none'"
		),
		'time'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['time'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '7000',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "int(10) unsigned NOT NULL default '7000'"
		),
		'transPeriod'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['transPeriod'],
			'exclude'		=> true,
			'inputType'		=> 'text',
			'default'		=> '1500',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "int(10) unsigned NOT NULL default '1500'"
		),
		'skin'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['skin'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('none', 'camera_amber_skin', 'camera_ash_skin', 'camera_azure_skin', 'camera_beige_skin', 'camera_black_skin', 'camera_blue_skin', 'camera_brown_skin', 'camera_burgundy_skin', 'camera_charcoal_skin', 'camera_chocolate_skin', 'camera_coffee_skin', 'camera_cyan_skin', 'camera_fuchsia_skin', 'camera_gold_skin', 'camera_green_skin', 'camera_grey_skin', 'camera_indigo_skin', 'camera_khaki_skin', 'camera_lime_skin', 'camera_magenta_skin', 'camera_maroon_skin', 'camera_orange_skin', 'camera_olive_skin', 'camera_pink_skin', 'camera_pistachio_skin', 'camera_pink_skin', 'camera_red_skin', 'camera_tangerine_skin', 'camera_turquoise_skin', 'camera_violet_skin', 'camera_white_skin', 'camera_yellow_skin'),
			'default'		=> 'none',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default ''"
		),
		'randomplay'	=>	array
		(
			'label'			=> &$GLOBALS['TL_LANG']['tl_camera_shows']['randomplay'],
			'exclude'		=> true,
			'inputType'		=> 'select',
			'options'		=> array('false','true'),
			'default'		=> 'false',
			'eval'			=> array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'			=> "varchar(20) NOT NULL default 'false'"
		),
	)
);

/**
 * Class tl_camera_shows
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Dennis Hilpmann 2005-2013
 * @author     Dennis Hilpmann <http://www.hilpmann.de>
 * @package    Camera Slideshow
 */
class tl_camera_shows extends Backend
{
	/**
	 * Auto-generate the slideshow alias if it has not been set yet
	 * @param mixed
	 * @param \DataContainer
	 * @return string
	 * @throws \Exception
	 */
	public function generateAlias($varValue, DataContainer $dc)
	{
		$autoAlias = false;

		// Generate alias if there is none
		if ($varValue == '')
		{
			$autoAlias = true;
			$varValue = standardize(String::restoreBasicEntities($dc->activeRecord->title));
		}
		$objAlias = $this->Database->prepare("SELECT id FROM tl_camera_shows WHERE alias=?")->execute($varValue);

		// Check whether the news alias exists
		if ($objAlias->numRows > 1 && !$autoAlias)
		{
			throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
		}

		// Add ID to alias
		if ($objAlias->numRows && $autoAlias)
		{
			$varValue .= '-' . $dc->id;
		}
		return $varValue;
	}

	/**
	 * Return the edit header button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function editHeader($row, $href, $label, $title, $icon, $attributes)
	{
		return ('<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ');
	}

	/**
	 * Sets the addthumbnail option for the containing slides
	 */
	public function setAddThumbnailOption($varValue, DataContainer $dc)
	{
		$slides = $this->Database->prepare("SELECT * FROM tl_camera_slides WHERE pid=?")->execute($dc->id);
		while($slides->next())
		{
			$current = $slides->row();
			if($varValue == 'image')
			{
				$this->Database->prepare("UPDATE tl_camera_slides SET addimagethumbnail=true WHERE id=?")->execute($current['id']);
				$this->Database->prepare("UPDATE tl_camera_slides SET addtextthumbnail=NULL WHERE id=?")->execute($current['id']);
			}
			else if($varValue == 'text')
			{
				$this->Database->prepare("UPDATE tl_camera_slides SET addtextthumbnail=true WHERE id=?")->execute($current['id']);
				$this->Database->prepare("UPDATE tl_camera_slides SET addimagethumbnail=NULL WHERE id=?")->execute($current['id']);
			}
			else
			{
				$this->Database->prepare("UPDATE tl_camera_slides SET addimagethumbnail=NULL WHERE id=?")->execute($current['id']);
				$this->Database->prepare("UPDATE tl_camera_slides SET addtextthumbnail=NULL WHERE id=?")->execute($current['id']);
			}
		}
		return $varValue;
	}
}