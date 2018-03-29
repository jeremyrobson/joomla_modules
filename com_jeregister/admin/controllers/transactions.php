<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerTransactions extends JControllerAdmin
{   
	
	public function view($key = null, $urlVar = null)
	{
		$input = JFactory::getApplication()->input;
		$user_id = $input->get('user_id');

		$model = $this->getModel('transactions');
		$model->setState("transactions.user_id", $user_id);

		$view = $this->getView('transactions','html');
		$view->user_id = $user_id;
		$view->setModel($model, true);
		$view->display();
	}
	
        public function cancel($key = null)
        {
                $this->setRedirect(JRoute::_('index.php?option=com_jeregister&view=registrations'));
        }

}
