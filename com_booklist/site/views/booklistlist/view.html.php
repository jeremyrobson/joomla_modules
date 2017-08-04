<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_booklist
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HTML View class for the BookList Component
 *
 * @since  0.0.1
 */
class BookListViewBookListList extends JViewLegacy
{
	/**
	 * Display the BookList view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
        $this->header = JText::_("COM_BOOKLIST_BOOKLISTLIST_HEADER");

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		parent::display($tpl);
	}
}