<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewSummary extends JViewLegacy
{
	protected $form = null;
	protected $canDo;

	public function display($tpl = null)
	{
		$option = JRequest::getCmd('option'); //com_jregister namespace
		$mainframe =JFactory::getApplication();
		$page = $mainframe->getUserState("$option.page", "1");

		$this->form = $this->get('Form');
		$this->item = $this->get("Item");

		parent::display($tpl);

		$this->setDocument();
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_DECLARATION_SUMMARY'));
	}
}
