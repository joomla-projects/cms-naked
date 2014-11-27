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

// Create the batch selector to change the language on a selection list.
return
'<label id="batch-language-lbl" for="batch-language-id" class="modalTooltip"'
. ' title="' . JHtml::tooltipText('JLIB_HTML_BATCH_LANGUAGE_LABEL', 'JLIB_HTML_BATCH_LANGUAGE_LABEL_DESC') . '">'
. JText::_('JLIB_HTML_BATCH_LANGUAGE_LABEL')
. '</label>'
. '<select name="batch[language_id]" class="inputbox" id="batch-language-id">'
    . '<option value="">' . JText::_('JLIB_HTML_BATCH_LANGUAGE_NOCHANGE') . '</option>'
    . JHtml::_('select.options', JHtml::_('contentlanguage.existing', true, true), 'value', 'text')
    . '</select>';


