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

// Create the batch selector to tag items on a selection list.
return
    '<label id="batch-tag-lbl" for="batch-tag-id" class="modalTooltip"'
    . ' title="' . JHtml::tooltipText('JLIB_HTML_BATCH_TAG_LABEL', 'JLIB_HTML_BATCH_TAG_LABEL_DESC') . '">'
    . JText::_('JLIB_HTML_BATCH_TAG_LABEL')
    . '</label>'
    . '<select name="batch[tag]" class="inputbox" id="batch-tag-id">'
    . '<option value="">' . JText::_('JLIB_HTML_BATCH_TAG_NOCHANGE') . '</option>'
    . JHtml::_('select.options', JHtml::_('tag.tags', array('filter.published' => array(1))), 'value', 'text')
    . '</select>';