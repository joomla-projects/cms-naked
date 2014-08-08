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

<ul>
    <li>
        <?php
            // << Prev
            echo ($page > 0 ? '<a href="' . $link_prev . '">' . JText::_('JGLOBAL_LT') . JText::_('JGLOBAL_LT') . $pnSpace : '');
            echo JText::_('JPREV');
            echo ($page > 0 ? '</a>' : '');
        ?>
    </li>
    <li>
        <?php
            echo ($page < $n - 1 ? '<a href="' . $link_next . '">' : '');
            echo JText::_('JNEXT');
            echo ($page < $n - 1 ? $pnSpace . JText::_('JGLOBAL_GT') . JText::_('JGLOBAL_GT') . '</a>' : '');
        ?>
    </li>
</ul>