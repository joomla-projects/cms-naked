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
 * Variables
 * ---------------------
 * 	$ajax_url        : (string) The url of the ajax call to be executed
 */

JHtml::_('jquery.framework');

$script = "var plg_quickicon_extensionupdate_ajax_url = '$ajaxUrl';\n";
$script .= 'var plg_quickicon_extensionupdate_text = {"UPTODATE" : "'
	. JText::_('PLG_QUICKICON_EXTENSIONUPDATE_UPTODATE', true) . '", "UPDATEFOUND": "'
	. JText::_('PLG_QUICKICON_EXTENSIONUPDATE_UPDATEFOUND', true) . '", "ERROR": "'
	. JText::_('PLG_QUICKICON_EXTENSIONUPDATE_ERROR', true) . "\"};\n";
$document = JFactory::getDocument();
$document->addScriptDeclaration($script);
JHtml::_('script', 'plg_quickicon_extensionupdate/extensionupdatecheck.js', false, true);