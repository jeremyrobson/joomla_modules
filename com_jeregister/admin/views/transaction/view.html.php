<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewTransaction extends JViewLegacy
{
	function display($tpl = null)
	{
		$this->form = $this->get("Form");
		$this->item = $this->get("Item");
		
		$input = JFactory::getApplication()->input;
		$this->user_id = $input->get("user_id");

		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolBar();

		parent::display($tpl);
	}

	protected function addToolBar()
	{
			$input = JFactory::getApplication()->input;

			$input->set('hidemainmenu', true);

			JToolBarHelper::title(JText::_('COM_JEREGISTER_NEW_TRANSACTION'));

			JToolBarHelper::cancel('transaction.cancel');
			JToolBarHelper::save("transaction.save", "JTOOLBAR_SAVE");
	}

}
