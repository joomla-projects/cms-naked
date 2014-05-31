<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Editors-xtd.readmore
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Editor Readmore buton
 *
 * @package     Joomla.Plugin
 * @subpackage  Editors-xtd.readmore
 * @since       1.5
 */
class PlgButtonReadmore extends JPlugin
{
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;

	/**
	 * Readmore button
	 *
	 * @param   string  $name  The name of the button to add
	 *
	 * @return array A two element array of (imageName, textToInsert)
	 */
	public function onDisplay($name)
	{
		// Button is not active in specific content components
		$getContent = $this->_subject->getContent($name);
		$present = JText::_('PLG_READMORE_ALREADY_EXISTS', true);

		$this->getRenderer('default')->render(
			array(
				'getContent' => $getContent,
				'present' => $present

			));

		$button = new JObject;
		$button->modal = false;
		$button->class = 'btn';
		$button->onclick = 'insertReadmore(\'' . $name . '\');return false;';
		$button->text = JText::_('PLG_READMORE_BUTTON_READMORE');
		$button->name = 'arrow-down';

		// @TODO: The button writer needs to take into account the javascript directive
		// $button->link', 'javascript:void(0)');
		$button->link = '#';

		return $button;
	}
}
