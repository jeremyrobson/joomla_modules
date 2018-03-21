<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerProfile extends JControllerForm
{   

	public function view($key = null, $urlVar = null)
	{
		$input = JFactory::getApplication()->input;
		$user_id = $input->get('user_id');

		if (isset($user_id)) {
			$model = $this->getModel("profile");
			$model->setState("profile.user_id", $user_id);
			$view = $this->getView("profile", "html");
			$view->user_id = $user_id;
		}
		else {
			$model = $this->getModel('profiles');
			$model->setState("profile.user_id", $user_id);
			$view = $this->getView('profiles','html');
		}

		$view->setModel($model, true);
		$view->display();
	}

	public function save($key = null, $urlVar = null)
	{
		echo "todo";
	}

	public function cancel($key = null, $urlVar = null)
	{
		echo "todo";
	}
}
