<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

extract($displayData);

JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', false, true);
?>

<textarea name="<?php echo $name; ?>" id="<?php echo $id; ?>" <?php echo $columns . $rows . $class
	. $hint . $disabled . $readonly . $onchange . $onclick . $required . $autocomplete . $autofocus . $spellcheck; ?>
	><?php echo htmlspecialchars($value, ENT_COMPAT, 'UTF-8'); ?>
</textarea>
