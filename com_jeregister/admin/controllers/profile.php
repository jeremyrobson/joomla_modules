<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerProfile extends JControllerForm
{
    public function preview($key = null, $urlVar = null)
    {
        $model = $this->getModel("registrations");

        $view = $this->getView('registrations','html');
        $view->setLayout("import");

        $view->setModel($model, true);
        $view->display();
    }
    
    public function import($key = null, $urlVar = null)
    {
        
        
    }

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
