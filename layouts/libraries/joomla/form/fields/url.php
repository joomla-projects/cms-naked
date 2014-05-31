<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


//		
$name = 		$displayData[0];
$id = 			$displayData[1];
$value = 		$displayData[2];
$size = 		$displayData[3];
$maxlength = 	$displayData[4];
$class = 		$displayData[5];
$readonly =		$displayData[6];
$disabled = 	$displayData[7];
$required = 	$displayData[8];
$hint = 		$displayData[9];
$autocomplete = $displayData[10];
$autofocus = 	$displayData[11];
$spellcheck = 	$displayData[12];
$onchange = 	$displayData[13];


// Including fallback code for HTML5 non supported browsers.
		JHtml::_('jquery.framework');
		JHtml::_('script', 'system/html5fallback.js', false, true);
		echo '<input type="url" name="' . $name . '"' . $class . ' id="' . $id . '" value="'
			. htmlspecialchars(JStringPunycode::urlToUTF8($value), ENT_COMPAT, 'UTF-8') . '"' . $size . $disabled . $readonly
			. $hint . $autocomplete . $autofocus . $spellcheck . $onchange . $maxLength . $required . ' />';
	

?>


