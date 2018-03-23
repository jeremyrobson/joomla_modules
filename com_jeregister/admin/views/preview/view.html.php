<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewPreview extends JViewLegacy
{

	function display($tpl = null)
	{
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->filename = JRequest::getVar("filename");

		JToolBarHelper::title(JText::_("COM_JEREGISTER_MEMBER_IMPORT_PREVIEW"));

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
		$document->setTitle(JText::_('COM_JEREGISTER_MEMBER_IMPORT_PREVIEW'));
	}
}
