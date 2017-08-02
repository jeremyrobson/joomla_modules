<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_booklist
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * booklistlist View
 *
 * @since  0.0.1
 */
class BookListViewBookListList extends JViewLegacy
{
	/**
	 * Display the Book List view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		$this->addToolBar();

		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		JToolbarHelper::title(JText::_('COM_BOOKLIST_MANAGER_BOOKLISTLIST'));
		JToolbarHelper::addNew('booklist.add');
		JToolbarHelper::editList('booklist.edit');
		JToolbarHelper::deleteList('', 'booklistlist.delete');
	}
}