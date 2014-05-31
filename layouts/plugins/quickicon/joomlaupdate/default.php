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

$cur_template = JFactory::getApplication()->getTemplate();
$url = JUri::base() . 'index.php?option=com_joomlaupdate';
$ajax_url = JUri::base() . 'index.php?option=com_installer&view=update&task=update.ajax';
$script = array();
$script[] = 'var plg_quickicon_joomlaupdate_url = \'' . $url . '\';';
$script[] = 'var plg_quickicon_joomlaupdate_ajax_url = \'' . $ajax_url . '\';';
$script[] = 'var plg_quickicon_jupdatecheck_jversion = \'' . JVERSION . '\'';
$script[] = 'var plg_quickicon_joomlaupdate_text = {'
	. '"UPTODATE" : "' . JText::_('PLG_QUICKICON_JOOMLAUPDATE_UPTODATE', true) . '",'
	. '"UPDATEFOUND": "' . JText::_('PLG_QUICKICON_JOOMLAUPDATE_UPDATEFOUND', true) . '",'
	. '"UPDATEFOUND_MESSAGE": "' . JText::_('PLG_QUICKICON_JOOMLAUPDATE_UPDATEFOUND_MESSAGE', true) . '",'
	. '"UPDATEFOUND_BUTTON": "' . JText::_('PLG_QUICKICON_JOOMLAUPDATE_UPDATEFOUND_BUTTON', true) . '",'
	. '"ERROR": "' . JText::_('PLG_QUICKICON_JOOMLAUPDATE_ERROR', true) . '",'
	. '};';
$script[] = 'var plg_quickicon_joomlaupdate_img = {'
	. '"UPTODATE" : "' . JUri::base(true) . '/templates/' . $cur_template . '/images/header/icon-48-jupdate-uptodate.png",'
	. '"UPDATEFOUND": "' . JUri::base(true) . '/templates/' . $cur_template . '/images/header/icon-48-jupdate-updatefound.png",'
	. '"ERROR": "' . JUri::base(true) . '/templates/' . $cur_template . '/images/header/icon-48-deny.png",'
	. '};';

JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));
JHtml::_('script', 'plg_quickicon_joomlaupdate/jupdatecheck.js', false, true);