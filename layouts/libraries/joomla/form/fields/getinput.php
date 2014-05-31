<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


//		

extract($displayData);
	
if ($options)
		{
			$datalist = '<datalist id="' . $id . '_datalist">';

			foreach ($options as $option)
			{
				if (!$option->value)
				{
					continue;
				}

				$datalist .= '<option value="' . $option->value . '">' . $option->text . '</option>';
			}

			$datalist .= '</datalist>';
			$list     = ' list="' . $id . '_datalist"';
		}

		$html[] = '<input type="text" name="' . $name . '" id="' . $id . '"' . $dirname . ' value="'
			. htmlspecialchars($value, ENT_COMPAT, 'UTF-8') . '"' . $class . $size . $disabled . $readonly . $list
			. $hint . $onchange . $maxLength . $required . $autocomplete . $autofocus . $spellcheck . $inputmode . $pattern . ' />';
		$html[] = $datalist;

		echo implode($html);



?>


