<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.pagebreak
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.utilities.utility');

/**
 * Page break plugin
 *
 * <b>Usage:</b>
 * <code><hr class="system-pagebreak" /></code>
 * <code><hr class="system-pagebreak" title="The page title" /></code>
 * or
 * <code><hr class="system-pagebreak" alt="The first page" /></code>
 * or
 * <code><hr class="system-pagebreak" title="The page title" alt="The first page" /></code>
 * or
 * <code><hr class="system-pagebreak" alt="The first page" title="The page title" /></code>
 *
 * @package     Joomla.Plugin
 * @subpackage  Content.pagebreak
 * @since       1.6
 */
class PlgContentPagebreak extends JPlugin
{
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;

	/**
	 * Plugin that adds a pagebreak into the text and truncates text at that point
	 *
	 * @param   string   $context  The context of the content being passed to the plugin.
	 * @param   object   &$row     The article object.  Note $article->text is also available
	 * @param   mixed    &$params  The article params
	 * @param   integer  $page     The 'page' number
	 *
	 * @return  mixed  Always returns void or true
	 *
	 * @since   1.6
	 */
	public function onContentPrepare($context, &$row, &$params, $page = 0)
	{
		$canProceed = $context == 'com_content.article';

		if (!$canProceed)
		{
			return;
		}

		$style = $this->params->get('style', 'pages');

		// Expression to search for.
		$regex = '#<hr(.*)class="system-pagebreak"(.*)\/>#iU';

		$input = JFactory::getApplication()->input;

		$print = $input->getBool('print');
		$showall = $input->getBool('showall');

		if (!$this->params->get('enabled', 1))
		{
			$print = true;
		}

		if ($print)
		{
			$row->text = preg_replace($regex, '<br />', $row->text);

			return true;
		}

		// Simple performance check to determine whether bot should process further.
		if (JString::strpos($row->text, 'class="system-pagebreak') === false)
		{
			return true;
		}

		$view = $input->getString('view');
		$full = $input->getBool('fullview');

		if (!$page)
		{
			$page = 0;
		}

		if ($params->get('intro_only') || $params->get('popup') || $full || $view != 'article')
		{
			$row->text = preg_replace($regex, '', $row->text);

			return;
		}

		// Find all instances of plugin and put in $matches.
		$matches = array();
		preg_match_all($regex, $row->text, $matches, PREG_SET_ORDER);

		if (($showall && $this->params->get('showall', 1)))
		{
			$hasToc = $this->params->get('multipage_toc', 1);

			if ($hasToc)
			{
				// Display TOC.
				$page = 1;
				$this->_createToc($row, $matches, $page);
			}
			else
			{
				$row->toc = '';
			}

			$row->text = preg_replace($regex, '<br />', $row->text);

			return true;
		}

		// Split the text around the plugin.
		$text = preg_split($regex, $row->text);

		// Count the number of pages.
		$n = count($text);

		// We have found at least one plugin, therefore at least 2 pages.
		if ($n > 1)
		{
			$title	= $this->params->get('title', 1);
			$hasToc = $this->params->get('multipage_toc', 1);

			// Adds heading or title to <site> Title.
			if ($title)
			{
				if ($page)
				{
					if ($page && @$matches[$page - 1][2])
					{
						$attrs = JUtility::parseAttributes($matches[$page - 1][1]);

						if (@$attrs['title'])
						{
							$row->page_title = $attrs['title'];
						}
					}
				}
			}

			// Reset the text, we already hold it in the $text array.
			$row->text = '';

			if ($style == 'pages')
			{
				// Display TOC.
				if ($hasToc)
				{
					$this->_createToc($row, $matches, $page);
				}
				else
				{
					$row->toc = '';
				}

				// Traditional mos page navigation
				$pageNav = new JPagination($n, $page, 1);

				// Page counter.
				$row->text .= '<div class="pagenavcounter">';
				$row->text .= $pageNav->getPagesCounter();
				$row->text .= '</div>';

				// Page text.
				$text[$page] = str_replace('<hr id="system-readmore" />', '', $text[$page]);
				$row->text .= $text[$page];

				// $row->text .= '<br />';
				$row->text .= '<div class="pager">';

				// Adds navigation between pages to bottom of text.
				if ($hasToc)
				{
					$this->_createNavigation($row, $page, $n);
				}

				// Page links shown at bottom of page if TOC disabled.
				if (!$hasToc)
				{
					$row->text .= $pageNav->getPagesLinks();
				}

				$row->text .= '</div>';
			}
			else
			{
				$t[] = $text[0];

				$t[] = (string) JHtml::_($style . '.start', 'article' . $row->id . '-' . $style);

				foreach ($text as $key => $subtext)
				{
					if ($key >= 1)
					{
						$match = $matches[$key - 1];
						$match = (array) JUtility::parseAttributes($match[0]);

						if (isset($match['alt']))
						{
							$title	= stripslashes($match['alt']);
						}
						elseif (isset($match['title']))
						{
							$title	= stripslashes($match['title']);
						}
						else
						{
							$title	= JText::sprintf('PLG_CONTENT_PAGEBREAK_PAGE_NUM', $key + 1);
						}

						$t[] = (string) JHtml::_($style . '.panel', $title, 'article' . $row->id . '-' . $style . $key);
					}

					$t[] = (string) $subtext;
				}

				$t[] = (string) JHtml::_($style . '.end');

				$row->text = implode(' ', $t);
			}
		}

		return true;
	}

	/**
	 * Creates a Table of Contents for the pagebreak
	 *
	 * @param   object   &$row      The article object.  Note $article->text is also available
	 * @param   array    &$matches  Array of matches of a regex in onContentPrepare
	 * @param   integer  &$page     The 'page' number
	 *
	 * @return  void
	 *
	 * @since  1.6
	 */
	protected function _createTOC(&$row, &$matches, &$page)
	{
        $params = $this->params;

        $heading = isset($row->title) ? $row->title : JText::_('PLG_CONTENT_PAGEBREAK_NO_TITLE');
        $input = JFactory::getApplication()->input;
        $limitstart = $input->getUInt('limitstart', 0);
        $showall = $input->getInt('showall', 0);

        $headingtext = JText::_('PLG_CONTENT_PAGEBREAK_ARTICLE_INDEX');

        if ($params->get('article_index_text'))
        {
            htmlspecialchars($headingtext = $params->get('article_index_text'));
        }

        $html = '';

        // Get the path for the toc layout file
        $path = JPluginHelper::getLayoutPath('content', 'pagebreak', 'toc');

        // Render the toc
        ob_start();
        include $path;
        $html .= ob_get_clean();

		$row->toc = $html;
	}

	/**
	 * Creates the navigation for the item
	 *
	 * @param   object  &$row  The article object.  Note $article->text is also available
	 * @param   int     $page  The total number of pages
	 * @param   int     $n     The page number
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function _createNavigation(&$row, $page, $n)
	{
        $pnSpace = '';

        if (JText::_('JGLOBAL_LT') || JText::_('JGLOBAL_LT'))
        {
            $pnSpace = ' ';
        }

        if ($page < $n - 1)
        {
            $page_next = $page + 1;

            $link_next = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catid) . '&showall=&limitstart=' . ($page_next));
        }

        if ($page > 0)
        {
            $page_prev = $page - 1 == 0 ? '' : $page - 1;

            $link_prev = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catid) . '&showall=&limitstart=' . ($page_prev));
        }

        $html = '';

        // Get the path for the page navigation layout file
        $path = JPluginHelper::getLayoutPath('content', 'pagebreak', 'navigation');

        // Render the page navigation
        ob_start();
        include $path;
        $html .= ob_get_clean();

        $row->text .= $html;

	}
}
