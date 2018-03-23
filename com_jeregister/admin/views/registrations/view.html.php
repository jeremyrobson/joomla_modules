<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewRegistrations extends JViewLegacy
{
	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$context = "jeregister.list.admin.jeregister";

		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');
		$this->canDo = JHelperContent::getActions('com_jeregister');

		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors), 500);
		}

		// Set the submenu
		//JeRegisterHelper::addSubmenu('registrations');

		JToolBarHelper::title("BGO Registrations");

		// Options button.
		if (JFactory::getUser()->authorise('core.admin', 'com_jeregister')) 
		{
			JToolBarHelper::preferences('com_jeregister');
		}

		// Set the toolbar and number of found items
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
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
		$title = JText::_('COM_JEREGISTER_MANAGER_REGISTRATIONS');

		/*
		if ($this->pagination->total)
		{
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		}

		JToolBarHelper::title($title, 'jeregister');

		if ($this->canDo->get('core.create')) 
		{
			JToolBarHelper::addNew('jeregister.add', 'JTOOLBAR_NEW');
		}
		if ($this->canDo->get('core.edit')) 
		{
			JToolBarHelper::editList('jeregister.edit', 'JTOOLBAR_EDIT');
		}
		if ($this->canDo->get('core.delete')) 
		{
			JToolBarHelper::deleteList('', 'registrations.delete', 'JTOOLBAR_DELETE');
		}
		if ($this->canDo->get('core.admin')) 
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_jeregister');
		}
		*/
	}
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_ADMINISTRATION'));
	}
}
