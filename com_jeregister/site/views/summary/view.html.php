<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewSummary extends JViewLegacy
{
    protected $form = null;
    protected $canDo;
    public $isEmail = false;

    public function display($tpl = null)
    {
        $app = JFactory::getApplication();

        $this->form = $this->get('Form');
        $this->item = $this->get("Item");
        $this->script = $this->get("Script");

        parent::display($tpl);

        $this->setDocument();
    }

    public function render() {
        parent::display($tpl);
    }

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_DECLARATION_SUMMARY'));
	}
}
