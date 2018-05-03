<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewDeclaration extends JViewLegacy
{

	protected $form = null;

	public function display($tpl = null)
	{
		$this->form = $this->get('Form');
		
		$this->script = $this->get('Script'); 
		$this->item = $this->get("Item");

		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors), 500);
		}

		parent::display($tpl);

		$this->setDocument();
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_DECLARATION_CREATING'));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_jeregister"
		                                  . "/views/jeregister/submitbutton.js");
		JText::script('COM_JEREGISTER_DECLARATION_ERROR_UNACCEPTABLE');
	}
}
