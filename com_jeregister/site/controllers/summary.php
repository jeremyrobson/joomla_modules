<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerSummary extends JControllerForm
{   
    public function back($key = null)
    {
        $app = JFactory::getApplication(); 
        $app->setUserState("com_jeregister.page", "declaration");
        $this->setRedirect((string)JUri::getInstance(), "");
    }
    
    public function next($key = null, $urlVar = null)
    {
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		//get registration id
		$app = JFactory::getApplication(); 
		$input = $app->input;
		$registration_id  = $input->getInt("registration_id", "0");

		//get registration data
		$declaration = JModelLegacy::getInstance("Declaration", "JeRegisterModel"); 
		$table = $declaration->getTable();
		$table->load($registration_id);

		//create new transaction
		$data = array(
			"user_id" => $table->user_id,
			"registration_id" => $registration_id,
			"json" => json_encode(array(
				"membership_fee" => 100
			)),
			"date" => date("Y-m-d H:i:s"),
			"status" => 1
		);
		
		//save transaction
		$transaction = JModelLegacy::getInstance("Transaction", "JeRegisterModel"); 
		$transaction->save($data);

		$currentUri = (string)JUri::getInstance();

		//set next page in session
		$app->setUserState("com_jeregister.page", "invoice");

		//save registration_id in session
		$app->setUserState("com_jeregister.registration_id", $registration_id);

		$this->setRedirect(
				$currentUri,
				JText::_('COM_JEREGISTER_DECLARATION_SAVED')
				);
            
		return true;
        
    }

}
