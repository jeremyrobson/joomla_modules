<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerDeclaration extends JControllerForm
{   
    public function cancel($key = null)
    {
        parent::cancel($key);
        
        $this->setRedirect(
            (string)JUri::getInstance(), 
            JText::_(COM_JEREGISTER_ADD_CANCELLED)
		);
    }
    
    public function save($key = null, $urlVar = null)
    {
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
		$app = JFactory::getApplication(); 
		$input = $app->input; 
		$model = $this->getModel('declaration');
        
		$currentUri = (string)JUri::getInstance();

		if (!JFactory::getUser()->authorise( "core.create", "com_jeregister")) {
			$app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');
			$app->setHeader('status', 403, true);
			return;
		}
        
		$data = $input->get('jform', array(), 'array');
        
		$context = "$this->option.edit.$this->context";
        
		$form = $model->getForm($data, false);

		if (!$form) {
			$app->enqueueMessage($model->getError(), 'error');
			return false;
		}

		$validData = $model->validate($form, $data);

		if ($validData === false) {
			$errors = $model->getErrors();

			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
				if ($errors[$i] instanceof Exception) {
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				}
				else {
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}

			$app->setUserState($context . '.data', $data);
			$this->setRedirect($currentUri);
			return false;
		}
		
		if (!$model->save($validData)) {
			$app->setUserState($context . '.data', $validData);
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_SAVE_FAILED', $model->getError()));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect($currentUri);
			return false;
		}
        
		$app->setUserState($context . '.data', null);
        
		//notify admin
		$params   = $app->getParams();
		$userid_to_email = (int) $params->get('user_to_email');
		$user_to_email = JUser::getInstance($userid_to_email);
		$to_address = $user_to_email->get("email");
        
		// get the current user (if any)
		$current_user = JFactory::getUser();
		if ($current_user->get("id") > 0) 
		{
			$current_username = $current_user->get("username");
		}
		else 
		{
			$current_username = "a visitor to the site";
		}
        
		// get the Mailer object, set up the email to be sent, and send it
		$mailer = JFactory::getMailer();
		$mailer->addRecipient($to_address);
		$mailer->setSubject("New helloworld message added by " . $current_username);
		$mailer->setBody("New greeting is " . $validData['greeting']);
		try 
		{
			$mailer->send(); 
		}
		catch (Exception $e)
		{
			JLog::add('Caught exception: ' . $e->getMessage(), JLog::Error, 'jerror');
		}
		
		//set next page in session
		$app->setUserState("com_jeregister.page", "summary");

		$this->setRedirect(
			$currentUri,
			JText::_('COM_JEREGISTER_DECLARATION_SAVED')
		);
            
		return true;
    }
}
