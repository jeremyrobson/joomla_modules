<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewInvoice extends JViewLegacy
{
	protected $form = null;
	protected $canDo;

	public function display($tpl = null)
	{
		$option = JRequest::getCmd('option'); //com_jregister namespace
		$app = JFactory::getApplication();
		$page = $app->getUserState("$option.page", "1");

		$this->form = $this->get("Form");
		$this->item = $this->get("Item");
		$this->script = $this->get("Script");

		parent::display($tpl);

		$this->setDocument();
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_DECLARATION_INVOICE'));
		$document->addScript(JURI::root() . $this->script);
	}
}
