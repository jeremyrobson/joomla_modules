<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewInvoice extends JViewLegacy
{
	protected $form = null;
	protected $canDo;

	public function display($tpl = null)
	{
		$option = JRequest::getCmd('option'); //com_jregister namespace
		$app =JFactory::getApplication();
		$page = $app->getUserState("$option.page", "1");

		// Get the form to display
		$this->form = $this->get('Form');
		
		$this->item = $this->get("Item");

		// Call the parent display to display the layout file
		parent::display($tpl);

		// Set properties of the html document
		$this->setDocument();
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_DECLARATION_SUMMARY'));
	}
}