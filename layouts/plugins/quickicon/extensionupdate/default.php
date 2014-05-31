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
 * 	$context         : (string) The context of the content being passed to the plugin
 */

JHtml::_('jquery.framework');

$ajax_url = JUri::base() . 'index.php?option=com_installer&view=update&task=update.ajax';
$script = "var plg_quickicon_extensionupdate_ajax_url = '$ajax_url';\n";
$script .= 'var plg_quickicon_extensionupdate_text = {"UPTODATE" : "'
	. JText::_('PLG_QUICKICON_EXTENSIONUPDATE_UPTODATE', true) . '", "UPDATEFOUND": "'
	. JText::_('PLG_QUICKICON_EXTENSIONUPDATE_UPDATEFOUND', true) . '", "ERROR": "'
	. JText::_('PLG_QUICKICON_EXTENSIONUPDATE_ERROR', true) . "\"};\n";
$document = JFactory::getDocument();
$document->addScriptDeclaration($script);
JHtml::_('script', 'plg_quickicon_extensionupdate/extensionupdatecheck.js', false, true);