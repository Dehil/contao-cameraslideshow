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
 * Table tl_camera_slides
 */
$GLOBALS['TL_DCA']['tl_camera_slides'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'onload_callback' => array
		(
			array('tl_camera_slides', 'setThumbnailState')
		),
		'oncopy_callback' => array
		(
			array('tl_camera_slides', 'setThumbnailState')
		),
		'ptable'                      => 'tl_camera_shows',
		'switchToEdit'                => true,
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'pid' => 'index'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('sorting'),
			'headerFields'            => array('title'),
			'child_record_callback'   => array('tl_camera_slides', 'listCameraSlides')
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
				'label'               => &$GLOBALS['TL_LANG']['tl_camera_slides']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_camera_slides']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_camera_slides']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_camera_slides']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_camera_slides']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'     => array('tl_camera_slides', 'toggleIcon')
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_camera_slides']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'				=> array('type', 'addimagethumbnail', 'addtextthumbnail','addcaption', 'addhtml', 'addlink'),
		'default'					=> '{title_legend},title,alias,type;',
		'image'						=> '{title_legend},title,alias,type;{image_legend},imageId,imagesize,addimagethumbnail,addtextthumbnail;{caption_legend:hide},addcaption;{html_legend:hide},addhtml;{link_legend:hide},addlink;{publish_legend},published,start,stop',
		'video'						=> '{title_legend},title,alias,type;{video_legend},videoimageId,imagesize,addimagethumbnail,addtextthumbnail,videourl,videohide;{publish_legend},published,start,stop'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'addimagethumbnail'			=> 'thumbnailId,thumbsize',
		'addtextthumbnail'			=> 'thumbnailtext',
		'addcaption'				=> 'caption,captioneffect',
		'addhtml'					=> 'html,htmlfadein,htmlcameraeffected',
		'addlink'					=> 'url,target',
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'foreignKey'              => 'tl_camera_shows.title',
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
			'relation'                => array('type'=>'belongsTo', 'load'=>'eager')
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'sorting' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['alias'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alias', 'unique'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_camera_slides', 'generateAlias')
			),
			'sql'                     => "varbinary(128) NOT NULL default ''"
		),
		'type' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['type'],
			'default'                 => 'image',
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'			      => array('image', 'video'),
			'eval'                    => array('chosen'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
			'sql'					  => "varchar(5) NOT NULL default ''"
		),
		'imageId' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['imageId'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'mandatory'=>true, 'tl_class'=>'w50-plus'),
			'sql'                     => "binary(16) NULL",
		),
		'imagesize' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['imagesize'],
			'exclude'                 => true,
			'inputType'               => 'imageSize',
			'options'                 => $GLOBALS['TL_CROP'],
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50-plus'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'addimagethumbnail' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['addimagethumbnail'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'default'				  => '',
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr', 'doNotShow' => true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'thumbnailId' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['thumbnailId'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'mandatory'=>true, 'tl_class'=>'w50-plus'),
			'sql'                     => "binary(16) NULL",
		),
		'thumbsize' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['thumbsize'],
			'exclude'                 => true,
			'inputType'               => 'imageSize',
			'options'                 => $GLOBALS['TL_CROP'],
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50-plus'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'addtextthumbnail' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['addtextthumbnail'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'default'				  => '',
			// 'load_callback'           => array(array('tl_camera_slides', 'setTextThumbnailState')),
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr', 'doNotShow' => true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'thumbnailtext' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['thumbnailtext'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr'),
			'sql'                     => "text NULL"
		),
		'addcaption' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['addcaption'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'default'				  => '',
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'caption' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['caption'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'captioneffect' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['captioneffect'],
			'exclude'				  => true,
			'inputType'				  => 'select',
			'options'				  => array('moveFromLeft','moveFomRight','moveFromTop','moveFromBottom','fadeIn','fadeFromLeft','fadeFromRight','fadeFromTop','fadeFromBottom'),
			'default'				  => 'leftToRight',
			'eval'					  => array('mandantory'=>true,'maxlength'=>255,'tl_class'=>'w50'),
			'sql'					  => "varchar(20) NOT NULL default 'leftToRight'"
		),
		'addhtml' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['addhtml'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'default'				  => '',
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'html' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['html'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr'),
			'sql'                     => "text NULL"
		),
		'htmlfadein' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['htmlfadein'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'default'				  => '',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'htmlcameraeffected' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['htmlcameraeffected'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'default'				  => '',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'addlink' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['addlink'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'default'				  => '',
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'url' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['MSC']['url'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'fieldType'=>'radio', 'tl_class'=>'w50 wizard'),
			'wizard' => array
			(
				array('tl_camera_slides', 'pagePicker')
			),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'target' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['MSC']['target'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 1,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'start' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['start'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'stop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['stop'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'videoimageId' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['videoimageId'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'mandatory'=>true, 'tl_class'=>'w50-plus'),
			'sql'                     => "binary(16) NULL",
		),
		'videohide' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['videohide'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'default'				  => '',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'videourl' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_camera_slides']['videourl'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'fieldType'=>'radio', 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
	)
);

/**
 * Class tl_camera_slides
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Dennis Hilpmann 2005-2013
 * @author     Dennis Hilpmann <http://www.hilpmann.de>
 * @package    Camera Slideshow
 */
class tl_camera_slides extends Backend
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
	 * check status
	 */
	public function setThumbnailState()
	{
		$thumbnail = $this->Database->prepare("SELECT thumbnails FROM tl_camera_shows WHERE id = ?")->execute(Input::get('pid'))->thumbnails;
		$addimagethumbnail = $this->Database->prepare("SELECT addimagethumbnail FROM tl_camera_slides WHERE id = ?")->execute(Input::get('id'))->addimagethumbnail;
		$addtextthumbnail = $this->Database->prepare("SELECT addtextthumbnail FROM tl_camera_slides WHERE id = ?")->execute(Input::get('id'))->addtextthumbnail;
		if($thumbnail == 'image' && $addimagethumbnail == null)
			{
				$this->Database->prepare("UPDATE tl_camera_slides SET addimagethumbnail=1 WHERE id=?")->execute(Input::get('id'));
				$this->Database->prepare("UPDATE tl_camera_slides SET addtextthumbnail=NULL WHERE id=?")->execute(Input::get('id'));
			}
			else if($thumbnail == 'text' && $addtextthumbnail == null)
			{
				$this->Database->prepare("UPDATE tl_camera_slides SET addtextthumbnail=true WHERE id=?")->execute(Input::get('id'));
				$this->Database->prepare("UPDATE tl_camera_slides SET addimagethumbnail=NULL WHERE id=?")->execute(Input::get('id'));
			}
			// else
			// {
			// 	$this->Database->prepare("UPDATE tl_camera_slides SET addimagethumbnail=NULL WHERE id=?")->execute(Input::get('id'));
			// 	$this->Database->prepare("UPDATE tl_camera_slides SET addtextthumbnail=NULL WHERE id=?")->execute(Input::get('id'));
			// }
	}

	/**
	 * check status
	 */
	// public function setTextThumbnailState($varValue, DataContainer $dc)
	// {
	// 	// print_r($varValue);
	// 	$varValue = 1;
	// 	return $varValue;
	// }

	/**
	 * Add the type of input field
	 * @param array
	 * @return string
	 */
	public function listCameraSlides($arrRow)
	{
		$imagepath = $this->Database->prepare("SELECT path FROM tl_files WHERE tl_files.id = ?")->execute($arrRow['imageId'])->path;
		$image = $this->generateImage($this->getImage($imagepath, 100, 60, 'center_center'), $arrRow['title']);
		$date = $this->parseDate($GLOBALS['TL_CONFIG']['datimFormat'], $arrRow['tstamp']);
		// return '\'' . $arrRow['title'] . '\' – ' . $date;
		return '<div class="cameraSlideDescription">' . $image . '<div class="cameraSlideInfo"><strong>Title:</strong> ' . $arrRow['title'] . '<br><strong>Type:</strong> ' . $arrRow['type'] . ($arrRow['addcaption'] ? '<br><strong>Caption:</strong> ' . $arrRow['caption'] . ' <i>('. $arrRow['captioneffect'] . ')</i>' : '') . '</div></div>';
	}


	/**
	 * Return the "toggle visibility" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		if (strlen(Input::get('tid')))
		{
			$this->toggleVisibility(Input::get('tid'), (Input::get('state') == 1));
			$this->redirect($this->getReferer());
		}

		$href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

		if (!$row['published'])
		{
			$icon = 'invisible.gif';
		}

		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}


	/**
	 * Disable/enable a user group
	 * @param integer
	 * @param boolean
	 */
	public function toggleVisibility($intId, $blnVisible)
	{
		// Check permissions to edit
		Input::setGet('id', $intId);
		Input::setGet('act', 'toggle');

		$this->createInitialVersion('tl_camera_slides', $intId);

		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_camera_slides']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_camera_slides']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
			}
		}

		// Update the database
		$this->Database->prepare("UPDATE tl_camera_slides SET tstamp=". time() .", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
					   ->execute($intId);

		$this->createNewVersion('tl_camera_slides', $intId);

	}
	/**
	 * Auto-generate the slide alias if it has not been set yet
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
		$objAlias = $this->Database->prepare("SELECT id FROM tl_camera_slides WHERE alias=?")->execute($varValue);

		// Check whether the slides alias exists
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
	 * Return the link picker wizard
	 * @param \DataContainer
	 * @return string
	 */
	public function pagePicker(DataContainer $dc)
	{
		return ' <a href="contao/page.php?do='.Input::get('do').'&amp;table='.$dc->table.'&amp;field='.$dc->field.'&amp;value='.str_replace(array('{{link_url::', '}}'), '', $dc->value).'" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']).'" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\''.specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MOD']['page'][0])).'\',\'url\':this.href,\'id\':\''.$dc->field.'\',\'tag\':\'ctrl_'.$dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '').'\',\'self\':this});return false">' . $this->generateImage('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	}


}