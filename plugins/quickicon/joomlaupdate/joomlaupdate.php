<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Quickicon.Joomlaupdate
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Joomla! update notification plugin
 *
 * @package     Joomla.Plugin
 * @subpackage  Quickicon.Joomlaupdate
 * @since       2.5
 */
class PlgQuickiconJoomlaupdate extends JPlugin
{
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;

	/**
	 * This method is called when the Quick Icons module is constructing its set
	 * of icons. You can return an array which defines a single icon and it will
	 * be rendered right after the stock Quick Icons.
	 *
	 * @param   string  $context  The calling context
	 *
	 * @return  array  A list of icon definition associative arrays, consisting of the
	 *                 keys link, image, text and access.
	 *
	 * @since   2.5
	 */
	public function onGetIcons($context)
	{
		if ($context != $this->params->get('context', 'mod_quickicon') || !JFactory::getUser()->authorise('core.manage', 'com_installer'))
		{
			return;
		}

        $layout = new JLayoutFile('plugins.quickicon.joomlaupdate.default');
		$layout->render(
			array(
				'context' => $context
			)
		);

		return array(
			array(
				'link'  => 'index.php?option=com_joomlaupdate',
				'image' => 'joomla',
				'icon'  => 'header/icon-48-download.png',
				'text'  => JText::_('PLG_QUICKICON_JOOMLAUPDATE_CHECKING'),
				'id'    => 'plg_quickicon_joomlaupdate',
				'group' => 'MOD_QUICKICON_MAINTENANCE'
			)
		);
	}
}
