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

			JHtml::_('behavior.colorpicker');

			echo '<input type="text" name="' . $name . '" id="' . $id . '"' . ' value="'
				. htmlspecialchars($color, ENT_COMPAT, 'UTF-8') . '"' . $hint . $class . $position . $control
				. $readonly . $disabled . $required . $onchange . $autocomplete . $autofocus . '/>';
