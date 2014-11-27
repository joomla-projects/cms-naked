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

// Create the batch selector to change an access level on a selection list.
echo
    '<label id="batch-access-lbl" for="batch-access" class="modalTooltip" '
    . 'title="' . JHtml::tooltipText('JLIB_HTML_BATCH_ACCESS_LABEL', 'JLIB_HTML_BATCH_ACCESS_LABEL_DESC') . '">'
    . JText::_('JLIB_HTML_BATCH_ACCESS_LABEL')
    . '</label>'
    . JHtml::_(
        'access.assetgrouplist',
        'batch[assetgroup_id]', '',
        'class="inputbox"',
        array(
            'title' => JText::_('JLIB_HTML_BATCH_NOCHANGE'),
            'id' => 'batch-access'
        )
    );


