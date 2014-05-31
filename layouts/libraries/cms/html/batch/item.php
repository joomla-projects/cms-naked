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


// Create the copy/move options.
$options = array(
    JHtml::_('select.option', 'c', JText::_('JLIB_HTML_BATCH_COPY')),
    JHtml::_('select.option', 'm', JText::_('JLIB_HTML_BATCH_MOVE'))
);

// Create the batch selector to change select the category by which to move or copy.
echo
    '<label id="batch-choose-action-lbl" for="batch-choose-action">' . JText::_('JLIB_HTML_BATCH_MENU_LABEL') . '</label>'
    . '<div id="batch-choose-action" class="control-group">'
    . '<select name="batch[category_id]" class="inputbox" id="batch-category-id">'
    . '<option value="">' . JText::_('JSELECT') . '</option>'
    . JHtml::_('select.options', JHtml::_('category.options', $extension))
    . '</select>'
    . '</div>'
    . '<div id="batch-move-copy" class="control-group radio">'
    . JHtml::_('select.radiolist', $options, 'batch[move_copy]', '', 'value', 'text', 'm')
    . '</div>';