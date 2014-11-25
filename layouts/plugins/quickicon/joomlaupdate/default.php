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
 * @var   string     $context       The calling context
 * @var   JRegistry  $pluginParams  Plugin paramters
 */

$url         = JUri::base() . 'index.php?option=com_joomlaupdate';
$ajaxUrl     = JUri::base() . 'index.php?option=com_installer&view=update&task=update.ajax';
$templateUrl = JUri::base(true) . '/templates/' . JFactory::getApplication()->getTemplate();


JHtml::_('jquery.framework');

JFactory::getDocument()->addScriptDeclaration("
	var plg_quickicon_joomlaupdate_url = '" . $url . "';
	var plg_quickicon_joomlaupdate_ajax_url = '" . $ajaxUrl . "';
	var plg_quickicon_jupdatecheck_jversion = '" . JVERSION . "';
	var plg_quickicon_joomlaupdate_text = {
		'UPTODATE'           : '" . JText::_('PLG_QUICKICON_JOOMLAUPDATE_UPTODATE', true) . "',
		'UPDATEFOUND'        : '" . JText::_('PLG_QUICKICON_JOOMLAUPDATE_UPDATEFOUND', true) . "',
		'UPDATEFOUND_MESSAGE': '" . JText::_('PLG_QUICKICON_JOOMLAUPDATE_UPDATEFOUND_MESSAGE', true) . "',
		'ERROR'              : '" . JText::_('PLG_QUICKICON_JOOMLAUPDATE_ERROR', true) . "'
	};
	var plg_quickicon_joomlaupdate_img = {
		'UPTODATE' : '" . $templateUrl . "/images/header/icon-48-jupdate-uptodate.png',
		'UPDATEFOUND': '" . $templateUrl . "/images/header/icon-48-jupdate-updatefound.png',
		'ERROR': '" . $templateUrl . "/images/header/icon-48-deny.png'
	};
");

JHtml::_('script', 'plg_quickicon_joomlaupdate/jupdatecheck.js', false, true);
