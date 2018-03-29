<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerProfile extends JControllerForm
{

	//must override save because parent redirects to "profiles" with an "s" by default
	public function save($key = null, $urlVar = null)
	{
		$return = parent::save($key, $urlVar);
		$this->setRedirect(JRoute::_('index.php?option=com_jeregister&view=registrations'));
		return $return;
	}

	public function cancel($key = null)
	{
		$return = parent::cancel();
		$this->setRedirect(JRoute::_('index.php?option=com_jeregister&view=registrations'));
		return $return;
	}

}
