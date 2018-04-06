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
		echo "test"; die;
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        
		$app = JFactory::getApplication(); 
		$input = $app->input;
		$data = $input->get('jform', array(), 'array');
		$currentUri = (string)JUri::getInstance();

		$model = $this->getModel();
		$form = $model->getForm($data, false);

		if (!$form) {
			$app->enqueueMessage($model->getError(), "error");
			return false;
		}

		$validData = $model->validate($form, $data);

		if ($validData === false) {
			$errors = $model->getErrors();
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
				if ($errors[$i] instanceof Exception) {
					$app->enqueueMessage($errors[$i]->getMessage(), "warning");
				}
				else {
					$app->enqueueMessage($errors[$i], "warning");
				}
			}
			//$app->setUserState($context . ".data", $data);
			$this->setRedirect($currentUri);
			return false;
		}

		//get transaction
		$transaction_id = $data["id"];
		$transaction = JModelLegacy::getInstance("Transaction", "JeRegisterModel"); 
		$table = $transaction->getTable();
		$table->load($transaction_id);

		//update transaction
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
