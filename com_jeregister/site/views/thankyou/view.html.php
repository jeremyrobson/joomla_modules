<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewThankyou extends JViewLegacy
{
	protected $form = null;
	protected $canDo;

	public function display($tpl = null)
	{
        $app = JFactory::getApplication();
		$app->setUserState("com_jeregister.page", "declaration");

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