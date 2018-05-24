<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewProfiles extends JViewLegacy
{

	function display($tpl = null)
	{
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		if (JFactory::getUser()->authorise('core.admin', 'com_jeregister')) 
		{
			JToolBarHelper::preferences('com_jeregister');
		}

		$this->addToolBar();

		parent::display($tpl);

		$this->setDocument();
	}

	protected function addToolBar()
	{
		$title = JText::_('COM_JEREGISTER_MANAGER_REGISTRATIONS');

		JToolBarHelper::custom("registrations.import", "archive", "", "Import CSV", false);
		JToolBarHelper::custom("declarations.list", "archive", "", "View Declarations", false);
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_PROFILES'));
		JToolBarHelper::title("BGO Profiles");
	}
}
