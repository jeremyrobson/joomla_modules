<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewProfiles extends JViewLegacy
{

	function display($tpl = null)
	{
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

		parent::display($tpl);

		$this->setDocument();
    }

    protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_TRANSACTIONS'));
	}
}
