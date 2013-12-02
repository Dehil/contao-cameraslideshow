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

$GLOBALS['TL_LANG']['tl_camera_shows']['title'] = array('Titolo', 'Inserisci il titolo dello slideshow');
$GLOBALS['TL_LANG']['tl_camera_shows']['alias'] = array('Slideshow-Alias', 'L\' alias &egrave; una referenza univoca da assegnare per il javascript');

// Randomplay
$GLOBALS['TL_LANG']['tl_camera_shows']['randomplay'] = array('Casuale', 'Lo slideshow deve essere eseguito in ordine casuale?');

// Slideshow Layout
$GLOBALS['TL_LANG']['tl_camera_shows']['height'] = array('Altezza', 'Valore in % relativo alla larghezza dell\'immagine. (Esempio: immagine 960px x 360px, altezza = 360/960 * 100 = 37.5% -> "37.5%" da scrivere nel campo)');
$GLOBALS['TL_LANG']['tl_camera_shows']['minHeight'] = array('Altezza minima', 'Imposta l\'altezza minima dello slideshow. (specialmente nei mobile serve a stabilire quando le opzioni seguenti sono disabilitate per portrait)');
$GLOBALS['TL_LANG']['tl_camera_shows']['portrait'] = array('Adatta immagini', 'Le immagini sono ridimensionate in base alla grandezza dello slideshow');
$GLOBALS['TL_LANG']['tl_camera_shows']['alignment'] = array('Orientamento', 'Imposta il valore di orientamento. In immagini con dimensioni maggiori della presentazione');
$GLOBALS['TL_LANG']['tl_camera_shows']['skin'] = array('Skin', 'Seleziona la skin per cambiare colore alle icone');
$GLOBALS['TL_LANG']['tl_camera_shows']['overlayer'] = array('Livello sulle immagini', 'Mette un livello sopra l\'immagine per prevenire l\'accesso diretto tramite \'click destro -> Salva immagine con nome \'.');

// Navigation Options
$GLOBALS['TL_LANG']['tl_camera_shows']['navigation'] = array('Navigatore', 'Mostra il navigatore');
$GLOBALS['TL_LANG']['tl_camera_shows']['playPause'] = array('Play/Pause-Button', 'Mostra bottoni Play/Pause');
$GLOBALS['TL_LANG']['tl_camera_shows']['navigationHover'] = array('Mostra il navigatore al mouse hover', 'Il navigatore &egrave; mostrato solo quando il mouse &egrave; sopra lo slideshow');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileNavHover'] = array('Mostra il navigatore al mouse hover (mobile)', 'Il navigatore &egrave; mostrato solo quando il mouse &egrave; sopra lo slideshow (mobile)');
$GLOBALS['TL_LANG']['tl_camera_shows']['pauseOnClick'] = array('Pausa al Click', 'Ferma lo slideshow al click');
$GLOBALS['TL_LANG']['tl_camera_shows']['pagination'] = array('Paginazione', 'Mostra le opzioni di navigazione aggiuntive');
$GLOBALS['TL_LANG']['tl_camera_shows']['thumbnails'] = array('Mostra miniature', 'Quando la paginazione &egrave; disabilitata, le miniature appaiono sotto allo slideshow, altrimenti con mouse sopra della paginazione');

// Animation Options
$GLOBALS['TL_LANG']['tl_camera_shows']['autoAdvance'] = array('Automatico', 'Lo slideshow inizia automaticamente');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileAutoAdvance'] = array('Automatico (mobile)', 'Lo slideshow inizia automaticamente (mobile)');
$GLOBALS['TL_LANG']['tl_camera_shows']['fx'] = array('Effetto transizione', 'Imposta la dissolvenza tra immagini');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileFx'] = array('Effetto transizione (mobile)', 'Imposta la dissolvenza tra immagini (mobile)');
$GLOBALS['TL_LANG']['tl_camera_shows']['easing'] = array('Comportamento dell\'animazione', 'Imposta il comportamento delle transizioni');
$GLOBALS['TL_LANG']['tl_camera_shows']['mobileEasing'] = array('Comportamento dell\'animazione (mobile)', 'Imposta il comportamento delle transizioni (mobile)');
$GLOBALS['TL_LANG']['tl_camera_shows']['rows'] = array('Righe', 'Numero di righe');
$GLOBALS['TL_LANG']['tl_camera_shows']['slicedCols'] = array('Colonne in slice', 'Numero di colonne in effetto slice');
$GLOBALS['TL_LANG']['tl_camera_shows']['cols'] = array('Split', 'Numero di colonne');
$GLOBALS['TL_LANG']['tl_camera_shows']['slicedRows'] = array('Righe in slice', 'Numero di righe in effetto slice');
$GLOBALS['TL_LANG']['tl_camera_shows']['time'] = array('Tempo', 'Durata di una slide');
$GLOBALS['TL_LANG']['tl_camera_shows']['transPeriod'] = array('Tempo di transizione', 'Quanto dura la transizione in millisecondi');
$GLOBALS['TL_LANG']['tl_camera_shows']['gridDifference'] = array('Tempo delle animazioni figlie', 'Tempo di differenza delle animazioni figlie in millisecondi');
$GLOBALS['TL_LANG']['tl_camera_shows']['opacityOnGrid'] = array('Trasparenza delle animazioni figlie', 'Effetto trasparenza del blocco individuale delle animazioni figlie');
$GLOBALS['TL_LANG']['tl_camera_shows']['hover'] = array('Pausa al mouse hover', 'Si ferma al mouse sopra. Non disponibile nei mobile.');
$GLOBALS['TL_LANG']['tl_camera_shows']['slideOn'] = array('Selezione dell\'animazione', 'Determina se l\'immagine corrente (prev) o seguente (next) ha l\'effetto. (Attenzione che \'prev\' &egrave; leggermente difettoso.)');

// Loader Layout
$GLOBALS['TL_LANG']['tl_camera_shows']['loader'] = array('Loader', 'La forma della loading bar');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderOpacity'] = array('Trasparenza Loader', 'Imposta la trasparenza della loading bar');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderColor'] = array('Colore Loader', 'Imposta il colore della loading bar');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderBgColor'] = array('Colore fondo Loader', 'Imposta il colore di fondo della loading bar');
$GLOBALS['TL_LANG']['tl_camera_shows']['pieDiameter'] = array('Diametro (pie)', 'Nota: quando PIE, il diametro deve essere almeno doppio dello spessore del loader.');
$GLOBALS['TL_LANG']['tl_camera_shows']['piePosition'] = array('Posizione (pie)', 'Imposta la posizione del loader (pie).');
$GLOBALS['TL_LANG']['tl_camera_shows']['barDirection'] = array('Direzione (bar)', 'Imposta la direzione della barra di progressione');
$GLOBALS['TL_LANG']['tl_camera_shows']['barPosition'] = array('Posizione (bar)', 'Imposta la posizione della barra di progressione');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderPadding'] = array('Spaziatura', 'Imposta il padding della barra di progressione');
$GLOBALS['TL_LANG']['tl_camera_shows']['loaderStroke'] = array('Spessore', 'Nota: quando PIE, lo spessore deve essere meno di met&agrave; del diametro');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_camera_shows']['title_legend'] = 'Titolo';
$GLOBALS['TL_LANG']['tl_camera_shows']['camera_layout_legend'] = 'Apparenza';
$GLOBALS['TL_LANG']['tl_camera_shows']['camera_playcontrol_legend'] = 'Comportamento play';
$GLOBALS['TL_LANG']['tl_camera_shows']['loader_layout_legend'] = 'Loader';
$GLOBALS['TL_LANG']['tl_camera_shows']['camera_animation_legend'] = 'Animazione';
$GLOBALS['TL_LANG']['tl_camera_shows']['navigation_legend'] = 'Elementi di navigazione';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_camera_shows']['new']    = array('Nuovo Camera Slideshow ', 'Crea un nuovo Camera Slideshow');
$GLOBALS['TL_LANG']['tl_camera_shows']['show']   = array('Dettagli', 'Dettagli Slide Show ID %s');
$GLOBALS['TL_LANG']['tl_camera_shows']['edit']   = array('Modifica Slideshow', 'Slideshow ID %s');
$GLOBALS['TL_LANG']['tl_camera_shows']['editheader']   = array('Modifica impostazioni', 'Impostazioni slideshow ID %s');
$GLOBALS['TL_LANG']['tl_camera_shows']['copy']   = array('Copia Slideshow', 'Duplica ID %s');
$GLOBALS['TL_LANG']['tl_camera_shows']['delete'] = array('Elimina Slideshow', 'Elimina ID %s');