<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewImport extends JViewLegacy
{
	function display($tpl = null)
	{
		$this->form = $this->get("Form");
		
		JToolBarHelper::title(JText::_('COM_JEREGISTER_IMPORT_MEMBERS'));
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JEREGISTER_IMPORT_MEMBERS'));

		parent::display($tpl);
	}
}
