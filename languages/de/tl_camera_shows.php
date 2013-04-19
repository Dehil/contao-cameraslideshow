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

$GLOBALS['TL_LANG']['tl_camera_shows']['title'] = array('Titel', 'Bitte geben Sie den Slideshow-Titel ein.');
$GLOBALS['TL_LANG']['tl_camera_shows']['alias'] = array('Slideshow-Alias', 'Der Slideshowalias ist eine eindeutige Referenz, um das zugehörige javascript zuzuordnen.');

// Randomplay
$GLOBALS['TL_LANG']['tl_camera_shows']['randomplay'] = array('Zufallswiedergabe', 'Soll die Slideshow in zufälliger Reihenfolge wiedergegeben werden?');

// Slideshow Layout
$GLOBALS['TL_LANG']['tl_camera_shows']['height'] = array('Höhe', 'Die Höhe in % bezogen auf die Breite der Bilder. (Beispiel: Bei Slideshowbildern mit 960px x 400px beträgt die Höhe = 360/960*100 = 37,5 ≈ 37%.)');
$GLOBALS['TL_LANG']['tl_camera_shows']['minHeight'] = array('Minimale Höhe der Slideshow', 'Setzen Sie die minimale Höhe der Slideshow. (Macht besonders auf mobilen Endgeräten Sinn wenn die nachfolgende Option Portrait nicht auf true gesetzt ist.)');
$GLOBALS['TL_LANG']['tl_camera_shows']['portrait'] = array('Bilder einpassen', 'Bilder werden an Slideshowrahmen angepasst.');
$GLOBALS['TL_LANG']['tl_camera_shows']['alignment'] = array('Ausrichtung', 'Setzen Sie den Wert der Ausrichtung. Greift bei Bildern die größer als der Slideshowrahnen ist.');
$GLOBALS['TL_LANG']['tl_camera_shows']['skin'] = array('Skin', 'Wählen Sie einen Skin um die Farbe der Icons zu ändern.');
$GLOBALS['TL_LANG']['tl_camera_shows']['overlayer'] = array('Layer über den Bilder', 'Setzt einen Layer über die Bilder und verhindert somit den direkten Zugriff über \'rechte Maustaste -> Bild speichern unter\'.');

// Navigation Options
$GLOBALS['TL_LANG']['tl_camera_shows']['navigation'] = array('Navigation', 'Navigation anzeigen.');
$GLOBALS['TL_LANG']['tl_camera_shows']['playPause'] = array('Play/Pause-Button', 'Play/Pause-Button anzeigen.');
$GLOBALS['TL_LANG']['tl_camera_shows']['navigationHover'] = array('Navigation bei hover einblenden', 'Die Navigation wir bei true nur beim hovern über die Slideshow angezeigt.');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileNavHover'] = array('Navigation bei hover einblenden (mobile)', 'Die Navigation wir bei true nur beim hovern über die Slideshow angezeigt. (mobile)');
$GLOBALS['TL_LANG']['tl_camera_shows']['pauseOnClick'] = array('Pause bei klicken', 'Stoppt die Slideshow bei Klick');
$GLOBALS['TL_LANG']['tl_camera_shows']['pagination'] = array('Paginierung', 'Die zusätzlichen Navigationsböbbels anzeigen');
$GLOBALS['TL_LANG']['tl_camera_shows']['thumbnails'] = array('Thumbnails anzeigen', 'Wenn Paginierung aus false gesetzt ist erscheinen die Thumbnails unter der Slideshow, ansonsten beim hover über der Paginierung');

// Animation Options
$GLOBALS['TL_LANG']['tl_camera_shows']['autoAdvance'] = array('Automatisch starten', 'Die Slideshow startet automatisch bei true.');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileAutoAdvance'] = array('Automatisch starten (mobile)', 'Die Slideshow startet automatisch bei true.');
$GLOBALS['TL_LANG']['tl_camera_shows']['fx'] = array('Überblendeffekt', 'Überblendeffekt einstellen.');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileFx'] = array('Überblendeffekt (mobile)', 'Überblendeffekt für mobile Endgeräte einstellen.');
$GLOBALS['TL_LANG']['tl_camera_shows']['easing'] = array('Verhalten der Animation', 'Verhalten der Animation einstellen.');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileEasing'] = array('Verhalten der Animation (mobile)', 'Verhalten der Animation einstellen.');
$GLOBALS['TL_LANG']['tl_camera_shows']['rows'] = array('Zeilen', 'Anzahl der Zeilen.');
$GLOBALS['TL_LANG']['tl_camera_shows']['slicedCols'] = array('Zeilen bei Slice-Effekt', 'Anzahl der Zeilen bei Slice-Effekt.');
$GLOBALS['TL_LANG']['tl_camera_shows']['cols'] = array('Spalten', 'Anzahl der Spalten.');
$GLOBALS['TL_LANG']['tl_camera_shows']['slicedRows'] = array('Spalten bei Slice-Effekt', 'Anzahl der Spalten bei Slice-Effekt.');
$GLOBALS['TL_LANG']['tl_camera_shows']['time'] = array('Dauer der Ansicht', 'Dauer wie lange die einzelnen Slides angezeigt werden.');
$GLOBALS['TL_LANG']['tl_camera_shows']['transPeriod'] = array('Dauer der Überblendung', 'Dauer der Überblendung in Millisekunden.');
$GLOBALS['TL_LANG']['tl_camera_shows']['gridDifference'] = array('Zeitlicher Abstand der Kindanimationen', 'Zeitlicher Abstand der Kindanimationen in Millisekunden.');
$GLOBALS['TL_LANG']['tl_camera_shows']['opacityOnGrid'] = array('Transparenz der Kindanimationen', 'Transparenz-Effekt der einzelnen Blöcke der Kindanimationen.');
$GLOBALS['TL_LANG']['tl_camera_shows']['hover'] = array('Animation pausesieren bei hover', 'Pause bei hover aktivieren. Nicht Verfügbar für mobile Geräte.');
$GLOBALS['TL_LANG']['tl_camera_shows']['slideOn'] = array('Auswahl des zu animierenden Bildes', 'Bestimmen ob das aktuelle Bild (prev) oder das nachfolgende (next) den Effekt bekommt. (Achtung bei \'prev\' flackert die Animation leicht.)');

// Loader Layout
$GLOBALS['TL_LANG']['tl_camera_shows']['loader'] = array('Form des Ladebalken', 'Setzen Sie die Form des Ladebalken.');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderOpacity'] = array('Transparenz des Ladebalken', 'Setzen Sie die Transparenz des Ladebalken.');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderColor'] = array('Farbe des Ladebalken', 'Setzen Sie die Farbe des Ladebalken.');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderBgColor'] = array('Hintergrundfarbe des Ladebalken', 'Setzen Sie die Hintergrundfarbe des Ladebalken.');
$GLOBALS['TL_LANG']['tl_camera_shows']['pieDiameter'] = array('Durchmesser des Ladebalken (pie)', 'Merke: Bei PIE, muss der Durchmesser mindestens das doppelte der pie-Dicke betragen.');
$GLOBALS['TL_LANG']['tl_camera_shows']['piePosition'] = array('Position des Ladebalken (pie)', 'Setzen Sie die Position des Ladebalken (pie).');
$GLOBALS['TL_LANG']['tl_camera_shows']['barDirection'] = array('Richtung des Ladebalken (bar)', 'Set barDirection');
$GLOBALS['TL_LANG']['tl_camera_shows']['barPosition'] = array('Position des Ladebalken (bar)', 'Setzen Sie die Position des Ladebalken (pie).');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderPadding'] = array('Innenabstand Ladebalken', 'Setzen Sie den Innenabstand des Ladebalken.');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderStroke'] = array('Die Dicke des Ladebalken', 'Merke: Bei PIE, muss die Dicke weniger als eine Hälfte des PIE-Durchmessers betragen.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_camera_shows']['title_legend'] = 'Titel';
$GLOBALS['TL_LANG']['tl_camera_shows']['camera_layout_legend'] = 'Aussehen Slideshow';
$GLOBALS['TL_LANG']['tl_camera_shows']['camera_playcontrol_legend'] = 'Abspielverhalten';
$GLOBALS['TL_LANG']['tl_camera_shows']['loader_layout_legend'] = 'Aussehen Ladebalken';
$GLOBALS['TL_LANG']['tl_camera_shows']['camera_animation_legend'] = 'Animationen';
$GLOBALS['TL_LANG']['tl_camera_shows']['navigation_legend'] = 'Navigationselemente';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_camera_shows']['new']    = array('Neue Camera Slideshow ', 'Eine neue Camera Slideshow erstellen');
$GLOBALS['TL_LANG']['tl_camera_shows']['show']   = array('Details', 'Die Details des Slideshow ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_camera_shows']['edit']   = array('Slideshow bearbeiten', 'Slideshow ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_camera_shows']['editheader']   = array('Slideshow Einstellungen bearbeiten', 'Einstellungen der Slideshow ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_camera_shows']['copy']   = array('Slideshow duplizieren', 'Slideshow ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_camera_shows']['delete'] = array('Slideshow löschen', 'Slideshow ID %s löschen');