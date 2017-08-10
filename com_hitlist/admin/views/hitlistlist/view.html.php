<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_hitlist
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * hitlistlist View
 *
 * @since  0.0.1
 */
class HitListViewHitListList extends JViewLegacy
{

	protected $form = null;
	protected $items = null;

	/**
	 * Display the Hit List List view (multiple)
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		$this->form 		= $this->get('Form');
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
		JToolbarHelper::title(JText::_('COM_HITLIST_MANAGER_HITLISTLIST'));
		JToolBarHelper :: custom( 'downloadCSV', 'download', 'download', 'Download CSV', false, false );

		//pagination doesn't work without these lines (unless adding an add/edit/delete button)
		JHtml::_('behavior.core');
		JHtml::_('behavior.framework');
		JHtml::_('behavior.tooltip');
	}
}