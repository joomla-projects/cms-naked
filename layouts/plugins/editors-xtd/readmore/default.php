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

/**
 * Layout variables
 * ---------------------
 * 	$getContent      : (string) The content being passed to the plugin
 * 	$present         : (string) Alert message
 */

$script = "
	function insertReadmore(editor)
	{
		var content = $getContent
		if (content.match(/<hr\s+id=(\"|')system-readmore(\"|')\s*\/*>/i))
		{
			alert('$present');
			return false;
		} else {
			jInsertEditorText('<hr id=\"system-readmore\" />', editor);
		}
	}
";

JFactory::getDocument()->addScriptDeclaration($script);
