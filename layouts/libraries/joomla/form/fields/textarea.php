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
$columns = 		$displayData[3];
$rows = 		$displayData[4];
$class = 		$displayData[5];
$readonly =		$displayData[6];
$disabled = 	$displayData[7];
$required = 	$displayData[8];
$hint = 		$displayData[9];
$autocomplete = $displayData[10];
$autofocus = 	$displayData[11];
$spellcheck = 	$displayData[12];
$onchange = 	$displayData[13];
$onclick = 		$displayData[14];

$displayData = array($this->name, $this->id, $this->value, $columns, $rows, $class, $readonly, $disabled, $required, $hint, $autocomplete, $autofocus, $spellcheck, $onchange, $onclick);



		JHtml::_('jquery.framework');
		JHtml::_('script', 'system/html5fallback.js', false, true);

		echo '<textarea name="' . $this->name . '" id="' . $this->id . '"' . $columns . $rows . $class
			. $hint . $disabled . $readonly . $onchange . $onclick . $required . $autocomplete . $autofocus . $spellcheck . ' >'
			. htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '</textarea>';


	

?>


