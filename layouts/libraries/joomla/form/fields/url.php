<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


extract($displayData);

// Including fallback code for HTML5 non supported browsers.
		JHtml::_('jquery.framework');
		JHtml::_('script', 'system/html5fallback.js', false, true);
		echo '<input type="url" name="' . $name . '"' . $class . ' id="' . $id . '" value="'
			. htmlspecialchars(JStringPunycode::urlToUTF8($value), ENT_COMPAT, 'UTF-8') . '"' . $size . $disabled . $readonly
			. $hint . $autocomplete . $autofocus . $spellcheck . $onchange . $maxLength . $required . ' />';
	

?>


