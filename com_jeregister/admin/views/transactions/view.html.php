<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterViewTransactions extends JViewLegacy
{

	function display($tpl = null)
	{
		$this->state = $this->get("State");
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		if (JFactory::getUser()->authorise('core.admin', 'com_jeregister')) 
		{
			JToolBarHelper::preferences('com_jeregister');
		}

		$this->addToolBar();

		parent::display($tpl);

	}

        protected function addToolBar()
        {
                $input = JFactory::getApplication()->input;

                $input->set('hidemainmenu', true);

                JToolBarHelper::title(JText::_('COM_JEREGISTER_TRANSACTIONS'));

                JToolBarHelper::cancel('transactions.cancel');
        }

}
