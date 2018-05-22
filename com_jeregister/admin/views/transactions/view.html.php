<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewTransactions extends JViewLegacy
{

	function display($tpl = null)
	{
		$this->state = $this->get("State");
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

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

			JToolBarHelper::title(JText::_('COM_JEREGISTER_TRANSACTIONS'));

			JToolBarHelper::custom('transactions.back', "back", "", "Back", false);
			JToolBarHelper::custom('transaction.new', "new", "", "New", false);
			JToolBarHelper::deleteList();
		}

}
