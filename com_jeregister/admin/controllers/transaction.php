<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerTransaction extends JControllerForm
{
	public function new($key = null)
	{
		$input = JFactory::getApplication()->input;
		$user_id = $input->get('user_id');

		$model = $this->getModel('transaction');
		$model->setState("transaction.user_id", $user_id);

		$view = $this->getView('transaction','html');
		$view->user_id = $user_id;
		$view->setModel($model, true);
		$view->display();
	}

	public function save($key = null, $urlVar = null)
	{
        $app = JFactory::getApplication();
		$input = $app->input;
        $user_id = $input->get('user_id');
        $jform = new JInput($input->get('jform', '', 'array')); 

        $app->setUserState("jeregister.transaction.membership_fee", $jform->get("membership_fee"));
        $app->setUserState("jeregister.transaction.payment_method", $jform->get("payment_method"));

		$return = parent::save($key, $urlVar);
		$this->setRedirect(JRoute::_("index.php?option=com_jeregister&view=transactions&user_id=$this->user_id"));
		return $return;
	}

	public function cancel($key = null)
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
}