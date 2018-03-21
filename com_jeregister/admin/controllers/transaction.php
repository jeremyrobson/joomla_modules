<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerTransaction extends JControllerForm
{   

    public function view($key = null, $urlVar = null)
    {
        $input = JFactory::getApplication()->input;
        $user_id = $input->get('user_id');

        $model = $this->getModel('transactions');
        $model->setState("transaction.user_id", $user_id);

        $view = $this->getView('transactions','html');
        $view->user_id = $user_id;
        $view->setModel($model, true);
        $view->display();
    }

}