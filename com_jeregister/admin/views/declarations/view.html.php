<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewDeclarations extends JViewLegacy
{

	function display($tpl = null)
	{
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		JToolBarHelper::title(JText::_("COM_JEREGISTER_DECLARATIONS"));

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

		JToolBarHelper::back();
		JToolBarHelper::custom("declarations.export", "archive", "", "Download Declarations CSV", false);
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_DECLARATIONS'));
	}
}
