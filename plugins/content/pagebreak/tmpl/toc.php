<?php
/**
 * @package     Joomla.Site
 * @subpackage  Content.pagebreak
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
?>
<div class="pull-right article-index">

<?php if ($params->get('article_index') == 1): ?>
    <h3><?php echo $headingtext; ?></h3>
<?php endif; ?>

<?php
// TOC first Page link.
$class = ($limitstart === 0 && $showall === 0) ? 'toclink active' : 'toclink';
?>
    <ul class="nav nav-tabs nav-stacked">
        <li class="<?php echo $class; ?>">
            <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catid) . '&showall=&limitstart='); ?>" class="<?php echo $class; ?>">
                <?php echo $heading; ?>
            </a>
        </li>

<?php
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
?>
        <li>

            <a href="<?php echo $link ;?>" class="<?php $class; ?>">
                <?php echo $title; ?>
            </a>
        </li>
<?php
    $i++;
}

if ($params->get('showall'))
{
    $link = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catid) . '&showall=1&limitstart=');
    $class = ($showall == 1) ? 'toclink active' : 'toclink';
?>
        <li>
            <a href="<?php echo $link; ?>" class="<?php echo $class; ?>">
                <?php echo JText::_('PLG_CONTENT_PAGEBREAK_ALL_PAGES'); ?>
            </a>
        </li>
<?php } ?>
    </ul>
</div>
