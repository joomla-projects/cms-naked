<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$row  = &$displayData[0];
$page = $displayData[1];
$n    = $displayData[2];

$pnSpace = '';

if (JText::_('JGLOBAL_LT') || JText::_('JGLOBAL_LT'))
{
    $pnSpace = ' ';
}

if ($page < $n - 1)
{
    $page_next = $page + 1;

    $link_next = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catid) . '&showall=&limitstart=' . ($page_next));

    // Next >>
    $next = '<a href="' . $link_next . '">' . JText::_('JNEXT') . $pnSpace . JText::_('JGLOBAL_GT') . JText::_('JGLOBAL_GT') . '</a>';
}
else
{
    $next = JText::_('JNEXT');
}

if ($page > 0)
{
    $page_prev = $page - 1 == 0 ? '' : $page - 1;

    $link_prev = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catid) . '&showall=&limitstart=' . ($page_prev));

    // << Prev
    $prev = '<a href="' . $link_prev . '">' . JText::_('JGLOBAL_LT') . JText::_('JGLOBAL_LT') . $pnSpace . JText::_('JPREV') . '</a>';
}
else
{
    $prev = JText::_('JPREV');
}

$row->text .= '<ul><li>' . $prev . ' </li><li>' . $next . '</li></ul>';