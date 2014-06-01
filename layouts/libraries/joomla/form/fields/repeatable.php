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
 * Available variables in this layout:
 *
 * @var string $id 	    - field ID
 * @var string $name    - input name
 * @var string $value   - field value
 * @var JForm  $subform - repeatable fields collection
 * @var int    $maximum - maximum allowed repeating
 * @var string $select  - text for button
 * @var string $icon    - icon name for button
 * @var string $class   - class name
 */

// Build a Table
$head_row_str = array();
$body_row_str = array();
foreach ($subform->getFieldset() as $field)
{
	// Reset name to a simple
	$field->name = (string) $field->element['name'];

	// build heading
	$head_row_str[] = '<th>' . strip_tags($field->label);
	$head_row_str[] = '<br /><small style="font-weight:normal">' . JText::_($field->description) . '</small>';
	$head_row_str[] = '</th>';

	// build body
	$body_row_str[] = '<td>' . $field->input . '</td>';

}

// Append buttons
$head_row_str[] = '<th><div class="btn-group"><a href="#" class="add btn button btn-success"><span class="icon-plus"></span> </a></div></th>';
$body_row_str[] = '<td><div class="btn-group">';
$body_row_str[] = '<a class="add btn button btn-success"><span class="icon-plus"></span> </a>';
$body_row_str[] = '<a class="remove btn button btn-danger"><span class="icon-minus"></span> </a>';
$body_row_str[] = '</div></td>';

// Put all table parts together
$table = '<table id="' . $id . '_table" class="adminlist  table table-striped">'
			. '<thead><tr>' . implode("\n", $head_row_str) . '</tr></thead>'
			. '<tbody><tr>' . implode("\n", $body_row_str) . '</tr></tbody>'
		. '</table>';

// And finaly build a main container
$str   = array();
$str[] = '<div id="' . $id . '_container">';
// Add the table to modal
$str[] = '<div id="' . $id . '_modal" class="modal hide">';
$str[] =  $table;
// Add Save and Cancel buttons
$str[] = '<div class="modal-footer">';
$str[] = '<button class="close-modal btn button btn-link">' . JText::_('JCANCEL') . '</button>';
$str[] = '<button class="save-modal-data btn button btn-primary">' . JText::_('JAPPLY') . '</button>';
$str[] = '</div>';
$str[] = '</div>'; // close modal container
$str[] = '</div>'; // close main container

// Button for display the modal window
$select = JText::_($select);
$icon   = $icon ? '<i class="icon-' . $icon . '"></i> ' : '';
$str[]  = '<button class="open-modal btn" id="' . $id . '_button" >' . $icon . $select . '</button>';

// Add scripts
JHtml::_('bootstrap.framework');
JHtml::_('script', 'system/repeatable.js', true, true);

// Script options
$data = array();
$data[] = 'data-container="#' . $id . '_container"';
$data[] = 'data-modal-element="#' . $id . '_modal"';
$data[] = 'data-repeatable-element="table tbody tr"';
$data[] = 'data-bt-add="a.add"';
$data[] = 'data-bt-remove="a.remove"';
$data[] = 'data-bt-modal-open="#' . $id . '_button"';
$data[] = 'data-bt-modal-close="button.close-modal"';
$data[] = 'data-bt-modal-save-data="button.save-modal-data"';
$data[] = 'data-maximum="' . $maximum . '"';
$data[] = 'data-input="#' . $id . '"';

// Hidden input, where the main value is
$value = htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
$str[] = '<input type="hidden" name="' . $name . '" id="' . $id . '" value="' . $value . '"  class="form-field-repeatable ' . $class . '" ' . implode(' ', $data) . ' />';

// render (:
echo implode("\n", $str);

