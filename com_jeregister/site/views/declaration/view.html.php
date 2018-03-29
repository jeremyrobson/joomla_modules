<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewDeclaration extends JViewLegacy
{

	protected $form = null;
	protected $canDo;

	public function display($tpl = null)
	{
		$this->form = $this->get('Form');
		
		$this->script = $this->get('Script'); 
		$this->item = $this->get("Item");

		$this->canDo = JHelperContent::getActions('com_jeregister');
		if (!($this->canDo->get('core.create'))) 
		{
			$app = JFactory::getApplication(); 
			$app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');
			$app->setHeader('status', 403, true);
			return;
		}
        
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
