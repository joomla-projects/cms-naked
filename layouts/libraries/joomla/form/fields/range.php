<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

extract($displayData);

// Including fallback code for HTML5 non supported browsers.
		JHtml::_('jquery.framework');
		JHtml::_('script', 'system/html5fallback.js', false, true);

		echo '<input type="range" name="' . $name . '" id="' . $id . '"' . ' value="'
			. htmlspecialchars($value, ENT_COMPAT, 'UTF-8') . '"' . $class . $disabled . $readonly
			. $onchange . $max . $step . $min . $autofocus . ' />';

