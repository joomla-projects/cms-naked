<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$row     = &$displayData[0];
$matches = &$displayData[1];
$page    = &$displayData[2];
$params  = &$displayData[3];

$heading = isset($row->title) ? $row->title : JText::_('PLG_CONTENT_PAGEBREAK_NO_TITLE');
$input = JFactory::getApplication()->input;
$limitstart = $input->getUInt('limitstart', 0);
$showall = $input->getInt('showall', 0);

// TOC header.
$row->toc = '<div class="pull-right article-index">';

if ($params->get('article_index') == 1)
{
    $headingtext = JText::_('PLG_CONTENT_PAGEBREAK_ARTICLE_INDEX');

    if ($params->get('article_index_text'))
    {
        htmlspecialchars($headingtext = $params->get('article_index_text'));
    }

    $row->toc .= '<h3>' . $headingtext . '</h3>';
}

// TOC first Page link.
$class = ($limitstart === 0 && $showall === 0) ? 'toclink active' : 'toclink';
$row->toc .= '<ul class="nav nav-tabs nav-stacked">
<li class="' . $class . '">

    <a href="' . JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catid) . '&showall=&limitstart=') . '" class="' . $class . '">'
    . $heading .
    '</a>

</li>
';

$i = 2;

foreach ($matches as $bot)
{
    $link = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catid) . '&showall=&limitstart=' . ($i - 1));

    if (@$bot[0])
    {
        $attrs2 = JUtility::parseAttributes($bot[0]);

        if (@$attrs2['alt'])
        {
            $title  = stripslashes($attrs2['alt']);
        }
        elseif (@$attrs2['title'])
        {
            $title  = stripslashes($attrs2['title']);
        }
        else
        {
            $title  = JText::sprintf('PLG_CONTENT_PAGEBREAK_PAGE_NUM', $i);
        }
    }
    else
    {
        $title  = JText::sprintf('PLG_CONTENT_PAGEBREAK_PAGE_NUM', $i);
    }

    $class = ($limitstart == $i - 1) ? 'toclink active' : 'toclink';
    $row->toc .= '
        <li>

            <a href="' . $link . '" class="' . $class . '">'
            . $title .
            '</a>

        </li>
        ';
    $i++;
}

if ($params->get('showall'))
{
    $link = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catid) . '&showall=1&limitstart=');
    $class = ($showall == 1) ? 'toclink active' : 'toclink';
    $row->toc .= '
    <li>

            <a href="' . $link . '" class="' . $class . '">'
            . JText::_('PLG_CONTENT_PAGEBREAK_ALL_PAGES') .
            '</a>

    </li>
    ';
}

$row->toc .= '</ul></div>';
