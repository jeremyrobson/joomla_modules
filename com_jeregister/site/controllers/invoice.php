<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerInvoice extends JControllerForm
{   
    public function back($key = null)
    {
        $app = JFactory::getApplication(); 
        $app->setUserState("com_jeregister.page", "summary");
        $this->setRedirect((string)JUri::getInstance(), "");
    }
    
    public function next($key = null, $urlVar = null)
    {
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
		$app = JFactory::getApplication(); 
		$input = $app->input;
		$data = $input->get('jform', array(), 'array');

		$model = $this->getModel();
		$form = $model->getForm($data, false);

		$validData = $model->validate($form, $data);
		echo "<pre>"; print_r($model->getErrors()); die;

		//get transaction
		$transaction_id = $data["id"];
		$transaction = JModelLegacy::getInstance("Transaction", "JeRegisterModel"); 
		$table = $transaction->getTable();
		$table->load($transaction_id);

		//create new transaction
		$data = array(
			"id" => $transaction_id,
			"json" => json_encode(array(
				"membership_fee" => $data["membership_fee"],
				"payment_method" =>  $data["payment_method"]
			))
		);

		//save transaction
		$transaction->save($data);

		$currentUri = (string)JUri::getInstance();
		
		//set next page in session
		$app->setUserState("com_jeregister.page", "thankyou");

		$this->setRedirect(
				$currentUri,
				JText::_('COM_JEREGISTER_DECLARATION_SAVED')
				);
            
		return true;
        
    }

}
