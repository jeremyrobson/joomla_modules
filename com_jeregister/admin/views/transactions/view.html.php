<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewTransactions extends JViewLegacy
{

	function display($tpl = null)
	{
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		JToolBarHelper::title("BGO Transactions");

		if (JFactory::getUser()->authorise('core.admin', 'com_jeregister')) 
		{
			JToolBarHelper::preferences('com_jeregister');
		}

		parent::display($tpl);

		$this->setDocument();
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_TRANSACTIONS'));
	}
}