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
 * 	$row             : (object) The article object
 * 	$params          : (JRegistry)  The article params
 * 	  - showVoteForm : (boolean) Do we have to show the vote form?
 * 	$page            : (int) The 'page' number
 */

JHtml::_('bootstrap.tooltip', '.modalTooltip', array('container' => '.modal-body'));

$optionNo = '';

if ($noUser)
{
$optionNo = '<option value="0">' . JText::_('JLIB_HTML_BATCH_USER_NOUSER') . '</option>';
}

// Create the batch selector to select a user on a selection list.
return
'<label id="batch-user-lbl" for="batch-user" class="modalTooltip"'
. ' title="' . JHtml::tooltipText('JLIB_HTML_BATCH_USER_LABEL', 'JLIB_HTML_BATCH_USER_LABEL_DESC') . '">'
. JText::_('JLIB_HTML_BATCH_USER_LABEL')
. '</label>'
. '<select name="batch[user_id]" class="inputbox" id="batch-user-id">'
    . '<option value="">' . JText::_('JLIB_HTML_BATCH_USER_NOCHANGE') . '</option>'
    . $optionNo
    . JHtml::_('select.options', JHtml::_('user.userlist'), 'value', 'text')
    . '</select>';