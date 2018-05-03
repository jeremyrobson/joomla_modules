<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewSummary extends JViewLegacy
{
	protected $form = null;

	public function display($tpl = null)
	{
		$option = JRequest::getCmd('option'); //com_jregister namespace
		$app = JFactory::getApplication();
		//$page = $app->getUserState("$option.page", "1");

		$this->form = $this->get('Form');
		$this->item = $this->get("Item");

        //echo '<pre>'; print_r($this->item); die;

		parent::display($tpl);

		$this->setDocument();
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_DECLARATION_SUMMARY'));
	}
}
