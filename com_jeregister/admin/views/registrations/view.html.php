<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewRegistrations extends JViewLegacy
{
	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$context = "jeregister.list.admin.jeregister";

		$this->items		= $this->get('Items');
		//$this->pagination	= $this->get('Pagination');
		//$this->state		= $this->get('State');
		//$this->canDo = JHelperContent::getActions('com_jeregister');

		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors), 500);
		}

		JToolBarHelper::title("Create farm profiles for registered users who don't yet have a profile in JeRegister");

		$this->addToolBar();

		parent::display($tpl);

		$this->setDocument();
	}

	protected function addToolBar()
	{
		$title = JText::_('COM_JEREGISTER_MANAGER_REGISTRATIONS');

        JToolBarHelper::custom("profile.import", "archive", "", "Import Selected", false);
        JToolBarHelper::cancel("profile.cancel");
	}
	
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_IMPORT_PREVIEW'));
	}
}
