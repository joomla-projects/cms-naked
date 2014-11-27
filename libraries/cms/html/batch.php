<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  HTML
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Extended Utility class for batch processing widgets.
 *
 * @package     Joomla.Libraries
 * @subpackage  HTML
 * @since       1.7
 */
abstract class JHtmlBatch
{
    /**
     * Display a batch widget for the access level selector.
     *
     * @return  string  The necessary HTML for the widget.
     *
     * @since   1.7
     */
    public static function access()
    {
        return JLayoutHelper::render('libraries.cms.html.batch.access', array());
    }

    /**
     * Displays a batch widget for moving or copying items.
     *
     * @param   string  $extension  The extension that owns the category.
     *
     * @return  string  The necessary HTML for the widget.
     *
     * @since   1.7
     */
    public static function item($extension)
    {
        return JLayoutHelper::render('libraries.cms.html.batch.item', array("extension" => $extension));
    }

    /**
     * Display a batch widget for the language selector.
     *
     * @return  string  The necessary HTML for the widget.
     *
     * @since   2.5
     */
    public static function language()
    {
        return JLayoutHelper::render('libraries.cms.html.batch.language', array());
    }

    /**
     * Display a batch widget for the user selector.
     *
     * @param   boolean  $noUser  Choose to display a "no user" option
     *
     * @return  string  The necessary HTML for the widget.
     *
     * @since   2.5
     */
    public static function user($noUser = true)
    {
        return JLayoutHelper::render('libraries.cms.html.batch.user', array("noUser" => $noUser));
    }

    /**
     * Display a batch widget for the tag selector.
     *
     * @return  string  The necessary HTML for the widget.
     *
     * @since   3.1
     */
    public static function tag()
    {
        return JLayoutHelper::render('libraries.cms.html.batch.tag', array());
    }
}
