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



// Clean the terms array.
$filter = JFilterInput::getInstance();

$cleanTerms = array();

foreach ($terms as $term)
{
    $cleanTerms[] = htmlspecialchars($filter->clean($term, 'string'));
}

// Activate the highlighter.
JHtml::_('behavior.highlighter', $cleanTerms);

// Adjust the component buffer.
$doc = JFactory::getDocument();
$buf = $doc->getBuffer('component');
$buf = '<br id="highlighter-start" />' . $buf . '<br id="highlighter-end" />';
$doc->setBuffer($buf, 'component');

return true;